<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['name' => 'Rahul Sharma', 'star' => 5, 'description' => 'Amazing stay! Royal experience and very comfortable rooms.'],
            ['name' => 'Priya Patel', 'star' => 5, 'description' => 'Absolutely luxurious! The attention to detail was amazing.'],
            ['name' => 'Arjun Mehta', 'star' => 5, 'description' => 'Perfect blend of tradition and modernity.'],
            ['name' => 'Sneha Verma', 'star' => 5, 'description' => 'Outstanding hospitality! Spacious rooms and great breakfast.'],
            ['name' => 'Vikram Singh', 'star' => 5, 'description' => 'Excellent service and comfortable stay.'],
            ['name' => 'Anjali Desai', 'star' => 5, 'description' => 'Beautiful property with elegant interiors.'],
            ['name' => 'Rajesh Kumar', 'star' => 5, 'description' => 'Perfect for business travelers. Fast WiFi and comfortable rooms.'],
            ['name' => 'Meera Joshi', 'star' => 5, 'description' => 'Wonderful family vacation! Kids loved the pool.'],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
