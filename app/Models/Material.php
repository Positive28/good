<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_name'
    ];


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_materials', 'material_id');
    }

    public function warehouses(): HasMany
    {
        return $this->hasMany(Warehouse::class,'material_id','id');
    }

}
