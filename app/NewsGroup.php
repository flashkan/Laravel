<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Class NewsGroup
 * @package App
 * @property string name
 */
class NewsGroup extends Model
{
    public $table = 'news_group';
    public $timestamps = false;
    public $fillable = ['name'];

    public function news()
    {
        return $this->hasMany(News::class, 'group');
    }

    public function mapGroup()
    {
        return array_column(self::all()->toArray(), 'name', 'id');
    }
}
