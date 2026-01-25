<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroSections = [
            [
                'type' => 'image',
                'title' => 'Luxury Hotel Experience',
                'description' => 'Experience the ultimate in luxury and comfort at our premium hotel. Enjoy world-class amenities and exceptional service.',
                'images' => [
                    [
                        'image' => 'images/hero_section_img1.png',
                        'title' => 'Welcome to Luxury',
                        'description' => 'Experience world-class hospitality and comfort'
                    ],
                    [
                        'image' => 'images/hero_section_img2.jpg',
                        'title' => 'Elegant Rooms',
                        'description' => 'Spacious and beautifully designed rooms with modern amenities'
                    ],
                    [
                        'image' => 'images/hero_section_img3.jpg',
                        'title' => 'Fine Dining',
                        'description' => 'Exquisite cuisine prepared by our expert chefs'
                    ]
                ],
                'is_active' => true,
                'order' => 1
            ],
            [
                'type' => 'image',
                'title' => 'Premium Accommodations',
                'description' => 'Discover our range of premium rooms and suites designed for your comfort and relaxation.',
                'images' => [
                    [
                        'image' => 'images/heroimg1.jpg',
                        'title' => 'Deluxe Suite',
                        'description' => 'Luxurious suite with panoramic views'
                    ],
                    [
                        'image' => 'images/heroimg1.png',
                        'title' => 'Executive Room',
                        'description' => 'Perfect for business travelers'
                    ],
                    [
                        'image' => 'images/heroimg3.jpg',
                        'title' => 'Presidential Suite',
                        'description' => 'The ultimate in luxury living'
                    ]
                ],
                'is_active' => true,
                'order' => 2
            ],
            [
                'type' => 'image',
                'title' => 'Unforgettable Stay',
                'description' => 'Create lasting memories with our exceptional services and beautiful surroundings.',
                'images' => [
                    [
                        'image' => 'images/hotelimg-4.png',
                        'title' => 'Swimming Pool',
                        'description' => 'Relax by our stunning pool area'
                    ],
                    [
                        'image' => 'images/hero_section_img1.png',
                        'title' => 'Spa & Wellness',
                        'description' => 'Rejuvenate your mind and body'
                    ]
                ],
                'is_active' => true,
                'order' => 3
            ],
            [
                'type' => 'video',
                'title' => 'Hotel Virtual Tour',
                'description' => 'Take a virtual tour of our hotel and explore all the amazing facilities we have to offer.',
                'video' => 'videos/home-page-new-video-35-sec-web.mp4',
                'video_title' => 'Welcome to Our Hotel',
                'video_description' => 'Experience the beauty and luxury of our hotel through this virtual tour. See our rooms, facilities, and services.',
                'is_active' => true,
                'order' => 4
            ],
            [
                'type' => 'image',
                'title' => 'Dining Excellence',
                'description' => 'Savor the finest cuisine in our award-winning restaurants.',
                'images' => [
                    [
                        'image' => 'images/hero_section_img2.jpg',
                        'title' => 'Main Restaurant',
                        'description' => 'International and local cuisine'
                    ],
                    [
                        'image' => 'images/hero_section_img3.jpg',
                        'title' => 'Rooftop Bar',
                        'description' => 'Enjoy drinks with a view'
                    ]
                ],
                'is_active' => false,
                'order' => 5
            ]
        ];

        foreach ($heroSections as $heroSection) {
            HeroSection::create($heroSection);
        }
    }
}
