<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',      
    ];
    public function Users(){
        return $this->hasMany(User::class,'role_id');
    }
}
