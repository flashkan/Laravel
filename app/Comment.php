<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function rules()
    {
        return [
            'userName' => 'required|min:5|max:30',
            'comment' => 'required|min:10|max:255',
        ];
    }

    protected $fillable = ['userName', 'comment'];
}
