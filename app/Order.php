<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property-read \App\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderDetail[] $orderDetail
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @mixin \Eloquent
 * @property int $order_id
 * @property int $customer_id
 * @property float $price
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 */
class Order extends Model
{
    protected $table = "tbl_order";
    protected $primaryKey = "order_id";
    public $timestamps = false;

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id', 'pk_customer_id');
    }

    public function orderDetail()
    {
    	return $this->hasMany('App\OrderDetail', 'order_id', 'order_id');
    }
}
