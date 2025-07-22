@extends('layouts.master') {{-- Use your main app layout --}}

@section('content')
<div class="auth-page-wrapper">
    <div class="auth-form-card login-card"> {{-- Added 'login-card' class for styling override --}}

        <h2>Log in / Sign in</h2>

        <img src="{{ asset('img/logorem.png') }}" alt="Pawfect Match Logo" class="auth-logo">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group-auth">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group-auth password-wrapper">
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                <span class="password-toggle" onclick="togglePasswordVisibility('password', this)">show</span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="form-group-auth remember-me-wrapper">
                <label for="remember_me" class="inline-flex items-center">
                    <span class="ms-2 text-sm">Remember me</span>
                </label>
            </div> --}}

            <!-- Forgot Password Link -->
            {{-- <div class="forgot-password-link">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div> --}}

            <!-- Submit Button -->
            <button type="submit" class="btn-auth-submit">
                Log in
            </button>
        </form>

        <!-- Register Link -->
        <a href="{{ route('register') }}" class="auth-secondary-link">
            New to Pawfect Match? Join us
        </a>
    </div>
</div>

<!-- Password Toggle Script -->
<script>
function togglePasswordVisibility(fieldId, toggleElement) {
    const field = document.getElementById(fieldId);
    if (field.type === 'password') {
        field.type = 'text';
        toggleElement.textContent = 'hide';
    } else {
        field.type = 'password';
        toggleElement.textContent = 'show';
    }
}
</script>
@endsection
