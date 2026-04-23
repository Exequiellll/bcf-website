<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'event_date',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'date',
            'event_date' => 'datetime',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('event_date')
              ->orWhere('event_date', '>=', now());
        });
    }

    public function scopePast($query)
    {
        return $query->whereNotNull('event_date')
            ->where('event_date', '<', now())
            ->where('event_date', '>=', now()->subDays(7));
    }
}
