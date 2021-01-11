<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Owner extends Model
{

    protected $fillable = [
        "first_name",
        "last_name",
        "telephone",
        "email",
        "address_1",
        "address_2",
        "town",
        "postcode"
    ];    

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    // Method that displays the full name
    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function fullAddress()
    {
        $address = $this->address_1.", ";
        if ($this->address_2 != ''){
            $address .= $this->address_2.", ";
        }
        $address .= $this->town.", ";
        $address .= $this->postcode;

        return $address;
    }

   
}
