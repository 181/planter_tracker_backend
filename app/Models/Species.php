<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $table = 'species';
    protected $fillable = ['species_name', 'slug'];

    public function plants()
    {
        return $this->hasMany('App\Models\Plant', 'species_id');
    }
}
