<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linkmulticourse extends Model
{
    use HasFactory;

    public function multicourse()
    {
        return $this->belongsTo(Multicourse::class);
    }
}
