<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'release',
        'synopsis',
        'type',
        'infourl',
    ];

    public function getReleaseAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setReleaseAttribute($value)
    {
        $this->attributes['release'] = Carbon::createFromFormat('d/m/Y', $value);
    }
}
