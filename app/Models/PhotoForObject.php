<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoForObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'objectId',
        'photoId',
        'photo'

    ];
    protected $dates=[
        'created_at',
        'updated_at',
    ];

}
