<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriProd extends Model
{
    use HasFactory;

    protected $table = 'category_products';
    protected $fillable = ['category_name'];
    
    public function produk()
    {
        return $this->hasMany(ProdukUmkm::class, 'category_id', 'id');
    }
}
