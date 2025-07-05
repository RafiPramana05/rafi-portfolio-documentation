<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'gradient_from',
        'gradient_to',
        'tags',
        'type',
        'duration',
        'location',
        'link',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }

    public function getGradientClassAttribute()
    {
        // Check if colors are hex values
        if (str_starts_with($this->gradient_from, '#') && str_starts_with($this->gradient_to, '#')) {
            return null; // We'll use inline styles for hex colors
        }
        
        // Fallback for Tailwind classes
        return "from-{$this->gradient_from} to-{$this->gradient_to}";
    }

    public function getGradientStyleAttribute()
    {
        // Generate inline CSS gradient for hex colors
        if (str_starts_with($this->gradient_from, '#') && str_starts_with($this->gradient_to, '#')) {
            return "background: linear-gradient(135deg, {$this->gradient_from}, {$this->gradient_to});";
        }
        
        return null;
    }

    public function getTagsListAttribute()
    {
        if (is_array($this->tags)) {
            return implode(', ', $this->tags);
        }
        return $this->tags;
    }
}
