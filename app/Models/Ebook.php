<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ebook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'users_id',
        'levels_id',
        'prices_id',
        'url',
        'photo'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'levels_id', 'id');
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'prices_id', 'id');
    }
}
