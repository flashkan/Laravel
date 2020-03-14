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
    public static function rules()
    {
        $tableNameGroup = (new NewsGroup())->getTable();
        return [
            'title' => 'required|min:10|max:50',
            'description' => 'required|min:10|max:255',
            'group' => "required|exists:{$tableNameGroup},id",
            'private' => 'boolean',
        ];
    }

    protected $fillable = ['title', 'description', 'group', 'private', 'pubDate'];

    public function group()
    {
        return $this->belongsTo(NewsGroup::class, 'group')->first();
    }
}

