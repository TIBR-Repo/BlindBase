<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found - BlindBase</title>
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
                    <span class="text-secondary-900">BLIND</span><span class="text-primary-600">BASE</span>
                </span>
            </a>

            <!-- Error Illustration -->
            <div class="relative mb-8">
                <div class="text-[180px] font-extrabold text-slate-100 leading-none">404</div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-32 h-32 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Message -->
            <h1 class="text-3xl font-bold text-secondary-900 mb-4">Page Not Found</h1>
            <p class="text-lg text-slate-600 mb-8">
                Sorry, we couldn't find the page you're looking for. Perhaps you've mistyped the URL or the page has been moved.
            </p>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Go Home
                </a>
                <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-secondary-900 font-semibold rounded-xl hover:bg-slate-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    Browse Shop
                </a>
            </div>

            <!-- Help Link -->
            <p class="mt-8 text-sm text-slate-500">
                Need help? <a href="{{ route('contact') }}" class="text-primary-600 hover:underline">Contact us</a>
            </p>
        </div>
    </div>
</body>
</html>
