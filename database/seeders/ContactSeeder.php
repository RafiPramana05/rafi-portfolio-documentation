<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Contact::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Project Collaboration Inquiry',
            'message' => 'Hello Rafi! I am impressed by your portfolio and would like to discuss a potential collaboration opportunity. I am working on a legal tech startup and would love to have someone with your background and expertise join our team.',
            'status' => 'unread',
            'created_at' => now()->subDays(2),
        ]);

        \App\Models\Contact::create([
            'name' => 'Sarah Wilson',
            'email' => 'sarah.wilson@university.edu',
            'subject' => 'Research Partnership',
            'message' => 'Hi Rafi, I am a researcher at the University of Melbourne studying Special Learning Disabilities. I came across your research work and would like to discuss potential collaboration opportunities.',
            'status' => 'read',
            'created_at' => now()->subDays(5),
        ]);

        \App\Models\Contact::create([
            'name' => 'Michael Chen',
            'email' => 'michael.chen@techcorp.com',
            'subject' => 'Speaking Opportunity',
            'message' => 'Dear Rafi, we are organizing an international conference on youth leadership and would like to invite you as a keynote speaker. Your experience in community leadership would be valuable for our audience.',
            'status' => 'replied',
            'reply_message' => 'Hello Michael, thank you for this wonderful opportunity. I would be honored to speak at your conference. Please send me more details about the event, including dates, location, and the specific topics you would like me to cover.',
            'replied_at' => now()->subDays(1),
            'created_at' => now()->subDays(3),
        ]);

        \App\Models\Contact::create([
            'name' => 'Anna Rodriguez',
            'email' => 'anna.rodriguez@ngo.org',
            'subject' => 'Volunteer Organization Inquiry',
            'message' => 'Hello! I represent a non-profit organization focused on educational equality. We are looking for passionate volunteers who can help us with our legal advocacy efforts. Would you be interested in joining our cause?',
            'status' => 'unread',
            'created_at' => now()->subHours(6),
        ]);

        \App\Models\Contact::create([
            'name' => 'David Kim',
            'email' => 'david.kim@startup.io',
            'subject' => 'EdTech Startup Consultation',
            'message' => 'Hi Rafi, I am founding an EdTech startup focused on inclusive learning solutions. Your background in education and legal advocacy makes you an ideal advisor. Would you be open to discussing this opportunity over a call?',
            'status' => 'unread',
            'created_at' => now()->subHours(2),
        ]);
    }
}
