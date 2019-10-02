<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News query()
 * @mixin \Eloquent
 * @property int $pk_news_id
 * @property string $c_title
 * @property string $unsigned_title
 * @property string $c_content
 * @property string $c_img
 * @property string $c_date
 * @property int $c_type
 * @property int $c_hotnews
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCHotnews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News wherePkNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereUnsignedTitle($value)
 */
class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "pk_news_id";
    public $timestamps = false;


}
