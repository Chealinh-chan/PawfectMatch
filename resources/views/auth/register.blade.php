@extends('layouts.master') {{-- Use your main app layout --}}

@section('content')
<div class="auth-page-wrapper">
    <div class="auth-form-card">

        <h2>Sign Up</h2>

        <img src="{{ asset('img/logorem.png') }}" alt="Pawfect Match Logo" class="auth-logo">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group-auth">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group-auth">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group-auth password-wrapper">
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                <span class="password-toggle" onclick="togglePasswordVisibility('password', this)">show</span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group-auth password-wrapper">
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                <span class="password-toggle" onclick="togglePasswordVisibility('password_confirmation', this)">show</span>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-auth-submit">
                Sign up
            </button>
        </form>

        <!-- Already Registered Link -->
        <a href="{{ route('login') }}" class="auth-secondary-link">
            Already has an account? Log In
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
