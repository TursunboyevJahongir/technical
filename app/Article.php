<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //3. Мягкое удаление:
    use SoftDeletes;
    protected $fillable = [
        'text',
    ];

    public function isAuthor(int $author_id,int $user_id): bool
    {
        return $author_id === $user_id;
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
