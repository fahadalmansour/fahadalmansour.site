#!/bin/bash
set -euo pipefail

# Configuration
TARGET="fsalmansour@162.254.39.146"
PORT="21098"
KEY="$HOME/.ssh/id_rsa"
DEST="public_html/"
SITE_URL="https://fahadalmansour.site"

# Files to deploy (config.php is opt-in via --with-config)
FILES=(
    index.html
    signin.php
    dashboard.php
    logout.php
    auth.php
    .htaccess
    favicon.svg
    robots.txt
    sitemap.xml
    404.html
)

# PHP files to syntax-check
PHP_FILES=(auth.php signin.php dashboard.php logout.php)

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${YELLOW}=== fahadalmansour.site deployment ===${NC}"

# --- Pre-deployment checks ---

# 1. PHP syntax validation
echo -e "\n${YELLOW}[1/5] Checking PHP syntax...${NC}"
for f in "${PHP_FILES[@]}"; do
    if ! php -l "$f" > /dev/null 2>&1; then
        echo -e "${RED}FAIL: $f has syntax errors${NC}"
        php -l "$f"
        exit 1
    fi
done
echo -e "${GREEN}All PHP files pass syntax check.${NC}"

# 2. Check config.php exists locally
echo -e "\n${YELLOW}[2/5] Checking config.php...${NC}"
if [ ! -f "config.php" ]; then
    echo -e "${RED}FAIL: config.php not found.${NC}"
    echo "Copy config.php.example to config.php and set your password hash."
    exit 1
fi
echo -e "${GREEN}config.php found.${NC}"

# 3. Check SSH connectivity
echo -e "\n${YELLOW}[3/5] Testing SSH connection...${NC}"
if ! ssh -o ConnectTimeout=5 -p "$PORT" -i "$KEY" "$TARGET" "echo 'OK'" > /dev/null 2>&1; then
    echo -e "${RED}FAIL: Cannot connect to $TARGET:$PORT${NC}"
    exit 1
fi
echo -e "${GREEN}SSH connection OK.${NC}"

# --- Remote backup ---
echo -e "\n${YELLOW}[4/5] Creating remote backup...${NC}"
BACKUP_DIR="public_html_backup_$(date +%Y%m%d_%H%M%S)"
ssh -p "$PORT" -i "$KEY" "$TARGET" "cp -r $DEST $BACKUP_DIR" 2>/dev/null || true
echo -e "${GREEN}Backup: ~/$BACKUP_DIR${NC}"

# --- Deploy ---
echo -e "\n${YELLOW}[5/5] Deploying files...${NC}"
scp -P "$PORT" -i "$KEY" "${FILES[@]}" "$TARGET:$DEST"

# Deploy config.php only with --with-config flag
if [[ "${1:-}" == "--with-config" ]]; then
    echo -e "${YELLOW}Deploying config.php (--with-config)...${NC}"
    scp -P "$PORT" -i "$KEY" config.php "$TARGET:$DEST"
fi

echo -e "${GREEN}Files deployed.${NC}"

# --- Post-deployment verification ---
echo -e "\n${YELLOW}Verifying deployment...${NC}"
PASS=true

# Homepage should return 200
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" "$SITE_URL/" 2>/dev/null || echo "000")
if [ "$HTTP_CODE" = "200" ]; then
    echo -e "${GREEN}  Homepage:    HTTP $HTTP_CODE OK${NC}"
else
    echo -e "${RED}  Homepage:    HTTP $HTTP_CODE (expected 200)${NC}"
    PASS=false
fi

# Signin should return 200
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" "$SITE_URL/signin.php" 2>/dev/null || echo "000")
if [ "$HTTP_CODE" = "200" ]; then
    echo -e "${GREEN}  Signin page: HTTP $HTTP_CODE OK${NC}"
else
    echo -e "${RED}  Signin page: HTTP $HTTP_CODE (expected 200)${NC}"
    PASS=false
fi

# config.php should be blocked (403)
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" "$SITE_URL/config.php" 2>/dev/null || echo "000")
if [ "$HTTP_CODE" = "403" ]; then
    echo -e "${GREEN}  config.php:  HTTP $HTTP_CODE (blocked) OK${NC}"
else
    echo -e "${RED}  config.php:  HTTP $HTTP_CODE (expected 403)${NC}"
    PASS=false
fi

if [ "$PASS" = true ]; then
    echo -e "\n${GREEN}=== Deployment successful ===${NC}"
else
    echo -e "\n${YELLOW}=== Deployment complete (some checks failed) ===${NC}"
fi
