<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 * @property string title
 * @property string description
 * @property int group
 * @property boolean private
 */
class News extends Model
{
    protected $fillable = ['title', 'description', 'group', 'private'];

    public function group()
    {
        return $this->belongsTo(NewsGroup::class, 'group')->first();
    }
}

