<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = ['plant_name', 'slug', 'species_id', 'watering_instruction', 'image'];

    public function species() {
        return $this->belongsTo('App\Models\Species', 'species_id');
    }
}
