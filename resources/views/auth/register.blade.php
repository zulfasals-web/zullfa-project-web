<x-guest-layout>
    <div style="text-align: center; margin-bottom: 28px;">
        <h2 style="color: #4A2E1D; font-size: 26px; font-family: serif; font-weight: bold;">Buat Akun Baru</h2>
        <p style="color: #7A6859; font-size: 13px; margin-top: 6px;">Daftar untuk mulai Pre-Order roti favoritmu</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div style="margin-bottom: 18px;">
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autofocus autocomplete="name" 
                   style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 14px 22px; font-size: 14px; background-color: #FFF8F0; color: #4A2E1D; outline: none;">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-600 px-4" />
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 18px;">
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="username" 
                   style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 14px 22px; font-size: 14px; background-color: #FFF8F0; color: #4A2E1D; outline: none;">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600 px-4" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 18px;">
            <input id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password" 
                   style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 14px 22px; font-size: 14px; background-color: #FFF8F0; color: #4A2E1D; outline: none;">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600 px-4" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 24px;">
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password" 
                   style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 14px 22px; font-size: 14px; background-color: #FFF8F0; color: #4A2E1D; outline: none;">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-600 px-4" />
        </div>

        <!-- Tombol Register -->
        <button type="submit" style="width: 100%; background-color: #4A2E1D; color: #FFF8F0; border: none; padding: 14px; border-radius: 50px; font-weight: bold; font-size: 15px; cursor: pointer; box-shadow: 0 8px 20px rgba(74, 46, 29, 0.2);">
            Daftar Akun
        </button>

        <div style="text-align: center; margin-top: 22px; font-size: 13px;">
            <span style="color: #7A6859;">Sudah punya akun? </span>
            <a href="{{ route('login') }}" style="color: #E67E22; font-weight: bold; text-decoration: none;">Log In di sini</a>
        </div>
    </form>
</x-guest-layout>