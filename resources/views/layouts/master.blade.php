{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PawfectMatch')</title>

    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>

<body>

    @include('layouts.nav')

    <div class="content">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Match - Find Your Furry Friend</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <!-- Using FontAwesome for icons as a placeholder -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header class="main-header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('img/logorem.png') }}" alt="Pawfect Match Logo">
            </a>
        <nav class="main-nav">
    <a href="{{route('home')}}">HOME</a>
    <a href="{{route('pets')}}">PETS</a>
    <a href="{{route('about')}}">ABOUT</a>
    <a href="{{route('contact')}}">CONTACT</a>
    @auth
        <div x-data="{ open: false }" class="relative" style="display: flex; align-items: center;">
            <a href="#" @click.prevent="open = !open" class="dropdown-toggle" style="display: flex; align-items: center;">
                {{ Auth::user()->name }} <i class="fa fa-caret-down" style="margin-left: 4px;"></i>
            </a>
            <div x-show="open" @click.away="open = false" class="dropdown-menu" style="position: absolute; right: 0; background: #e8dfff; border: 0px solid #ccc; min-width: 100px; z-index: 100; border-radius: 4px;  margin: 50px 20px -90px">
                <a href="{{ route('appointments.index') }}" class="dropdown-item" style="display: block; padding: 8px 16px; color: #333;">My Appointments</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item" style="display: block; width: 100%; text-align: center; padding: 8px 16px; background: none; border: none; color: #333; cursor: pointer; font-weight: bold; font-size: 16px;">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{route('register')}}">SIGN UP</a>
    @endauth
</nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-top">
                PawfectMatch
            </div>
            <div class="footer-content">
                <div class="footer-column">
                    <div class="icon"><i class="fa-solid fa-house-chimney"></i></div>
                    <div class="info">
                        <h4>Address</h4>
                        <p>Paragon International University, <br>Toul Kork, Phnom Penh, <br>Cambodia</p>
                    </div>
                </div>
                <div class="footer-column">
                     <div class="icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                    <div class="info">
                        <h4>Phone Number</h4>
                        <p>(+855) 012 234 567 <br>Monday - Sunday <br>9AM - 5PM</p>
                    </div>
                </div>
                <div class="footer-column">
                     <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="info">
                        <h4>Email</h4>
                        <p>PawfectMatch@gmail.com <br>24/7 Online Support</p>
                    </div>
                </div>
                <div class="footer-column">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="info">
                        <h4>Location</h4>
                        <div class="footer-column-map">
                            <!-- Replace the src below with your actual Google Maps embed link -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.573419471718!2d104.89540131138948!3d11.582407943761467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517bf7757d23%3A0x965c34888684bf1!2sParagon%20International%20University!5e0!3m2!1sen!2skh!4v1750927329655!5m2!1sen!2skh" width="100%" 
                                height="150" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>
                    © 2025 PawfectMatch • <a href="#">Privacy Policy</a> • <a href="#">Terms of Service</a>
                </p>
            </div>
        </div>
    </footer>
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>