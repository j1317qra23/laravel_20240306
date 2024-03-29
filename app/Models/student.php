<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';

    public function mobile(): HasOne
    {
        return $this->hasOne(Mobile::class);
    }
}