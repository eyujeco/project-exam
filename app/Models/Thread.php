<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'user_id',
        'threadtitle',
        'threadbody',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'threadtitle'
            ]
        ];
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function contents() {
        return $this->hasMany('App\Models\Content');
    }
}
