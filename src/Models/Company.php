<?php

namespace Osoobe\CRM\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Osoobe\LaravelTraits\Support\TimeDiff;

class Company extends Model
{
    use HasFactory;
    use TimeDiff;

    protected $fillable = [
        'name',
        'category',
        'email',
        'phone_number',
        'website',
        'description',
        'status',
        'slug',
        'country',
        'state',
        'city',
        'street_address',
        'status',
    ];
}
