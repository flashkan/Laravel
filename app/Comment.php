<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function rules()
    {
        return [
            'comment' => 'required|min:10|max:255',
        ];
    }

    protected $fillable = ['user_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
