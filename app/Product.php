<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property-read \App\CategoryDetail $categoryDetail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @mixin \Eloquent
 * @property int $pk_product_id
 * @property int $fk_product_id
 * @property string $c_name
 * @property string $unsigned_name
 * @property string $c_description
 * @property string $c_img
 * @property string|null $c_img1
 * @property string|null $c_img2
 * @property string|null $c_img3
 * @property string|null $c_img4
 * @property int $c_hotproduct
 * @property int $c_price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCHotproduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCImg3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCImg4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFkProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePkProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUnsignedName($value)
 */
class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = "pk_product_id";
    public $timestamps = false;

    public function categoryDetail()
    {
    	return $this->belongsTo('App\CategoryDetail', 'fk_product_id', 'pk_category_detail_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'pk_product_id')->whereNull('parent_id');
    }

}
