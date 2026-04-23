<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'day_of_week',
        'title',
        'start_time',
        'end_time',
        'description',
        'event_date',
        'location',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'event_date' => 'datetime',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('start_time');
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
