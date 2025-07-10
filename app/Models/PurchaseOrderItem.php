<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrderItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'po_item_id';
    protected $fillable = ['po_id', 'item_id', 'quantity_ordered', 'quantity_received', 'unit_price', 'notes'];

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function receiptItems(): HasMany
    {
        return $this->hasMany(ReceiptItem::class, 'po_item_id');
    }
}
