<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProdukUmkm extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'umkm_products';
    protected $fillable = ['prod_name', 'prod_slug', 'prod_title', 'prod_desc', 'category_id', 'photo_id', 'user_id'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //                  ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('prod_title', 'like', '%' . $search . '%')
                         ->orWhere('prod_name', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('category_name', $category);
            });
        });

        // $query->when($filters['product'] ?? false, fn($query, $product) =>
        //     $query->whereHas('product', fn($query) =>
        //         $query->where('name', $product)
        //     )
        // );
    }

    public function category()
    {
        return $this->hasOne(CategoriProd::class, 'id', 'category_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function photo()
    {
        //return $this->hasMany(Foto::class, 'photo_id', 'id');
        return $this->hasOne(Foto::class, 'id', 'photo_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'prod_name'
            ]
        ];
    }

    public function email(){
        return $this->hasMany(Email::class);
    }
}
