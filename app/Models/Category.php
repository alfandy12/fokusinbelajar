<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function singlecourse()
    {
        return $this->hasMany(Singlecourse::class);
    }
    public function multicourse()
    {
        return $this->hasMany(Multicourse::class);
    }
}
