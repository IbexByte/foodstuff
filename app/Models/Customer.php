<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone_number',
        'deal_id',
        'email',

    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
