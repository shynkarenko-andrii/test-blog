<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Redis;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =
        [
            'title',
            'content',
        ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($post) {
            Redis::command('flushdb');
        });

        static::updated(function ($post) {
            Redis::command('flushdb');
        });

        static::deleted(function ($post) {
            Redis::command('flushdb');
        });
    }
}
