<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultImages = [
            'hero_section_img1.png',
            'hero_section_img2.jpg',
            'hero_section_img3.jpg',
            'heroimg1.jpg',
            'heroimg1.png',
            'heroimg3.jpg',
            'hotelimg-4.png',
        ];

        $galleries = [
            [
                'name' => 'Luxury Suite Gallery',
                'heading' => 'Premium Accommodations',
                'description' => 'Beautiful images of our luxury suites with modern amenities and elegant design.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Hotel Lobby',
                'heading' => 'Grand Entrance',
                'description' => 'Elegant lobby area with modern design and welcoming atmosphere.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg', 'images/heroimg1.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Restaurant Views',
                'heading' => 'Fine Dining Experience',
                'description' => 'Fine dining restaurant with scenic views and exquisite cuisine.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Swimming Pool',
                'heading' => 'Outdoor Recreation',
                'description' => 'Outdoor swimming pool area perfect for relaxation and fun.',
                'main_image' => 'images/heroimg3.jpg',
                'sub_images' => ['images/hotelimg-4.png', 'images/hero_section_img1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Conference Hall',
                'heading' => 'Business Facilities',
                'description' => 'Spacious conference and meeting rooms equipped with modern technology.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Spa & Wellness',
                'heading' => 'Relaxation Center',
                'description' => 'Relaxing spa and wellness center for ultimate rejuvenation.',
                'main_image' => 'images/hero_section_img3.jpg',
                'sub_images' => ['images/heroimg1.jpg', 'images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Garden Area',
                'heading' => 'Natural Beauty',
                'description' => 'Beautiful garden and outdoor spaces for peaceful moments.',
                'main_image' => 'images/heroimg1.png',
                'sub_images' => ['images/heroimg3.jpg', 'images/hotelimg-4.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Room Interiors',
                'heading' => 'Comfortable Stay',
                'description' => 'Comfortable and stylish room interiors designed for your comfort.',
                'main_image' => 'images/hotelimg-4.png',
                'sub_images' => ['images/hero_section_img1.png', 'images/hero_section_img2.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Reception Area',
                'heading' => 'Welcome Center',
                'description' => 'Welcoming reception and check-in area with professional staff.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg', 'images/heroimg1.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Hotel Exterior',
                'heading' => 'Architectural Beauty',
                'description' => 'Stunning exterior views of the hotel showcasing modern architecture.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Hotel Promotional Video',
                'heading' => 'Experience Our Hotel',
                'description' => 'Watch our promotional video showcasing the best of Hotel Kiran Place - luxury accommodations, fine dining, and exceptional service.',
                'main_image' => 'videos/home-page-new-video-35-sec-web.mp4',
                'sub_images' => null,
                'type' => 'video'
            ],
            [
                'name' => 'Deluxe Rooms',
                'heading' => 'Elegant Accommodations',
                'description' => 'Spacious deluxe rooms with premium amenities and stunning views.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg', 'images/heroimg1.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Dining Hall',
                'heading' => 'Culinary Excellence',
                'description' => 'Our main dining hall offering international and local cuisines.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Fitness Center',
                'heading' => 'Stay Fit',
                'description' => 'Fully equipped fitness center with modern exercise equipment.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Business Lounge',
                'heading' => 'Work in Comfort',
                'description' => 'Professional business lounge for meetings and work.',
                'main_image' => 'images/heroimg3.jpg',
                'sub_images' => ['images/hotelimg-4.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Rooftop Terrace',
                'heading' => 'Scenic Views',
                'description' => 'Beautiful rooftop terrace with panoramic city views.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg', 'images/heroimg1.jpg', 'images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Kids Play Area',
                'heading' => 'Family Fun',
                'description' => 'Dedicated play area for children with safe and fun activities.',
                'main_image' => 'images/hero_section_img3.jpg',
                'sub_images' => ['images/heroimg1.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Bar & Lounge',
                'heading' => 'Evening Entertainment',
                'description' => 'Elegant bar and lounge for evening drinks and socializing.',
                'main_image' => 'images/heroimg1.png',
                'sub_images' => ['images/heroimg3.jpg', 'images/hotelimg-4.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Parking Facility',
                'heading' => 'Secure Parking',
                'description' => 'Spacious and secure parking facility for all guests.',
                'main_image' => 'images/hotelimg-4.png',
                'sub_images' => ['images/hero_section_img1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Banquet Hall',
                'heading' => 'Event Venue',
                'description' => 'Grand banquet hall perfect for weddings and celebrations.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg', 'images/heroimg1.jpg', 'images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Library Corner',
                'heading' => 'Quiet Reading',
                'description' => 'Peaceful library corner with collection of books and magazines.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Gymnasium',
                'heading' => 'Fitness First',
                'description' => 'State-of-the-art gymnasium with professional trainers.',
                'main_image' => 'images/heroimg3.jpg',
                'sub_images' => ['images/hotelimg-4.png', 'images/hero_section_img1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Outdoor Cafe',
                'heading' => 'Al Fresco Dining',
                'description' => 'Charming outdoor cafe for breakfast and light meals.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Game Room',
                'heading' => 'Entertainment Zone',
                'description' => 'Fun game room with pool table, board games, and more.',
                'main_image' => 'images/hero_section_img3.jpg',
                'sub_images' => ['images/heroimg1.jpg', 'images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Laundry Service',
                'heading' => 'Convenience Services',
                'description' => 'Professional laundry and dry cleaning services available.',
                'main_image' => 'images/heroimg1.png',
                'sub_images' => ['images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Valet Service',
                'heading' => 'Premium Service',
                'description' => 'Professional valet parking service for your convenience.',
                'main_image' => 'images/hotelimg-4.png',
                'sub_images' => ['images/hero_section_img1.png', 'images/hero_section_img2.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Wedding Venue',
                'heading' => 'Special Occasions',
                'description' => 'Beautiful wedding venue with elegant decorations and setup.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg', 'images/heroimg1.jpg', 'images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Executive Suite',
                'heading' => 'Luxury Living',
                'description' => 'Premium executive suite with separate living and dining areas.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Coffee Shop',
                'heading' => 'Fresh Brews',
                'description' => 'Cozy coffee shop serving premium coffee and pastries.',
                'main_image' => 'images/heroimg3.jpg',
                'sub_images' => ['images/hotelimg-4.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Gift Shop',
                'heading' => 'Souvenirs & Essentials',
                'description' => 'Convenient gift shop with souvenirs and travel essentials.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Terrace Garden',
                'heading' => 'Green Spaces',
                'description' => 'Beautiful terrace garden with plants and seating areas.',
                'main_image' => 'images/hero_section_img3.jpg',
                'sub_images' => ['images/heroimg1.jpg', 'images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Presidential Suite',
                'heading' => 'Ultimate Luxury',
                'description' => 'Luxurious presidential suite with premium amenities and stunning views.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg', 'images/heroimg1.jpg', 'images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Poolside Bar',
                'heading' => 'Refreshment Zone',
                'description' => 'Poolside bar serving refreshing drinks and light snacks.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Meditation Room',
                'heading' => 'Peace & Tranquility',
                'description' => 'Quiet meditation room for relaxation and mindfulness.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Yoga Studio',
                'heading' => 'Wellness Activities',
                'description' => 'Dedicated yoga studio for wellness and fitness classes.',
                'main_image' => 'images/heroimg3.jpg',
                'sub_images' => ['images/hotelimg-4.png', 'images/hero_section_img1.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Rooftop Restaurant',
                'heading' => 'Dining with a View',
                'description' => 'Elegant rooftop restaurant offering fine dining with panoramic views.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Kids Club',
                'heading' => 'Children Entertainment',
                'description' => 'Fun-filled kids club with games and activities for children.',
                'main_image' => 'images/hero_section_img3.jpg',
                'sub_images' => ['images/heroimg1.jpg', 'images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Executive Lounge',
                'heading' => 'Business Class',
                'description' => 'Exclusive executive lounge for business travelers.',
                'main_image' => 'images/heroimg1.png',
                'sub_images' => ['images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Beach Access',
                'heading' => 'Coastal Location',
                'description' => 'Direct access to beautiful beach for guests.',
                'main_image' => 'images/hotelimg-4.png',
                'sub_images' => ['images/hero_section_img1.png', 'images/hero_section_img2.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Helipad Facility',
                'heading' => 'VIP Services',
                'description' => 'Private helipad for VIP guests and special occasions.',
                'main_image' => 'images/hero_section_img2.jpg',
                'sub_images' => ['images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Wine Cellar',
                'heading' => 'Premium Collection',
                'description' => 'Exclusive wine cellar with curated selection of fine wines.',
                'main_image' => 'images/heroimg1.jpg',
                'sub_images' => ['images/heroimg1.png', 'images/heroimg3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Art Gallery',
                'heading' => 'Cultural Experience',
                'description' => 'In-house art gallery showcasing local and international artworks.',
                'main_image' => 'images/heroimg3.jpg',
                'sub_images' => ['images/hotelimg-4.png'],
                'type' => 'image'
            ],
            [
                'name' => 'Pet Care Center',
                'heading' => 'Pet Friendly',
                'description' => 'Dedicated pet care center for your furry companions.',
                'main_image' => 'images/hero_section_img1.png',
                'sub_images' => ['images/hero_section_img2.jpg', 'images/hero_section_img3.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Shopping Arcade',
                'heading' => 'Retail Therapy',
                'description' => 'Elegant shopping arcade with luxury brands and souvenirs.',
                'main_image' => 'images/hero_section_img3.jpg',
                'sub_images' => ['images/heroimg1.jpg'],
                'type' => 'image'
            ],
            [
                'name' => 'Hotel Tour Video',
                'heading' => 'Virtual Tour',
                'description' => 'Comprehensive video tour of our hotel facilities and amenities.',
                'main_image' => 'videos/home-page-new-video-35-sec-web.mp4',
                'sub_images' => null,
                'type' => 'video'
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::firstOrCreate(
                ['name' => $gallery['name']],
                $gallery
            );
        }
    }
}
