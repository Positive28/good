<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code'
    ];


    public function materials():BelongsToMany
    {
        return $this->belongsToMany(Material::class,'product_materials','product_id','material_id')->withPivot('quantity');
    }


}
