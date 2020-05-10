<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserDetails extends Model
{
    use Notifiable;

    public const GENDERS = [
        0 => 'Unknown',
        1 => 'Male',
        2 => 'Female'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nickname',
        'description',
        'uploaded_file',
        'gender'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getGenderNumeric($gender)
    {
        return array_search($gender, self::GENDERS);
    }

    public static function getGenderEnum()
    {
        return self::GENDERS;
    }

    public function getGenderTextAttribute()
    {
        return self::GENDERS[ $this->attributes['gender'] ];
    }

    public function setGenderTextAttribute($value)
    {
        $genderNumeric = self::getGenderNumeric($value);
        if ($genderNumeric) {
            $this->attributes['gender'] = $genderNumeric;
        }
    }

}
