<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    public static function rules()
    {
        return ['link' => 'required'];
    }

    protected $fillable = ['link'];
}
