<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    protected $primaryKey = 'id' ;
    protected $fillable = ['title', 'thumbnail', 'slug', 'description', 'read'];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
