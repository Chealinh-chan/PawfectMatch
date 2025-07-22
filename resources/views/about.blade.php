@extends('layouts.master')

@section('content')
    <!-- "About Us" Banner Section -->
    <section class="about-page-banner">
        <div class="banner-content">
            <h1>About Us</h1>
            <p>At Pet Adoption Systems, our mission is to connect pets in need with loving homes. We provide a platform that simplifies the adoption process for both pets and potential adopters.</p>
        </div>
    </section>

    <!-- Vision, Mission, Goal Section -->
    <section class="vmg-section">
        <div class="container">
            <div class="vmg-grid">
                <!-- Our Vision -->
                <div class="vmg-card vision-card">
                    <h3>Our Vision</h3>
                    <p>Our vision is to build a world where every pet is loved, cared for, and given a safe forever home. We aim to become a trusted platform that bridges the gap between shelters and compassionate individuals, promoting a culture of responsible pet ownership and animal welfare.</p>
                </div>

                <!-- Our Mission -->
                <div class="vmg-card mission-card">
                    <h3>Our Mission</h3>
                    <p>Our mission is to provide an intuitive and reliable system that simplifies the pet adoption process, supports animal shelters with digital tools, and educates the public on pet care. We are committed to helping more animals get adopted by improving visibility, communication, and trust between adopters and caregivers.</p>
                </div>

                <!-- Our Goal -->
                <div class="vmg-card goal-card">
                    <h3>Our Goal</h3>
                    <p>We strive to increase pet adoption rates by connecting adopters with shelters efficiently, ensure each pet's health and history is well-documented and accessible, and empower shelters with tools to manage pets, appointments, and care routines. Ultimately, we aim to improve the lives of both animals and their future families.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- "Meet Our Team" Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>
            <p class="team-intro">At the heart of our platform is a passionate team of animal lovers, developers, and adoption advocates dedicated to making a difference. From software engineers who build seamless user experiences to volunteers and coordinators who work closely with shelters, each member brings unique skills and a shared love for pets. Together, we are committed to connecting animals with loving homes and supporting every step of the adoption journey.</p>

            <div class="team-grid">
                @foreach($teamMembers as $member)
                <div class="team-card">
                    <img src="{{ asset($member['image']) }}" alt="Photo of {{ $member['name'] }}">
                    <div class="team-info">
                        <p class="role-name"><strong>{{ $member['role'] }}:</strong> {{ $member['name'] }}</p>
                        <p class="description">{{ $member['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection