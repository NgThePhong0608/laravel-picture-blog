<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'image_id', 'approved'];

    public function image()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeApproved(Builder $query)
    {
        return $query->where('approved', true);
    }
}
