<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockAdjusmentItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'adjustment_item_id';
    protected $fillable = [
        'adjustment_id', 'item_id', 'location_id',
        'current_quantity', 'new_quantity', 'cost_per_unit', 'notes'
    ];

    public function stockAdjustment(): BelongsTo
    {
        return $this->belongsTo(StockAdjustment::class, 'adjustment_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
