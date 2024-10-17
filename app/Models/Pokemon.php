<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pokemon extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo'
    ];
    protected $append = [
        'photo_url',
    ];

    public function getPhotoUrlAttribute()
    {
        if (filter_var($this->photo, FILTER_VALIDATE_URL)) {
            return $this->photo;
        }
        return $this->photo ? Storage::url($this->photo) : null;
    }

}
