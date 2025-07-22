<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Pet;
use App\Models\PetType; 
use App\Models\Appointment;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $availablePets = [
            ['image' => 'img/pic2.jpg', 'label' => 'Dogs'],
            ['image' => 'img/pic3.jpg', 'label' => 'Cats'],
            ['image' => 'img/fish.webp', 'label' => 'Other animals'],
        ];

        $dogCareArticle = [
            'image' => 'img/dogbanner.jpg',
            'title' => 'Dog Care Basics',
            'description' => 'Everything to know about your dog.'
        ];

        $catCareArticle = [
            'image' => 'img/catbanner.jpg',
            'title' => 'Cat Care Basics',
            'description' => 'Everything to know about your cat.'
        ];

        return view('home', compact('availablePets', 'dogCareArticle', 'catCareArticle'));
    }

    public function pets(Request $request)
    {
        $query = Pet::query();

        // Filter by pet type (Dog, Cat, etc.)
        if ($request->has('type')) {
            $types = $request->type;
            $query->where(function ($q) use ($types) {
                $normalTypes = array_filter($types, fn($t) => $t === 'Dog' || $t === 'Cat');
                if (!empty($normalTypes)) {
                    $q->orWhereIn('type', $normalTypes);
                }
                if (in_array('Others', $types)) {
                    $q->orWhereNotIn('type', ['Dog', 'Cat']);
                }
            });
        }

        // Filter by breed
        if ($request->has('breed')) {
            $query->whereIn('breed', $request->breed);
        }

        // Filter by max age (assuming age is stored as "X year-old" or similar)
        if ($request->filled('max_age')) {
            // Extract numeric value from age string for comparison
            $query->whereRaw('CAST(SUBSTRING_INDEX(age, " ", 1) AS UNSIGNED) <= ?', [(int)$request->max_age]);
        }

        // Filter by size (weight)
        if ($request->has('size')) {
            $query->where(function ($q) use ($request) {
                foreach ($request->size as $size) {
                    if ($size == 'Small') {
                        $q->orWhereRaw('CAST(weight AS UNSIGNED) BETWEEN 0 AND 10');
                    } elseif ($size == 'Medium') {
                        $q->orWhereRaw('CAST(weight AS UNSIGNED) BETWEEN 11 AND 25');
                    } elseif ($size == 'Large') {
                        $q->orWhereRaw('CAST(weight AS UNSIGNED) > 25');
                    }
                }
            });
        }
        $pets = $query->with('images')->latest()->take(6)->get();

        $allBreeds = Pet::select('breed as name')->distinct()->get();
        $testimonials = [
            ['name' => 'Emily Davis', 'rating' => 5, 'quote' => 'Highly recommend adopting from here.'],
            ['name' => 'James Brown', 'rating' => 5, 'quote' => 'A wonderful place to find a loving pet.'],
            ['name' => 'Alice Johnson', 'rating' => 5, 'quote' => 'Adopting Max was the best decision I\'ve ever made!'],
            ['name' => 'Bob Smith', 'rating' => 5, 'quote' => 'Luna brings so much joy to our family.'],
        ];

        return view('pets', compact('pets', 'allBreeds', 'testimonials'));
    }
    public function showPet($slug)
    {
        $pet = Pet::where('slug', $slug)->with('firstImage')->firstOrFail();
        return view('pet-details', compact('pet'));
    }

    public function showCatCare()
    {
        $carePoints = [
            [ 
            'title' => 'Food and Water', 
            'points' => ['Feed high-quality cat food formulated for their specific life stage.', 
            'Provide meals on a consistent schedule, usually twice a day.', 
            'Ensure fresh, clean water is always available, preferably away from their food bowl.', 
            'Never feed them dog food, onions, garlic, or dairy products.',]],
            [
            'title' => 'Litter Box', 
            'points' => ['Scoop the litter box at least once a day to keep it clean.', 
            'Place the box in a quiet, low-traffic area.', 
            'A general rule is one litter box per cat, plus one extra.', 
            'Completely change the litter and wash the box every 1-2 weeks.',]],
            [
            'title' => 'Grooming', 
            'points' => ['Brush your cat regularly to reduce shedding and prevent hairballs.', 
            'Most cats are excellent self-groomers and rarely need a full bath.', 
            'Trim their claws every few weeks to prevent them from getting too sharp.', 
            'Check their ears for cleanliness and their teeth for signs of dental issues.',]],
            [
            'title' => 'Vet Care', 
            'points' => ['Schedule annual wellness exams with your veterinarian.', 
            'Keep your cat up-to-date on core vaccinations and parasite control.', 
            'Spaying or neutering is crucial for their long-term health and well-being.', 
            'Watch for changes in behavior, appetite, or litter box habits as signs of illness.',]],
            [
            'title' => 'Playtime', 
            'points' => ['Engage in daily interactive play sessions with toys like wands or laser pointers.', 
            'Provide a variety of toys to keep them mentally stimulated and prevent boredom.', 
            'Offer scratching posts and cat trees to satisfy their natural instincts.', 
            'Rotate toys to maintain their interest.',]],
            [
            'title' => 'Safe Home', 
            'points' => ['Create vertical spaces like shelves or cat trees for them to climb and observe.', 
            'Keep toxic plants, chemicals, and small, swallowable objects out of reach.', 
            'Provide a safe, cozy hiding spot where they can retreat and feel secure.', 
            'Keeping cats indoors is the safest option to protect them from external dangers.',]],
        ];
        return view('cat-care', ['carePoints' => $carePoints]);
    }

    public function showDogCare()
    {
        $carePoints = [
            ['title' => 'Food and Water', 'points' => ['Feed high-quality dog food suitable for their age (puppy, adult, senior).', 'Stick to a regular meal schedule, typically twice a day.', 'Always provide access to clean, fresh water.', 'Avoid feeding them harmful human foods like chocolate, grapes, and onions.',]],
            ['title' => 'Exercise and Play', 'points' => ['Provide daily walks and opportunities for off-leash play in a safe area.', 'Engage their minds with puzzle toys and games like fetch or tug-of-war.', 'Regular exercise prevents obesity, boredom, and destructive behavior.',]],
            ['title' => 'Grooming and Hygiene', 'points' => ['Brush their coat regularly to reduce shedding and prevent mats.', 'Bathe them as needed (typically every 4-6 weeks) with dog-specific shampoo.', 'Trim their nails every few weeks and clean their ears gently.', 'Establish a dental care routine with brushing or dental chews.',]],
            ['title' => 'Vet Visits and Health', 'points' => ['Schedule annual check-ups with a veterinarian.', 'Keep them up-to-date on all necessary vaccinations and parasite prevention.', 'Consider spaying or neutering to prevent health issues and unwanted litters.', 'Monitor for any signs of illness, such as changes in appetite or energy levels.',]],
            ['title' => 'Training and Socializing', 'points' => ['Use positive reinforcement techniques with treats and praise.', 'Teach basic commands like sit, stay, come, and leave it.', 'Socialize your puppy with various people and other dogs from a young age.', 'Be patient and consistent with house training.',]],
            ['title' => 'Safe and Comfortable Home', 'points' => ['Provide a cozy bed or crate as their own personal space.', 'Dog-proof your home by securing cords, trash, and toxic chemicals.', 'Ensure they have proper identification, like a collar with tags and a microchip.',]],
        ];
        return view('dog-care', ['carePoints' => $carePoints]);
    }

    public function showAboutPage()
    {
        $teamMembers = [
            ['name' => 'Rothisa Song', 'role' => 'API', 'description' => 'Responsible for integrating animal welfare data sources.', 'image' => 'img/tisa.png',],
            ['name' => 'Chealinh Chan', 'role' => 'Frontend', 'description' => 'Creates a user-friendly interface for our website.', 'image' => 'img/chealinh.png',],
            ['name' => 'Puthisom Sear', 'role' => 'Backend', 'description' => 'Handles server-side logic and database management.', 'image' => 'img/sam.png',],
        ];
        return view('about', ['teamMembers' => $teamMembers]);
    }

    public function showDonatePage()
    {
        return view('donate');
    }
    public function showContactPage()
    {
        return view('contact');
    }
    public function storeContactForm(Request $request)
    {
        return redirect()->route('contact')->width('status', 'Thank you for your message! We will get back to you soon.');
    }

    public function showAllPets(Request $request)
    {
        $query = Pet::query();

        if ($request->has('type')) {
            $types = $request->type;
            $query->where(function ($q) use ($types) {
                $normalTypes = array_filter($types, fn($t) => $t === 'Dog' || $t === 'Cat');
                if (!empty($normalTypes)) {
                    $q->orWhereIn('type', $normalTypes);
                }
                if (in_array('Others', $types)) {
                    $q->orWhereNotIn('type', ['Dog', 'Cat']);
                }
            });
        }
        if ($request->has('breed')) {
            $query->whereIn('breed', $request->breed);
        }
        if ($request->filled('max_age')) {
            $query->whereRaw('CAST(SUBSTRING_INDEX(age, " ", 1) AS UNSIGNED) <= ?', [(int)$request->max_age]);
        }
        if ($request->has('size')) {
            $query->where(function ($q) use ($request) {
                foreach ($request->size as $size) {
                    if ($size == 'Small') $q->orWhereRaw('CAST(weight AS UNSIGNED) BETWEEN 0 AND 10');
                    if ($size == 'Medium') $q->orWhereRaw('CAST(weight AS UNSIGNED) BETWEEN 11 AND 25');
                    if ($size == 'Large') $q->orWhereRaw('CAST(weight AS UNSIGNED) > 25');
                }
            });
        }

        $pets = $query->with('images')->latest()->get(); // No take(6) here

        $allBreeds = Pet::select('breed as name')->distinct()->get();
        $sizes = $request->get('size', []);

        return view('pets-all', compact('pets', 'allBreeds', 'sizes'));
    }

    public function showAppointmentForm($slug)
    {
        Log::info("Appointment route hit. Slug = $slug");
        $pet = Pet::where('slug', $slug)->firstOrFail();
        Log::info("Pet found: " . $pet->name);
        return view('appointment-hybrid', ['pet' => $pet]);
    }

    public function appointmentRedirect($slug)
    {
        if (Auth::check()) {
            return redirect()->route('appointments.create', ['slug' => $slug]);
        } else {
            Session::put('intended_appointment_slug', $slug);
            return redirect()->route('login');
        }
    }
    public function storeAppointment(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'pet_slug' => 'required|exists:pets,slug',
        ]);

        $pet = Pet::where('slug', $validated['pet_slug'])->firstOrFail();

        // Save appointment
        Appointment::create([
            'booking_date' => $validated['appointment_date'],
            'phone_number' => $validated['phone'],
            'user_id' => Auth::id(),
            'pet_id' => $pet->id,
            'status' => 'pending',
        ]);

        // Send email to fixed dummy email for now
        Mail::to('cchan2@paragoniu.edu.kh')->send(
            new AppointmentConfirmation($pet, $validated['appointment_date'])
        );

        // Redirect to pets page with success message
        return redirect()->route('pets.all')->with('success', 'Appointment booked! A confirmation email has been sent.');
    }
    public function showAppointments()
    {
        $user = Auth::user();
        $appointments = $user->appointments()
            ->with('pet')
            ->orderBy('booking_date', 'asc') 
            ->get();

        // The view name assumes your file is resources/views/appointments.blade.php
        return view('appointments', compact('appointments'));
    }
}
