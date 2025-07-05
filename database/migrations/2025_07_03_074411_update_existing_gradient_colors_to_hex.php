<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mapping Tailwind classes to hex colors
        $colorMap = [
            'blue-500' => '#3B82F6',
            'green-500' => '#10B981',
            'purple-500' => '#8B5CF6',
            'red-500' => '#EF4444',
            'yellow-500' => '#EAB308',
            'pink-500' => '#EC4899',
            'indigo-500' => '#6366F1',
            'cyan-500' => '#06B6D4',
            'orange-500' => '#F97316',
            'teal-500' => '#14B8A6',
            'purple-600' => '#7C3AED',
            'blue-600' => '#2563EB',
            'green-600' => '#059669',
            'red-600' => '#DC2626',
            'yellow-600' => '#CA8A04',
            'pink-600' => '#DB2777',
            'indigo-600' => '#4F46E5',
            'cyan-600' => '#0891B2',
            'orange-600' => '#EA580C',
            'teal-600' => '#0D9488'
        ];

        // Update all projects with Tailwind classes to hex colors
        foreach ($colorMap as $tailwindClass => $hexColor) {
            DB::table('projects')
                ->where('gradient_from', $tailwindClass)
                ->update(['gradient_from' => $hexColor]);
                
            DB::table('projects')
                ->where('gradient_to', $tailwindClass)
                ->update(['gradient_to' => $hexColor]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Mapping hex colors back to Tailwind classes
        $reverseColorMap = [
            '#3B82F6' => 'blue-500',
            '#10B981' => 'green-500',
            '#8B5CF6' => 'purple-500',
            '#EF4444' => 'red-500',
            '#EAB308' => 'yellow-500',
            '#EC4899' => 'pink-500',
            '#6366F1' => 'indigo-500',
            '#06B6D4' => 'cyan-500',
            '#F97316' => 'orange-500',
            '#14B8A6' => 'teal-500',
            '#7C3AED' => 'purple-600',
            '#2563EB' => 'blue-600',
            '#059669' => 'green-600',
            '#DC2626' => 'red-600',
            '#CA8A04' => 'yellow-600',
            '#DB2777' => 'pink-600',
            '#4F46E5' => 'indigo-600',
            '#0891B2' => 'cyan-600',
            '#EA580C' => 'orange-600',
            '#0D9488' => 'teal-600'
        ];

        // Update all projects with hex colors back to Tailwind classes
        foreach ($reverseColorMap as $hexColor => $tailwindClass) {
            DB::table('projects')
                ->where('gradient_from', $hexColor)
                ->update(['gradient_from' => $tailwindClass]);
                
            DB::table('projects')
                ->where('gradient_to', $hexColor)
                ->update(['gradient_to' => $tailwindClass]);
        }
    }
};
