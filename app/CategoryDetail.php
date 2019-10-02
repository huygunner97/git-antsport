<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CategoryDetail
 *
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail query()
 * @mixin \Eloquent
 * @property int $pk_category_detail_id
 * @property int $fk_category_detail_id
 * @property string $c_name
 * @property string $unsigned_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail whereCName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail whereFkCategoryDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail wherePkCategoryDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryDetail whereUnsignedName($value)
 */
class CategoryDetail extends Model
{
    protected $table = "category_detail";
    protected $primaryKey = "pk_category_detail_id";
    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo('App\Category', 'fk_category_detail_id', 'pk_category_id');
    }

    public function product()
    {
    	return $this->hasMany('App\Product', 'fk_product_id', 'pk_category_detail_id');
    }

}
