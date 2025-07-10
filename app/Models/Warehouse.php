<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'warehouse_id';
    protected $fillable = ['warehouse_code', 'warehouse_name', 'address', 'is_active'];

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'warehouse_id');
    }

    public function inventoryCounts(): HasMany
    {
        return $this->hasMany(InventoryCount::class, 'warehouse_id');
    }
}
