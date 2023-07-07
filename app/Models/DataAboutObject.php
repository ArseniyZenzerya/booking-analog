<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAboutObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'userId',
        'objectName',
        'city',
        'address',
        'conditioning',
        'heating',
        'wiFi',
        'charging',
        'kitchen',
        'miniKitchen',
        'washingMachine',
        'tv',
        'pool',
        'hydromassage',
        'miniBar',
        'sauna',
        'stars',
        'description',
        'countGuest',

    ];
    protected $dates=[
        'created_at',
        'updated_at',
    ];

    protected $table = 'data_about_objects';

}

