<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table='contacts';
    protected $fillable=[
        'name',
        'phone',
        'email',
        'website',
        'group',
        'user_id'
    ];
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class,'user_id');
    }
}
