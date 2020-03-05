<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    public static function rules()
    {
        return [
            'userName' => 'required|min:10|max:50',
            'userPhone' => 'required|min:3|max:15',
            'userEmail' => 'required|email',
            'userProposal' => 'required|min:10|max:255',
        ];
    }

    protected $fillable = ['userName', 'userPhone', 'userEmail', 'userProposal'];
}
