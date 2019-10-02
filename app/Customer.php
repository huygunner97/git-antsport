<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property-read \App\Order $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderDetail[] $orderDetail
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 * @mixin \Eloquent
 * @property int $pk_customer_id
 * @property string $hoten
 * @property string $diachi
 * @property int $dienthoai
 * @property string $date
 * @property int $fk_user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDiachi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDienthoai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFkUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereHoten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePkCustomerId($value)
 */
class Customer extends Model
{
    protected $table = "customer";
    protected $primaryKey = "pk_customer_id";
    public $timestamps = false;

    public function order()
    {
    	return $this->hasOne('App\Order', 'customer_id', 'pk_customer_id');
    }

    public function orderDetail()
    {
    	return $this->hasManyThrough('App\OrderDetail', 'App\Order', 'customer_id', 'order_id', 'pk_customer_id');
    }
}
