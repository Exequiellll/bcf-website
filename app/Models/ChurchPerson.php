<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChurchPerson extends Model
{
    protected $fillable = [
        'name',
        'role',
        'bio',
        'photo',
        'email',
        'phone',
        'is_featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getPhotoUrlAttribute()
    {
        if (!$this->photo) {
            return null;
        }
        
        // If it's already a full URL (starts with http:// or https://), return as is
        if (strpos($this->photo, 'http://') === 0 || strpos($this->photo, 'https://') === 0) {
            return $this->photo;
        }
        
        // Otherwise, it's a local path, use asset() to generate the full URL
        return asset($this->photo);
    }
}
