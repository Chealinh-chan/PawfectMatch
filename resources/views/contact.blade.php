@extends('layouts.master')

@section('content')
    <!-- Contact Banner Section -->
    <section class="contact-page-banner">
        <div class="banner-content">
            <h1>Contact Us</h1>
            <p>Contact us directly</p>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="footer-column-map">
                            <!-- Replace the src below with your actual Google Maps embed link -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.573419471718!2d104.89540131138948!3d11.582407943761467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517bf7757d23%3A0x965c34888684bf1!2sParagon%20International%20University!5e0!3m2!1sen!2skh!4v1750927329655!5m2!1sen!2skh" 
                                width="100%" 
                                height="500" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
    </section>

    <!-- Contact Info and Form Section -->
    <div class="contact-page-content">
        <div class="container">
            <!-- Contact Details Section -->
            <section class="contact-details-section">
                <div class="contact-detail-item">
                     <div class="icon"><i class="fa-solid fa-house-chimney"></i></div>
                    <div>
                        <strong>Phnom Penh, Cambodia</strong>
                        <span>Paragon International University, Toul Kork</span>
                    </div>
                </div>
                <div class="contact-detail-item">
                   <div class="icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                    <div>
                        <strong>(+855)012 234 567</strong>
                        <span>Monday - Sunday 9AM - 5PM</span>
                    </div>
                </div>
                <div class="contact-detail-item">
                     <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <strong>PawfectMatch@gmail.com</strong>
                        <span>24/7 Online Support</span>
                    </div>
                </div>
            </section>

            <!-- Contact Form Section -->
            <section class="contact-form-section">
                <h2>Get In Touch With Us</h2>

                @if (session('status'))
                    <div class="alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-group-contact">
                        <textarea name="message" placeholder="Enter Message" rows="6" required></textarea>
                    </div>
                    <div class="form-group-contact">
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group-contact">
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group-contact">
                        <input type="tel" name="phone" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-actions-contact">
                        <button type="submit" class="btn-submit-contact">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection