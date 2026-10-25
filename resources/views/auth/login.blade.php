<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div style="text-align: center; margin-bottom: 28px;">
        <h2 style="color: #4A2E1D; font-size: 26px; font-family: serif; font-weight: bold;">User Login</h2>
        <p style="color: #7A6859; font-size: 13px; margin-top: 6px;">Masuk untuk melanjutkan Pre-Order kamu</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div style="margin-bottom: 18px;">
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus autocomplete="username" 
                   style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 14px 22px; font-size: 14px; background-color: #FFF8F0; color: #4A2E1D; outline: none;">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600 px-4" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 18px;">
            <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" 
                   style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 14px 22px; font-size: 14px; background-color: #FFF8F0; color: #4A2E1D; outline: none;">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600 px-4" />
        </div>

        <!-- Remember & Forgot Password -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding: 0 8px; font-size: 13px;">
            <label style="display: flex; align-items: center; gap: 8px; color: #7A6859; cursor: pointer;">
                <input type="checkbox" name="remember" style="accent-color: #4A2E1D;">
                <span>Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color: #E67E22; text-decoration: none; font-weight: 600;">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Tombol Login -->
        <button type="submit" style="width: 100%; background-color: #4A2E1D; color: #FFF8F0; border: none; padding: 14px; border-radius: 50px; font-weight: bold; font-size: 15px; cursor: pointer; box-shadow: 0 8px 20px rgba(74, 46, 29, 0.2);">
            Login
        </button>

        <div style="text-align: center; margin-top: 22px; font-size: 13px;">
            <span style="color: #7A6859;">Belum punya akun? </span>
            <a href="{{ route('register') }}" style="color: #E67E22; font-weight: bold; text-decoration: none;">Daftar di sini</a>
        </div>
    </form>
</x-guest-layout>