<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderDetail
 *
 * @property-read \App\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail query()
 * @mixin \Eloquent
 * @property int $order_detail_id
 * @property int $order_id
 * @property int $fk_product_id
 * @property string|null $classify
 * @property int $number
 * @property float $price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail whereClassify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail whereFkProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail whereOrderDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderDetail wherePrice($value)
 */
class OrderDetail extends Model
{
    protected $table = "tbl_order_detail";
    public $timestamps = false;

    public function order()
    {
    	return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

}
