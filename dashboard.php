<?php
require_once __DIR__ . '/auth.php';
require_auth();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homelab Dashboard - Fahad Almansour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .animate-pulse-dot {
            animation: pulse-dot 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gray-950 text-gray-300 antialiased">

    <!-- Gradient Accent Line + Fixed Header -->
    <div class="fixed top-0 w-full z-50">
        <div class="h-0.5 bg-gradient-to-r from-emerald-500 via-blue-500 to-violet-500"></div>
        <header class="bg-gray-950/80 backdrop-blur-xl border-b border-gray-800">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center gap-2">
                        <a href="index.html" class="text-2xl font-bold text-white hover:text-emerald-400 transition-colors">FA</a>
                        <span class="text-gray-600">/</span>
                        <span class="text-gray-400">Homelab</span>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center gap-8">
                        <a href="#overview" class="text-sm text-gray-400 hover:text-white transition-colors">Overview</a>
                        <a href="#services" class="text-sm text-gray-400 hover:text-white transition-colors">Services</a>
                        <a href="#nodes" class="text-sm text-gray-400 hover:text-white transition-colors">Nodes</a>
                        <a href="#vms" class="text-sm text-gray-400 hover:text-white transition-colors">VMs</a>
                    </nav>

                    <!-- User Info + Sign Out -->
                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex items-center gap-2 text-sm">
                            <span class="text-gray-500">Signed in as</span>
                            <span class="text-emerald-400 font-medium"><?= htmlspecialchars(AUTH_USERNAME) ?></span>
                        </div>
                        <a href="logout.php" class="text-sm text-gray-400 hover:text-red-400 transition-colors">Sign out</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden pt-4 pb-2 border-t border-gray-800 mt-4">
                    <nav class="flex flex-col gap-3">
                        <a href="#overview" class="text-sm text-gray-400 hover:text-white transition-colors">Overview</a>
                        <a href="#services" class="text-sm text-gray-400 hover:text-white transition-colors">Services</a>
                        <a href="#nodes" class="text-sm text-gray-400 hover:text-white transition-colors">Nodes</a>
                        <a href="#vms" class="text-sm text-gray-400 hover:text-white transition-colors">VMs</a>
                    </nav>
                </div>
            </div>
        </header>
    </div>

    <!-- Spacer for Fixed Header -->
    <div class="h-[73px]"></div>

    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center px-6 py-20">
        <div class="container mx-auto text-center">
            <!-- Avatar -->
            <div class="flex justify-center mb-6">
                <div class="w-28 h-28 rounded-full bg-gradient-to-br from-emerald-500 to-blue-500 p-[2px]">
                    <div class="w-full h-full rounded-full bg-gray-950 flex items-center justify-center">
                        <span class="text-4xl font-bold text-white">FA</span>
                    </div>
                </div>
            </div>

            <!-- Name -->
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Fahad Almansour
            </h1>

            <!-- Tagline -->
            <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">
                Infrastructure Engineer · Homelab Enthusiast · Self-Hosted Everything
            </p>
        </div>
    </section>

    <!-- Stats Bar -->
    <section id="overview" class="px-6 py-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <!-- 5 Nodes -->
                <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-emerald-500">
                    <div class="text-3xl font-bold text-emerald-400 mb-1">5</div>
                    <div class="text-sm text-gray-500">Nodes</div>
                </div>

                <!-- 9 VMs -->
                <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-blue-500">
                    <div class="text-3xl font-bold text-blue-400 mb-1">9</div>
                    <div class="text-sm text-gray-500">VMs</div>
                </div>

                <!-- 16 Containers -->
                <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-violet-500">
                    <div class="text-3xl font-bold text-violet-400 mb-1">16</div>
                    <div class="text-sm text-gray-500">Containers</div>
                </div>

                <!-- 168 GB RAM -->
                <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-amber-500">
                    <div class="text-3xl font-bold text-amber-400 mb-1">168</div>
                    <div class="text-sm text-gray-500">GB RAM</div>
                </div>

                <!-- 25+ Services -->
                <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-rose-500">
                    <div class="text-3xl font-bold text-rose-400 mb-1">25+</div>
                    <div class="text-sm text-gray-500">Services</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="px-6 py-12">
        <div class="container mx-auto">
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">
                <p class="text-gray-300 leading-relaxed">
                    Building and managing enterprise-grade self-hosted infrastructure with a 5-node Proxmox cluster. Specializing in infrastructure automation, network security, and AI workloads. Running 25+ services across 9 VMs and 16 LXC containers.
                </p>
            </div>
        </div>
    </section>

    <!-- Expertise Grid -->
    <section class="px-6 py-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Infrastructure -->
                <div class="bg-gray-900 rounded-xl p-5 border border-gray-800 hover:border-emerald-500/50 hover:shadow-lg hover:shadow-emerald-500/5 hover:scale-[1.02] transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/15 text-emerald-400 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-medium text-white group-hover:text-emerald-400 transition-colors mb-3">Infrastructure</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="border border-emerald-500/30 text-emerald-400 text-xs px-2 py-0.5 rounded">Proxmox</span>
                        <span class="border border-emerald-500/30 text-emerald-400 text-xs px-2 py-0.5 rounded">Docker</span>
                        <span class="border border-emerald-500/30 text-emerald-400 text-xs px-2 py-0.5 rounded">K3s</span>
                        <span class="border border-emerald-500/30 text-emerald-400 text-xs px-2 py-0.5 rounded">TrueNAS</span>
                    </div>
                </div>

                <!-- Network -->
                <div class="bg-gray-900 rounded-xl p-5 border border-gray-800 hover:border-blue-500/50 hover:shadow-lg hover:shadow-blue-500/5 hover:scale-[1.02] transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-blue-500/15 text-blue-400 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors mb-3">Network</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="border border-blue-500/30 text-blue-400 text-xs px-2 py-0.5 rounded">VPN</span>
                        <span class="border border-blue-500/30 text-blue-400 text-xs px-2 py-0.5 rounded">DNS</span>
                        <span class="border border-blue-500/30 text-blue-400 text-xs px-2 py-0.5 rounded">Firewalls</span>
                        <span class="border border-blue-500/30 text-blue-400 text-xs px-2 py-0.5 rounded">CrowdSec</span>
                    </div>
                </div>

                <!-- Smart Home -->
                <div class="bg-gray-900 rounded-xl p-5 border border-gray-800 hover:border-amber-500/50 hover:shadow-lg hover:shadow-amber-500/5 hover:scale-[1.02] transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-amber-500/15 text-amber-400 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-medium text-white group-hover:text-amber-400 transition-colors mb-3">Smart Home</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="border border-amber-500/30 text-amber-400 text-xs px-2 py-0.5 rounded">Home Assistant</span>
                        <span class="border border-amber-500/30 text-amber-400 text-xs px-2 py-0.5 rounded">Homebridge</span>
                        <span class="border border-amber-500/30 text-amber-400 text-xs px-2 py-0.5 rounded">HomeKit</span>
                    </div>
                </div>

                <!-- AI/ML -->
                <div class="bg-gray-900 rounded-xl p-5 border border-gray-800 hover:border-violet-500/50 hover:shadow-lg hover:shadow-violet-500/5 hover:scale-[1.02] transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-violet-500/15 text-violet-400 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-medium text-white group-hover:text-violet-400 transition-colors mb-3">AI/ML</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="border border-violet-500/30 text-violet-400 text-xs px-2 py-0.5 rounded">Ollama</span>
                        <span class="border border-violet-500/30 text-violet-400 text-xs px-2 py-0.5 rounded">GPU</span>
                        <span class="border border-violet-500/30 text-violet-400 text-xs px-2 py-0.5 rounded">LLMs</span>
                    </div>
                </div>

                <!-- DevOps -->
                <div class="bg-gray-900 rounded-xl p-5 border border-gray-800 hover:border-rose-500/50 hover:shadow-lg hover:shadow-rose-500/5 hover:scale-[1.02] transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-rose-500/15 text-rose-400 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-medium text-white group-hover:text-rose-400 transition-colors mb-3">DevOps</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="border border-rose-500/30 text-rose-400 text-xs px-2 py-0.5 rounded">Ansible</span>
                        <span class="border border-rose-500/30 text-rose-400 text-xs px-2 py-0.5 rounded">Git</span>
                        <span class="border border-rose-500/30 text-rose-400 text-xs px-2 py-0.5 rounded">CI/CD</span>
                        <span class="border border-rose-500/30 text-rose-400 text-xs px-2 py-0.5 rounded">IaC</span>
                    </div>
                </div>

                <!-- Monitoring -->
                <div class="bg-gray-900 rounded-xl p-5 border border-gray-800 hover:border-cyan-500/50 hover:shadow-lg hover:shadow-cyan-500/5 hover:scale-[1.02] transition-all duration-200 group">
                    <div class="w-10 h-10 rounded-lg bg-cyan-500/15 text-cyan-400 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-medium text-white group-hover:text-cyan-400 transition-colors mb-3">Monitoring</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="border border-cyan-500/30 text-cyan-400 text-xs px-2 py-0.5 rounded">Uptime Kuma</span>
                        <span class="border border-cyan-500/30 text-cyan-400 text-xs px-2 py-0.5 rounded">WatchYourLAN</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="px-6 py-12">
        <div class="container mx-auto">
            <!-- Section Title -->
            <div class="flex items-center gap-3 mb-8">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <h2 class="text-2xl font-bold text-white">Services</h2>
            </div>

            <!-- Core Infrastructure -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <h3 class="text-lg font-semibold text-white">Core Infrastructure</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <a href="https://192.168.8.61:8006" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-emerald-500 hover:border-emerald-400 hover:shadow-lg hover:shadow-emerald-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-emerald-400 transition-colors">Proxmox VE</div>
                                <div class="text-xs text-gray-500">192.168.8.61:8006 · Cluster management</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <a href="http://192.168.8.60" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-emerald-500 hover:border-emerald-400 hover:shadow-lg hover:shadow-emerald-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-emerald-400 transition-colors">TrueNAS</div>
                                <div class="text-xs text-gray-500">192.168.8.60 · Network storage</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-emerald-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">Docker Host</div>
                                <div class="text-xs text-gray-500">192.168.8.131 · Container runtime</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Network & Security -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    <h3 class="text-lg font-semibold text-white">Network & Security</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <a href="http://192.168.8.85" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-blue-500 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">AdGuard Home</div>
                                <div class="text-xs text-gray-500">192.168.8.85 · DNS filtering</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-blue-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">WireGuard VPN</div>
                                <div class="text-xs text-gray-500">192.168.8.121 · Secure access</div>
                            </div>
                        </div>
                    </div>

                    <a href="http://192.168.8.135" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-blue-500 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">CrowdSec</div>
                                <div class="text-xs text-gray-500">192.168.8.135 · Security engine</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <a href="http://192.168.8.122" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-blue-500 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">Nginx Proxy</div>
                                <div class="text-xs text-gray-500">192.168.8.122 · Reverse proxy</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <a href="https://192.168.8.58:8443" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-blue-500 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">UniFi Controller</div>
                                <div class="text-xs text-gray-500">192.168.8.58:8443 · WiFi management</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Monitoring -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    <h3 class="text-lg font-semibold text-white">Monitoring</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <a href="http://192.168.8.123:3001" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-amber-500 hover:border-amber-400 hover:shadow-lg hover:shadow-amber-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-amber-400 transition-colors">Uptime Kuma</div>
                                <div class="text-xs text-gray-500">192.168.8.123:3001 · Service monitoring</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <a href="http://192.168.8.127:3000" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-amber-500 hover:border-amber-400 hover:shadow-lg hover:shadow-amber-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-amber-400 transition-colors">Homepage</div>
                                <div class="text-xs text-gray-500">192.168.8.127:3000 · Dashboard</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <a href="http://192.168.8.124" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-amber-500 hover:border-amber-400 hover:shadow-lg hover:shadow-amber-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-amber-400 transition-colors">WatchYourLAN</div>
                                <div class="text-xs text-gray-500">192.168.8.124 · Network scanner</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-amber-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">Infra Management</div>
                                <div class="text-xs text-gray-500">192.168.8.67 · Management</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Development & AI -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-violet-500"></span>
                    <h3 class="text-lg font-semibold text-white">Development & AI</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <a href="http://192.168.8.90:3000" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-violet-500 hover:border-violet-400 hover:shadow-lg hover:shadow-violet-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-violet-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-violet-400 transition-colors">Forgejo</div>
                                <div class="text-xs text-gray-500">192.168.8.90:3000 · Git hosting</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-violet-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <a href="http://192.168.8.106:11434" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-violet-500 hover:border-violet-400 hover:shadow-lg hover:shadow-violet-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-violet-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-violet-400 transition-colors">Ollama</div>
                                <div class="text-xs text-gray-500">192.168.8.106:11434 · LLM inference</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-violet-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-violet-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-violet-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">AI Dev GPU</div>
                                <div class="text-xs text-gray-500">192.168.8.113 · GPU compute</div>
                            </div>
                        </div>
                    </div>

                    <a href="http://192.168.8.208:3000" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-violet-500 hover:border-violet-400 hover:shadow-lg hover:shadow-violet-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-violet-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-violet-400 transition-colors">Reactive Resume</div>
                                <div class="text-xs text-gray-500">192.168.8.208:3000 · Resume builder</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-violet-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Smart Home -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    <h3 class="text-lg font-semibold text-white">Smart Home</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <a href="http://192.168.8.136:8123" target="_blank" rel="noopener noreferrer" class="group bg-gray-900 rounded-xl p-4 border-l-2 border-rose-500 hover:border-rose-400 hover:shadow-lg hover:shadow-rose-500/5 hover:scale-[1.02] transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-rose-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white group-hover:text-rose-400 transition-colors">Home Assistant</div>
                                <div class="text-xs text-gray-500">192.168.8.136:8123 · Automation</div>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-rose-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </div>
                    </a>

                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-rose-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-rose-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">Homebridge</div>
                                <div class="text-xs text-gray-500">192.168.8.107 · HomeKit bridge</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Caching & DNS -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-500"></span>
                    <h3 class="text-lg font-semibold text-white">Caching & DNS</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-cyan-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">APT Cache</div>
                                <div class="text-xs text-gray-500">192.168.8.101 · Package caching</div>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-gray-900 rounded-xl p-4 border-l-2 border-cyan-500">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/15 flex items-center justify-center">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-white">DNS Server</div>
                                <div class="text-xs text-gray-500">192.168.8.100 · ARM DNS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cluster Nodes -->
    <section id="nodes" class="px-6 py-12">
        <div class="container mx-auto">
            <!-- Section Title -->
            <div class="flex items-center gap-3 mb-8">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <h2 class="text-2xl font-bold text-white">Cluster Nodes <span class="text-gray-500">· NeoFahad</span></h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Primary Node (Full Width) -->
                <div class="bg-gradient-to-r from-emerald-500 to-blue-500 p-[1px] rounded-xl shadow-lg shadow-emerald-500/10 lg:col-span-2">
                    <div class="bg-gray-900 rounded-xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-white">thinkstation-p410</h3>
                            <span class="bg-emerald-500 text-white rounded-full text-xs px-2.5 py-0.5">Primary</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <div class="text-xs text-gray-500 mb-1">CPU</div>
                                <div class="text-sm text-white">Xeon E5-1650 v4</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 mb-1">GPU</div>
                                <div class="text-sm text-white">Quadro P5000</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 mb-1">RAM</div>
                                <div class="text-sm text-white">128GB DDR4 ECC</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="text-xs text-gray-500 mb-1">Network</div>
                                <div class="text-sm text-gray-300">vmbr0: 192.168.8.61</div>
                                <div class="text-sm text-gray-300">bond0 10GbE: 192.168.8.71</div>
                                <div class="text-sm text-gray-300">WiFi: 192.168.8.81</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 mb-1">Storage</div>
                                <div class="text-sm text-gray-300">NVMe: 1TB Kingston</div>
                                <div class="text-sm text-gray-300">ZFS TB3: 2.72TB</div>
                                <div class="text-sm text-gray-300">ZFS MAIN: 1.81TB</div>
                                <div class="text-sm text-gray-300">ZFS GB500.2: 464GB</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secondary Node -->
                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-blue-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">lenovo-thinkpad</h3>
                        <span class="bg-blue-500 text-white rounded-full text-xs px-2.5 py-0.5">Secondary</span>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">RAM</span>
                            <span class="text-sm text-white">16GB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Network</span>
                            <span class="text-sm text-white">192.168.8.62</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WiFi</span>
                            <span class="text-sm text-white">192.168.8.104</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WOL</span>
                            <span class="text-sm text-gray-400">b8:88:e3:92:e7:c4</span>
                        </div>
                    </div>
                </div>

                <!-- Tertiary Node -->
                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-amber-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">acer-TravelMate470</h3>
                        <span class="bg-amber-500 text-white rounded-full text-xs px-2.5 py-0.5">Tertiary</span>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">RAM</span>
                            <span class="text-sm text-white">8GB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Network</span>
                            <span class="text-sm text-white">192.168.8.63</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">NIC1</span>
                            <span class="text-sm text-white">192.168.8.73</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WiFi</span>
                            <span class="text-sm text-white">192.168.8.83</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WOL</span>
                            <span class="text-sm text-gray-400">00:26:2d:a4:5c:04</span>
                        </div>
                    </div>
                </div>

                <!-- Quaternary Node -->
                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-violet-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">surface-pro7</h3>
                        <span class="bg-violet-500 text-white rounded-full text-xs px-2.5 py-0.5">Quaternary</span>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">RAM</span>
                            <span class="text-sm text-white">8GB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Network</span>
                            <span class="text-sm text-white">192.168.8.64 (USB)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WiFi</span>
                            <span class="text-sm text-white">192.168.8.74</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WOL</span>
                            <span class="text-sm text-gray-400">Not supported</span>
                        </div>
                    </div>
                </div>

                <!-- Fifth Node -->
                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-rose-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white">macbook</h3>
                        <span class="bg-rose-500 text-white rounded-full text-xs px-2.5 py-0.5">Fifth</span>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">RAM</span>
                            <span class="text-sm text-white">8GB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Network</span>
                            <span class="text-sm text-white">192.168.8.65 (USB 100Mbps)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">WiFi</span>
                            <span class="text-sm text-white">192.168.8.75</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Virtual Machines -->
    <section id="vms" class="px-6 py-12">
        <div class="container mx-auto">
            <!-- Section Title -->
            <div class="flex items-center gap-3 mb-8">
                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                <h2 class="text-2xl font-bold text-white">Virtual Machines <span class="text-gray-500">(9)</span></h2>
            </div>

            <div class="bg-gray-900 rounded-xl border border-gray-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-950">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">IP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">RAM</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">100</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">truenas</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.60</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">65 GB</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Network storage</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">104</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">haos</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.136</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">2 GB</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Home Assistant OS</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">130</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">docker-host</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.131</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">8 GB</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Container runtime</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">200</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">k3s-server</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.200</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">4 GB</td>
                                <td class="px-6 py-4 text-sm text-gray-500">K3s control plane</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">201</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">k3s-worker1</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.201</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">4 GB</td>
                                <td class="px-6 py-4 text-sm text-gray-500">K3s worker</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">202</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">k3s-worker2</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.202</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">4 GB</td>
                                <td class="px-6 py-4 text-sm text-gray-500">K3s worker</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">9012</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">debian12-cloud</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-gray-500"></span>
                                        <span class="text-sm text-gray-500">Stopped</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-blue-500/20 text-blue-400 ring-1 ring-blue-500/30">Template</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">9013</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">debian13-cloud</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-gray-500"></span>
                                        <span class="text-sm text-gray-500">Stopped</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-blue-500/20 text-blue-400 ring-1 ring-blue-500/30">Template</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">9024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">ubuntu2404-cloud</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-gray-500"></span>
                                        <span class="text-sm text-gray-500">Stopped</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">—</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-blue-500/20 text-blue-400 ring-1 ring-blue-500/30">Template</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- LXC Containers -->
    <section class="px-6 py-12">
        <div class="container mx-auto">
            <!-- Section Title -->
            <div class="flex items-center gap-3 mb-8">
                <span class="w-2 h-2 rounded-full bg-violet-500"></span>
                <h2 class="text-2xl font-bold text-white">LXC Containers <span class="text-gray-500">(16)</span></h2>
            </div>

            <div class="bg-gray-900 rounded-xl border border-gray-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-950">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">IP</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">101</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">apt-cacher-ng</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.101</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Package caching</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">102</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">unifi</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.58</td>
                                <td class="px-6 py-4 text-sm text-gray-500">WiFi controller</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">103</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">forgejo</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.90</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Git hosting</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">106</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">ollama</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.106</td>
                                <td class="px-6 py-4 text-sm text-gray-500">LLM inference</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">107</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">homebridge</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.107</td>
                                <td class="px-6 py-4 text-sm text-gray-500">HomeKit bridge</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">108</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">reactive-resume</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.208</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Resume builder</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">113</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">ai-dev-gpu</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.113</td>
                                <td class="px-6 py-4 text-sm text-gray-500">GPU AI workloads</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">120</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">adguard</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.85</td>
                                <td class="px-6 py-4 text-sm text-gray-500">DNS filtering</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">121</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">wireguard</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.121</td>
                                <td class="px-6 py-4 text-sm text-gray-500">VPN access</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">122</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">nginx-proxy</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.122</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Reverse proxy</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">123</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">uptime-kuma</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.123</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Uptime monitoring</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">124</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">watchyourlan</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.124</td>
                                <td class="px-6 py-4 text-sm text-gray-500">LAN scanner</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">125</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">crowdsec</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.135</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Security engine</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">127</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">homepage</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.127</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Service dashboard</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">128</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">infra-mgmt</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.67</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Infra management</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">140</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">thinkstation-p410</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                                        <span class="text-sm text-emerald-400">Running</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">192.168.8.140</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Node management</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Infrastructure -->
    <section class="px-6 py-12">
        <div class="container mx-auto">
            <!-- Section Title -->
            <div class="flex items-center gap-3 mb-8">
                <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                <h2 class="text-2xl font-bold text-white">Additional Infrastructure</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-cyan-500">
                    <h3 class="text-lg font-bold text-white mb-4">MacBook Pro M1 Pro</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">IP</span>
                            <span class="text-sm text-white">192.168.8.66</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">RAM</span>
                            <span class="text-sm text-white">16GB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Role</span>
                            <span class="text-sm text-gray-400">Ansible control</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-cyan-500">
                    <h3 class="text-lg font-bold text-white mb-4">Mikrotik CSS610</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">IP</span>
                            <span class="text-sm text-white">192.168.8.82</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Ports</span>
                            <span class="text-sm text-white">8x 1G + 2x 10G SFP+</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Role</span>
                            <span class="text-sm text-gray-400">Network switch</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-cyan-500">
                    <h3 class="text-lg font-bold text-white mb-4">Rockchip rk3326</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">IP</span>
                            <span class="text-sm text-white">192.168.8.100</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Type</span>
                            <span class="text-sm text-white">ARM device</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Role</span>
                            <span class="text-sm text-gray-400">DNS server</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl p-6 border-t-2 border-cyan-500">
                    <h3 class="text-lg font-bold text-white mb-4">VPS Namecheap</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">IP</span>
                            <span class="text-sm text-white">162.254.39.146</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Port</span>
                            <span class="text-sm text-white">21098</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs text-gray-500">Role</span>
                            <span class="text-sm text-gray-400">cPanel hosting</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="px-6 py-12">
        <div class="container mx-auto">
            <div class="h-px bg-gradient-to-r from-transparent via-gray-700 to-transparent mb-8"></div>
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500">Copyright 2026 Fahad Almansour</p>
                <a href="index.html" class="text-sm text-gray-400 hover:text-white transition-colors">Back to home</a>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu and Smooth Scroll -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scroll with offset for fixed header
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 90; // Fixed header height + some padding
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Close mobile menu after clicking
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
