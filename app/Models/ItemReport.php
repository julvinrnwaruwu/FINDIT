<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemReport extends Model
{
    protected $fillable = [
        'user_id',
        'report_type',
        'item_name',
        'category',
        'location',
        'event_date',
        'description',
        'whatsapp',
        'whatsapp_consent_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'whatsapp_consent_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(ItemClaim::class);
    }
}
