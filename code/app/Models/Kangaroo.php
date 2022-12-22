<?php

namespace App\Models;

use Database\Factories\KangarooFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kangaroo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'weight',
        'height',
        'gender',
        'color',
        'friendliness',
        'birthday',
    ];
}