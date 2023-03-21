<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'video',
        'price',
        'roi',
        'start_date',
        'end_date',
        'expiration_date',
        'category_id',
        'tags',
        'terms_and_conditions',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
