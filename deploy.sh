#!/bin/bash
set -e

TARGET="fsalmansour@162.254.39.146"
PORT="21098"
KEY="$HOME/.ssh/id_rsa"
DEST="public_html/"

FILES=(
    index.html
    signin.php
    dashboard.php
    logout.php
    auth.php
    config.php
    .htaccess
    favicon.svg
    robots.txt
    sitemap.xml
    404.html
)

echo "Deploying to $TARGET:$DEST ..."
scp -P "$PORT" -i "$KEY" "${FILES[@]}" "$TARGET:$DEST"
echo "Done."
