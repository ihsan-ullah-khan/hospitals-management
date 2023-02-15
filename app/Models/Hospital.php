<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable = ['hospital_name', 'address','city', 'country', 'state', 'zip', 'image'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
