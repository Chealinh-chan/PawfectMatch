@extends('layouts.master')

@section('content')
    <!-- Donate Banner Section -->
    <section class="donate-page-banner">
        <div class="banner-content">
            <h1>Donate</h1>
            <p>A small help can make a big change</p>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="donate-page-content">
        <div class="container text-center">
            
            <!-- QR Codes Section -->
            <section class="qr-code-section">
                <h2 class="section-title">Pawfect Match</h2>
                <div class="qr-code-grid">
                    <img src="{{ asset('img/dollars.png') }}" alt="QR Code for donation option 1">
                    <img src="{{ asset('img/riel.png') }}" alt="QR Code for donation option 2">
                </div>
            </section>

            <!-- "Why Donate" Section -->
            <section class="why-donate-section">
                <h3>Why you should donate to us</h3>
                <p>
                    Every pet deserves a loving home, but many are still waiting. At our pet adoption center, we rescue, rehabilitate, and rehome abandoned, abused, and neglected animals—giving them a second chance at life. Your donation helps us provide food, shelter, medical care, and the love these pets need while they wait for their forever families.
                </p>
                <p>
                    By supporting us, you're not just giving to a shelter—you're saving lives, creating happy endings, and helping us build a more compassionate community. No gift is too small to make a big difference. Donate today and be a hero for a pet in need.
                </p>
            </section>
        </div>
    </div>
@endsection