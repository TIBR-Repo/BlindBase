<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Server Error - BlindPoint</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-slate-50">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="text-center max-w-lg">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="inline-block mb-8">
                <span class="text-3xl font-extrabold tracking-tight">
                    <span class="text-secondary-900">BLIND</span><span class="text-primary-600">POINT</span>
                </span>
            </a>

            <!-- Error Illustration -->
            <div class="relative mb-8">
                <div class="text-[180px] font-extrabold text-slate-100 leading-none">500</div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-32 h-32 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>

            <!-- Message -->
            <h1 class="text-3xl font-bold text-secondary-900 mb-4">Something Went Wrong</h1>
            <p class="text-lg text-slate-600 mb-8">
                We're experiencing some technical difficulties. Our team has been notified and is working on it. Please try again in a few moments.
            </p>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <button onclick="window.location.reload()" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Try Again
                </button>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-secondary-900 font-semibold rounded-xl hover:bg-slate-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Go Home
                </a>
            </div>

            <!-- Help Link -->
            <p class="mt-8 text-sm text-slate-500">
                If the problem persists, please <a href="mailto:support@blindpoint.co.uk" class="text-primary-600 hover:underline">contact support</a>
            </p>
        </div>
    </div>
</body>
</html>
