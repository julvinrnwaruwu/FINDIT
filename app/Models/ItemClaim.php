<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemClaim extends Model
{
    protected $fillable = ['item_report_id', 'claimant_id', 'message', 'status'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(ItemReport::class, 'item_report_id');
    }

    public function claimant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'claimant_id');
    }
}
