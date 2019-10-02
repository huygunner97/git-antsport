<?php

namespace App\Http\Controllers;

use http\Env\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\User;
use App\Customer;
use App\Order;
use App\OrderDetail;

class AjaxController extends Controller
{
    public function getCart($total_number, $total_price, $cart_id, $number)
    {
        foreach (session('cart') as $rows) {
            $classify = $rows['classify'];
            $pk_product_id = $rows['pk_product_id'];
            if ($pk_product_id.$classify == $cart_id) {
                session(['cart.'.$pk_product_id.$classify.'.number' => $number]);
            }
        }
        echo '<p>Tổng sản phẩm :&emsp;<span style="color: red">'.$total_number.'&nbsp;Sản phẩm</span></p>';
        echo '<p>Tổng giá :&emsp;<span style="color: red">'.number_format($total_price).'đ</span></p>';
    }

}
