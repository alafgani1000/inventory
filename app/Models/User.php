<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Purchase Orders
    public function createdPurchaseOrders(): HasMany
    {
        return $this->hasMany(PurchaseOrder::class, 'created_by');
    }

    // Purchase Requisitions
    public function purchaseRequisitions(): HasMany
    {
        return $this->hasMany(PurchaseRequisition::class, 'requested_by');
    }

    // Receipts
    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class, 'received_by');
    }

    // Shipments
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'shipped_by');
    }

    // Stock Movements
    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class, 'moved_by');
    }

    // Inventory Counts
    public function inventoryCounts(): HasMany
    {
        return $this->hasMany(InventoryCount::class, 'conducted_by');
    }

    // Stock Adjustments
    public function adjustedStockAdjustments(): HasMany
    {
        return $this->hasMany(StockAdjustment::class, 'adjusted_by');
    }

    public function approvedStockAdjustments(): HasMany
    {
        return $this->hasMany(StockAdjustment::class, 'approved_by');
    }
}
