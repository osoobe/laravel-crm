<?php

namespace Osoobe\CRM\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Osoobe\LaravelTraits\Support\HasLocation;
use Osoobe\LaravelTraits\Support\TimeDiff;

class Lead extends Model
{
    use HasFactory;
    use TimeDiff;
    use HasLocation;

    protected $fillable = [
        'name',
        'category',
        'lead_type',
        'email',
        'phone_number',
        'website',
        'description',
        'gender',
        'country',
        'zip_code',
        'state',
        'city',
        'street_address',
        'latitude',
        'longitude',
        'status',
        'source',
        'source_key',
    ];


    /**
     * Stakeholder
     *
     * @return mixed
     */
    public function stakeholder() {
        return $this->morphTo();
    }


}
