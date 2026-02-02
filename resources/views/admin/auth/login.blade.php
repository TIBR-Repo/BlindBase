<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BlindBase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-secondary-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <span class="text-3xl font-bold">
                <span class="text-white">BLIND</span><span class="text-primary-400">BASE</span>
            </span>
            <p class="text-slate-400 mt-2">Admin Panel</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl p-8 shadow-xl">
            <h1 class="text-2xl font-bold text-secondary-900 mb-2">Welcome back</h1>
            <p class="text-slate-600 mb-6">Sign in to access the admin panel</p>

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-secondary-900 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('email') border-red-500 @enderror"
                        placeholder="admin@blindbase.co.uk">
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-secondary-900 mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Enter your password">
                </div>

                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" value="1"
                            class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                        <span class="text-sm text-slate-600">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all">
                    Sign In
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>
        </div>

        <p class="text-center text-slate-500 text-sm mt-6">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">← Back to website</a>
        </p>
    </div>
</body>
</html>
