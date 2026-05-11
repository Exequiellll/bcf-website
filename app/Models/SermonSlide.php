<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SermonSlide extends Model
{
    protected $fillable = [
        'title',
        'speaker',
        'sermon_date',
        'slides',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'slides' => 'array',
            'is_published' => 'boolean',
            'sermon_date' => 'date',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Delete all image files associated with this sermon from the filesystem.
     */
    public function deleteImageFiles(): void
    {
        foreach ($this->slides ?? [] as $path) {
            $fullPath = public_path(ltrim($path, '/'));
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
        }
    }
}
