<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance Mode - BlindPoint</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-secondary-900">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="text-center max-w-lg">
            <!-- Logo -->
            <div class="mb-8">
                <span class="text-3xl font-extrabold tracking-tight">
                    <span class="text-white">BLIND</span><span class="text-primary-400">POINT</span>
                </span>
            </div>

            <!-- Icon -->
            <div class="mb-8">
                <div class="w-24 h-24 mx-auto bg-primary-600/20 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Message -->
            <h1 class="text-3xl font-bold text-white mb-4">We'll Be Back Soon</h1>
            <p class="text-lg text-slate-400 mb-8">
                We're currently performing some scheduled maintenance to improve your experience. We'll be back online shortly.
            </p>

            <!-- Contact Info -->
            <div class="bg-white/5 rounded-xl p-6 mb-8">
                <p class="text-slate-400 mb-4">Need urgent assistance?</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6 text-white">
<a href="mailto:support@blindpoint.co.uk" class="flex items-center gap-2 hover:text-primary-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        support@blindpoint.co.uk
                    </a>
                </div>
            </div>

            <!-- Refresh -->
            <button onclick="window.location.reload()" class="inline-flex items-center gap-2 text-primary-400 hover:text-primary-300 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Refresh Page
            </button>
        </div>
    </div>
</body>
</html>
