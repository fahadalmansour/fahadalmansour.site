# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Personal landing page and homelab dashboard for fahadalmansour.site. Static HTML public site with a PHP-authenticated homelab service dashboard behind login.

## Architecture

- **Public site**: `index.html` - static HTML + Tailwind CSS (CDN), no build step
- **Auth system**: PHP session-based authentication (`auth.php`, `config.php`)
- **Protected area**: `dashboard.php` - homelab service links, requires login
- **Login flow**: `signin.php` -> session created -> `dashboard.php` -> `logout.php`

### Auth Details

- Bcrypt password hashing via `password_hash()`/`password_verify()`
- CSRF token protection on login form
- Session timeout (configurable in `config.php`, default 1 hour)
- Session IP binding
- `config.php` and `auth.php` blocked from direct web access via `.htaccess`

## File Structure

```
index.html           - Public landing page (hero, about, services, homelab CTA)
signin.php           - Login form (redirects to dashboard if already authenticated)
dashboard.php        - Protected homelab service links (grouped by category)
logout.php           - Destroys session, redirects to login
auth.php             - Authentication functions (session management, CSRF)
config.php           - Credentials and session config (NOT in git, not web-accessible)
config.php.example   - Template for config.php (committed to git)
.htaccess            - Apache access rules (protects config/auth files)
deploy.sh            - Deployment script with pre-checks and health verification
.github/workflows/   - GitHub Actions CI/CD (auto-deploy on push to main)
```

## First-Time Setup

1. Clone the repository
2. Copy `config.php.example` to `config.php`
3. Generate a bcrypt hash: `php -r "echo password_hash('YOUR_PASSWORD', PASSWORD_BCRYPT);"`
4. Replace the `AUTH_PASSWORD_HASH` value in `config.php` with the output
5. Deploy with config: `./deploy.sh --with-config`

## Deployment

**Target**: Namecheap cPanel VPS (SSH user: `fsalmansour`, port 21098)

### Automatic (CI/CD)
Push to `main` branch triggers GitHub Actions which:
1. Validates PHP syntax
2. Deploys all files (except `config.php`) via SCP
3. Runs health checks against the live site

**Required GitHub Secrets**: `VPS_SSH_KEY`, `VPS_HOST`, `VPS_USER`, `VPS_PORT`

### Manual
```bash
./deploy.sh              # Deploy code only (normal updates)
./deploy.sh --with-config  # Deploy code + config.php (first-time or password change)
```

### Important
- `config.php` is **never** deployed via CI/CD. Use `./deploy.sh --with-config` for first-time setup or password changes.
- The filename `login.php` is blocked by the hosting WAF (Imunify360/ModSecurity). Use `signin.php` instead.
- Cloudflare DNS A record must point to `162.254.39.146` (proxied).
- Cloudflare SSL mode: **Flexible** (origin has no SSL cert for this domain).

### Git Remotes
- **origin**: GitHub (private) — CI/CD source
- **forgejo**: Self-hosted Forgejo at 192.168.8.90:3000 — homelab mirror

## Styling

- Tailwind CSS via CDN (`cdn.tailwindcss.com`) - no local build
- Inter font via Google Fonts CDN
- Dark theme (hardcoded `class="dark"` on `<html>`)
- Consistent card styling with colored hover borders per service

## Homelab Services (in dashboard.php)

Services are organized into four categories:
- **Infrastructure**: Proxmox, TrueNAS, Home Assistant
- **Network & Security**: AdGuard, WireGuard, CrowdSec
- **Monitoring & Management**: Uptime Kuma, Homepage, WatchYourLAN
- **Development & Tools**: Forgejo, Ollama, Reactive Resume, Nginx Proxy, Homebridge, UniFi

All service links point to local network IPs (192.168.8.x) - only accessible from the homelab network or via WireGuard VPN.

## Adding a New Service

In `dashboard.php`, add a new `<a>` block inside the appropriate category `<div class="grid ...">`:

```html
<a href="http://192.168.8.XXX:PORT" target="_blank" rel="noopener noreferrer"
   class="group flex items-center gap-4 p-4 rounded-lg border border-gray-800 hover:border-COLOR-500/50 bg-gray-900/50 transition-colors">
  <div class="w-10 h-10 rounded-lg bg-COLOR-500/10 flex items-center justify-center flex-shrink-0">
    <!-- SVG icon here -->
  </div>
  <div>
    <h3 class="text-sm font-medium group-hover:text-COLOR-400 transition-colors">Service Name</h3>
    <p class="text-xs text-gray-500">192.168.8.XXX:PORT</p>
  </div>
</a>
```
