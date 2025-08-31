<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['user_id', 'book_id', 'content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
