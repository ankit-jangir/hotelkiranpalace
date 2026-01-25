<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'name' => 'Welcome to Hotel Kiran Place',
                'slug' => 'welcome-to-hotel-kiran-place',
                'description' => '<h2>Experience Luxury and Comfort</h2><p>Welcome to <strong>Hotel Kiran Place</strong>, where luxury meets comfort. Our hotel offers world-class amenities and exceptional service to make your stay memorable.</p>',
                'points' => [
                    ['title' => 'Premium Rooms', 'description' => 'Our rooms are equipped with modern amenities.'],
                    ['title' => 'Fine Dining', 'description' => 'Experience culinary excellence at our restaurants.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Best Hotel Experience in Town',
                'slug' => 'best-hotel-experience-in-town',
                'description' => '<h2>Unmatched Hospitality</h2><p>Discover the perfect blend of traditional warmth and modern luxury at our hotel.</p>',
                'points' => [
                    ['title' => '24/7 Service', 'description' => 'Round the clock customer support.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Luxury Accommodations',
                'slug' => 'luxury-accommodations',
                'description' => '<h2>Comfort Redefined</h2><p>Our rooms are designed to provide the ultimate comfort and relaxation.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Fine Dining Experience',
                'slug' => 'fine-dining-experience',
                'description' => '<h2>Culinary Excellence</h2><p>Indulge in our exquisite cuisine prepared by world-class chefs.</p>',
                'points' => [
                    ['title' => 'International Cuisine', 'description' => 'Taste dishes from around the world.'],
                    ['title' => 'Local Specialties', 'description' => 'Authentic local flavors.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Event and Conference Facilities',
                'slug' => 'event-and-conference-facilities',
                'description' => '<h2>Perfect Venue for Events</h2><p>Host your events and conferences in our state-of-the-art facilities.</p>',
                'points' => [],
                'is_active' => false,
            ],
            [
                'name' => 'Spa and Wellness Center',
                'slug' => 'spa-and-wellness-center',
                'description' => '<h2>Relax and Rejuvenate</h2><p>Unwind at our luxurious spa and wellness center.</p>',
                'points' => [
                    ['title' => 'Massage Therapy', 'description' => 'Professional massage services.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Swimming Pool and Recreation',
                'slug' => 'swimming-pool-and-recreation',
                'description' => '<h2>Fun and Relaxation</h2><p>Enjoy our beautiful swimming pool and recreational facilities.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Business Center Services',
                'slug' => 'business-center-services',
                'description' => '<h2>Work with Comfort</h2><p>Our business center provides all the facilities you need for work.</p>',
                'points' => [
                    ['title' => 'High-Speed Internet', 'description' => 'Fast and reliable WiFi.'],
                    ['title' => 'Meeting Rooms', 'description' => 'Fully equipped meeting spaces.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Travel Guide and Tips',
                'slug' => 'travel-guide-and-tips',
                'description' => '<h2>Explore the City</h2><p>Get the best travel tips and guides for exploring the local area.</p>',
                'points' => [],
                'is_active' => false,
            ],
            [
                'name' => 'Special Offers and Packages',
                'slug' => 'special-offers-and-packages',
                'description' => '<h2>Exclusive Deals</h2><p>Check out our special offers and packages for the best value.</p>',
                'points' => [
                    ['title' => 'Honeymoon Package', 'description' => 'Romantic getaway packages.'],
                    ['title' => 'Family Package', 'description' => 'Perfect for family vacations.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Room Amenities and Features',
                'slug' => 'room-amenities-and-features',
                'description' => '<h2>Comfort at Your Fingertips</h2><p>Every room is equipped with modern amenities for your comfort and convenience.</p>',
                'points' => [
                    ['title' => 'Smart TV', 'description' => 'Entertainment at your fingertips.'],
                    ['title' => 'Mini Bar', 'description' => 'Refreshments available in-room.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Location and Accessibility',
                'slug' => 'location-and-accessibility',
                'description' => '<h2>Prime Location</h2><p>Our hotel is strategically located for easy access to major attractions and business districts.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Guest Services',
                'slug' => 'guest-services',
                'description' => '<h2>We Care for You</h2><p>Our dedicated staff is committed to providing exceptional service throughout your stay.</p>',
                'points' => [
                    ['title' => 'Concierge Service', 'description' => '24/7 assistance available.'],
                    ['title' => 'Laundry Service', 'description' => 'Professional cleaning services.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Parking and Transportation',
                'slug' => 'parking-and-transportation',
                'description' => '<h2>Convenient Parking</h2><p>Secure parking facilities available for all guests.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Pet-Friendly Accommodations',
                'slug' => 'pet-friendly-accommodations',
                'description' => '<h2>Your Pets Are Welcome</h2><p>We welcome your furry friends with special pet-friendly rooms and services.</p>',
                'points' => [
                    ['title' => 'Pet Beds', 'description' => 'Comfortable accommodations for pets.'],
                ],
                'is_active' => false,
            ],
            [
                'name' => 'Wedding Venues',
                'slug' => 'wedding-venues',
                'description' => '<h2>Your Dream Wedding</h2><p>Host your special day in our elegant wedding venues.</p>',
                'points' => [
                    ['title' => 'Outdoor Venues', 'description' => 'Beautiful garden settings.'],
                    ['title' => 'Indoor Ballrooms', 'description' => 'Grand ballroom for celebrations.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Fitness and Gym Facilities',
                'slug' => 'fitness-and-gym-facilities',
                'description' => '<h2>Stay Fit</h2><p>Maintain your fitness routine at our fully equipped gym.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Kids Play Area',
                'slug' => 'kids-play-area',
                'description' => '<h2>Fun for Kids</h2><p>Dedicated play area to keep children entertained.</p>',
                'points' => [
                    ['title' => 'Supervised Activities', 'description' => 'Safe and fun activities for kids.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Airport Shuttle Service',
                'slug' => 'airport-shuttle-service',
                'description' => '<h2>Easy Transfers</h2><p>Complimentary airport shuttle service for your convenience.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Room Service Menu',
                'slug' => 'room-service-menu',
                'description' => '<h2>Dine in Comfort</h2><p>Enjoy delicious meals delivered to your room.</p>',
                'points' => [
                    ['title' => '24/7 Service', 'description' => 'Available round the clock.'],
                    ['title' => 'Extensive Menu', 'description' => 'Wide variety of cuisines.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Valet Parking Services',
                'slug' => 'valet-parking-services',
                'description' => '<h2>Hassle-Free Parking</h2><p>Professional valet parking service available.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Tourist Information Desk',
                'slug' => 'tourist-information-desk',
                'description' => '<h2>Explore the City</h2><p>Get information about local attractions and tours.</p>',
                'points' => [
                    ['title' => 'Tour Bookings', 'description' => 'Book city tours with us.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Currency Exchange',
                'slug' => 'currency-exchange',
                'description' => '<h2>Convenient Exchange</h2><p>Currency exchange services available at the front desk.</p>',
                'points' => [],
                'is_active' => false,
            ],
            [
                'name' => 'Medical Assistance',
                'slug' => 'medical-assistance',
                'description' => '<h2>Health and Safety</h2><p>Medical assistance and first aid available 24/7.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Luggage Storage',
                'slug' => 'luggage-storage',
                'description' => '<h2>Secure Storage</h2><p>Safe luggage storage facilities for early check-in or late checkout.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'WiFi and Internet Services',
                'slug' => 'wifi-and-internet-services',
                'description' => '<h2>Stay Connected</h2><p>High-speed WiFi available throughout the hotel.</p>',
                'points' => [
                    ['title' => 'Free WiFi', 'description' => 'Complimentary internet access.'],
                    ['title' => 'Business WiFi', 'description' => 'High-speed connection for business needs.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Breakfast Options',
                'slug' => 'breakfast-options',
                'description' => '<h2>Start Your Day Right</h2><p>Delicious breakfast options to kickstart your day.</p>',
                'points' => [
                    ['title' => 'Continental Breakfast', 'description' => 'Traditional breakfast items.'],
                    ['title' => 'Local Delicacies', 'description' => 'Authentic local breakfast options.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Security and Safety',
                'slug' => 'security-and-safety',
                'description' => '<h2>Your Safety Matters</h2><p>24/7 security and CCTV surveillance for your peace of mind.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Check-in and Check-out',
                'slug' => 'check-in-and-check-out',
                'description' => '<h2>Smooth Process</h2><p>Quick and efficient check-in and check-out procedures.</p>',
                'points' => [
                    ['title' => 'Early Check-in', 'description' => 'Available upon request.'],
                    ['title' => 'Late Check-out', 'description' => 'Extended checkout options.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Gift Shop',
                'slug' => 'gift-shop',
                'description' => '<h2>Souvenirs and Gifts</h2><p>Browse our gift shop for souvenirs and essentials.</p>',
                'points' => [],
                'is_active' => false,
            ],
            [
                'name' => 'Bar and Lounge',
                'slug' => 'bar-and-lounge',
                'description' => '<h2>Relax and Unwind</h2><p>Enjoy drinks and light snacks at our elegant bar and lounge.</p>',
                'points' => [
                    ['title' => 'Happy Hours', 'description' => 'Special discounts during happy hours.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Accessibility Features',
                'slug' => 'accessibility-features',
                'description' => '<h2>Inclusive Design</h2><p>Our hotel is designed to be accessible for all guests.</p>',
                'points' => [
                    ['title' => 'Wheelchair Access', 'description' => 'Fully accessible rooms and facilities.'],
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Sustainability Initiatives',
                'slug' => 'sustainability-initiatives',
                'description' => '<h2>Eco-Friendly Practices</h2><p>We are committed to sustainable and eco-friendly practices.</p>',
                'points' => [],
                'is_active' => true,
            ],
            [
                'name' => 'Loyalty Program',
                'slug' => 'loyalty-program',
                'description' => '<h2>Rewards for Loyal Guests</h2><p>Join our loyalty program and enjoy exclusive benefits.</p>',
                'points' => [
                    ['title' => 'Points System', 'description' => 'Earn points with every stay.'],
                    ['title' => 'Member Discounts', 'description' => 'Special rates for members.'],
                ],
                'is_active' => true,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::firstOrCreate(
                ['slug' => $blog['slug']],
                array_merge($blog, ['image' => null])
            );
        }
    }
}
