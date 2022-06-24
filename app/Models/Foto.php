<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = [ 'photo_name'];

    public function produkumkm()
    {
        //return $this->hasOne(ProdukUmkm::class, 'id', 'photo_id');
        return $this->hasMany(ProdukUmkm::class, 'photo_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'photo_id', 'id');
    }
}
