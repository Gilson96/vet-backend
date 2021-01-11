<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Treatment extends Model
{
    public $timestamps = false;

    protected $fillable = ["name"];

    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}
