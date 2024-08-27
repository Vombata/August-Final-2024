<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earthquake extends Model
{
    use HasFactory;

    protected $table = 'earthquakes';

    protected $fillable = ['id', 'magnitude', 'title','earthquake_data','continent_id', 'country_id','city_id', 'location_id'];
}
