<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Clothe extends Model
{
    //
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'color',
        'size',
        'season',
        'brand',
        'description',
        'image_url',
    ];

    /**
     * Get the user that owns the clothing item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
