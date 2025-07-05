<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        Project::truncate();

        // Projects & Experiences
        Project::create([
            'title' => 'Youth.Id & Semangat Muda Indonesia',
            'description' => 'International Volunteer - Serving as an international volunteer at Sekolah Indonesia Kuala Lumpur and advocating for the rights of Indonesian children in education.',
            'icon' => 'fas fa-globe-asia',
            'gradient_from' => 'cyan-500',
            'gradient_to' => 'blue-600',
            'tags' => ['International', 'Volunteer', 'Education', 'Advocacy'],
            'type' => 'experience',
            'duration' => 'November 2024',
            'location' => 'Kuala Lumpur, Malaysia',
            'sort_order' => 1,
            'is_active' => true
        ]);

        Project::create([
            'title' => '15th International Free Linguistic Conference (FLC)',
            'description' => 'Researcher - Conducting team research on the rights of people with special learning disabilities (SpLDs) by examining English proficiency tests to assess accessibility and inclusivity.',
            'icon' => 'fas fa-microscope',
            'gradient_from' => 'orange-500',
            'gradient_to' => 'red-600',
            'tags' => ['Research', 'SpLD Rights', 'Accessibility', 'Inclusivity'],
            'type' => 'experience',
            'duration' => 'May - October 2024',
            'location' => 'Labuan Bajo, Indonesia',
            'sort_order' => 2,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Akademi Juara Community',
            'description' => 'Founder & CEO - Establishing an educational community, offering students skill-development courses, online courses, international workshops, and Focus Group Discussions (FGD).',
            'icon' => 'fas fa-graduation-cap',
            'gradient_from' => 'blue-500',
            'gradient_to' => 'purple-600',
            'tags' => ['Leadership', 'Education', 'CEO', 'Founder'],
            'type' => 'experience',
            'duration' => 'Since May 2024',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 3,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Slow Learners Care (SLC)',
            'description' => 'Volunteer Staff - Served as a staff member at the Inclusive Language School, supporting students with Specific Learning Difficulties (SpLDs) in accessing broader educational opportunities.',
            'icon' => 'fas fa-hands-helping',
            'gradient_from' => 'pink-500',
            'gradient_to' => 'rose-600',
            'tags' => ['Inclusivity', 'SpLD Support', 'Education', 'Volunteer'],
            'type' => 'experience',
            'duration' => 'October 2023 - Present',
            'location' => 'Indonesia',
            'sort_order' => 4,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Law Club - State High School 3 Tenggarong',
            'description' => 'Mentor - Teaching civic education and fundamentals of law. Preparing students for legal competitions and debates. Assisting in planning school activities and ensuring effective studying.',
            'icon' => 'fas fa-balance-scale',
            'gradient_from' => 'amber-500',
            'gradient_to' => 'yellow-600',
            'tags' => ['Legal Education', 'Mentoring', 'Civic Education', 'Competitions'],
            'type' => 'experience',
            'duration' => 'October 2023 - Present',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 5,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Developing Educational Game in Law',
            'description' => 'Game Prototype Developer - Working with Kejaksaan Tinggi Kaltim and BNK Kutai Kartanegara to develop the educational game named Aquatic as media for learning drug regulations.',
            'icon' => 'fas fa-gamepad',
            'gradient_from' => 'purple-500',
            'gradient_to' => 'pink-600',
            'tags' => ['Game Development', 'Legal Education', 'Innovation', 'Collaboration'],
            'type' => 'experience',
            'duration' => 'April 2023 - Present',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 6,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'English Club - State High School 3 Tenggarong',
            'description' => 'Mentor - Teaching high school students English for academic and everyday communication purposes. Assisted in planning school activities and ensuring effective studying.',
            'icon' => 'fas fa-chalkboard-teacher',
            'gradient_from' => 'emerald-500',
            'gradient_to' => 'teal-600',
            'tags' => ['English Teaching', 'Academic Support', 'Communication', 'Mentoring'],
            'type' => 'experience',
            'duration' => 'May 2021 - January 2024',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 7,
            'is_active' => true
        ]);

        // Organization Experiences
        Project::create([
            'title' => 'International Law Students Association (ILSA) Chapter UB',
            'description' => 'Head of International Law Moot Affairs (ILMA) - Active as the Head of ILMA of International Law Students Association (ILSA) Chapter UB.',
            'icon' => 'fas fa-gavel',
            'gradient_from' => 'indigo-500',
            'gradient_to' => 'purple-600',
            'tags' => ['International Law', 'Leadership', 'Moot Affairs', 'ILSA'],
            'type' => 'organization',
            'duration' => '2024 - Present',
            'location' => 'Universitas Brawijaya',
            'sort_order' => 8,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Duta Pelajar Sadar Hukum (Law Student Ambassador)',
            'description' => 'Student Ambassador - Active as the Law Student Ambassador in East Kalimantan with Kejaksaan Tinggi Kalimantan Timur & Dinas Pendidikan dan Kebudayaan Kalimantan Timur.',
            'icon' => 'fas fa-flag',
            'gradient_from' => 'red-500',
            'gradient_to' => 'pink-600',
            'tags' => ['Ambassador', 'Legal Awareness', 'Government', 'Education'],
            'type' => 'organization',
            'duration' => '2023 - Present',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 9,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Bina Antarbudaya & AFS Intercultural Programs',
            'description' => 'Volunteer - Active as the volunteer at Bina Antarbudaya Chapter Malang, promoting intercultural exchange and understanding.',
            'icon' => 'fas fa-globe',
            'gradient_from' => 'teal-500',
            'gradient_to' => 'cyan-600',
            'tags' => ['Intercultural', 'Exchange', 'Global', 'Volunteer'],
            'type' => 'organization',
            'duration' => '2024 - Present',
            'location' => 'Malang, Indonesia',
            'sort_order' => 10,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'English Club Executive Officer - State High School 3 Tenggarong',
            'description' => 'President - Active in contributing to English Club by leading school activities such as English day for daily conversation and academic needs.',
            'icon' => 'fas fa-star',
            'gradient_from' => 'violet-500',
            'gradient_to' => 'purple-600',
            'tags' => ['President', 'English Club', 'Leadership', 'Activities'],
            'type' => 'organization',
            'duration' => 'January 2022 - December 2023',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 11,
            'is_active' => true
        ]);

        Project::create([
            'title' => 'Class Representative Board - State High School 3 Tenggarong',
            'description' => 'President - Active as the president of the Class Representative Board at State High School 3 Tenggarong, leading student representation and activities.',
            'icon' => 'fas fa-users',
            'gradient_from' => 'lime-500',
            'gradient_to' => 'green-600',
            'tags' => ['Student Leader', 'Representative', 'Board President', 'Leadership'],
            'type' => 'organization',
            'duration' => 'October 2022 - 2023',
            'location' => 'East Kalimantan, Indonesia',
            'sort_order' => 12,
            'is_active' => true
        ]);
    }
}
