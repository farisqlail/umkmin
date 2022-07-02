<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email_message';
    protected $fillable = 
    [
        'id_user',	
        'product_name',
        'name_pembeli', 
        'phone', 
        'email', 
        'date', 
        'time1', 
        'time2', 
        'subject', 
        'desc', 
        'to_email', 
        'from_email', 
        'status'
    ];

    public function product(){
        return $this->belongsTo(ProdukUmkm::class, 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
