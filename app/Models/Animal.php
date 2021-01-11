<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [    
        "name",
        "type",
        "dob",
        "weight",
        "height",
        "biteyness",
    ];

   
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    public function dangerous()
    {
        if($this->biteyness >= 3){
            return true;
        }
        else{
            return false;
        }
    }

    public function setTreatments(array $strings) : Animal
    {
       $treatments = Treatment::fromStrings($strings);

       $this->treatments()->sync($treatments->pluck("id"));

       return $this;
    }
}
