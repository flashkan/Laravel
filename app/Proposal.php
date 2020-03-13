<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    public static function rules()
    {
        return [
            'userProposal' => 'required|min:10|max:255',
        ];
    }

    protected $fillable = ['user_id', 'userProposal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
