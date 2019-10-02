<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CategoryDetail[] $categoryDetail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @mixin \Eloquent
 * @property int $pk_category_id
 * @property string $c_name
 * @property string $unsigned_name
 * @property string $c_img
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category wherePkCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUnsignedName($value)
 */
class Category extends Model
{
    protected $table = "category";
    protected $primaryKey = "pk_category_id";
    public $timestamps = false;

    public function categoryDetail()
    {
    	return $this->hasMany('App\CategoryDetail', 'fk_category_detail_id', 'pk_category_id');
    }

    public function product()
    {
    	return $this->hasManyThrough('App\Product', 'App\CategoryDetail', 'fk_category_detail_id', 'fk_product_id', 'pk_category_id');
    }

}
