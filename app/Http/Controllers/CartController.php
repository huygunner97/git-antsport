<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;

class CartController extends ControllerClient
{
    public function getCart()
    {
        if (!session('cart')) {
            session(['cart'=> []]);
        }
        if (Auth::user()) {
            $customer = Customer::where('fk_user_id', Auth::id())->get(['pk_customer_id', 'date'])->sortByDesc('pk_customer_id');
            if (isset($customer)) {
                $purchased = []; $product_purchased = [];
                foreach ($customer as $c_key => $c) {
                    $purchased[$c_key] = OrderDetail::where('order_id', $c->order->order_id)->get();
                    foreach ($purchased[$c_key] as $p_key => $p) {
                        $product_purchased[$c_key][$p_key] = Product::where('pk_product_id', $p->fk_product_id)->first(['c_img', 'c_name']);
                    }
                }
                $array['purchased'] = $purchased;
                $array['product_purchased'] = $product_purchased;
            }
            $array['customer'] = $customer;
        }
        $array['number_cart'] = $this->numberCart();
        $array['total_cart'] = $this->totalCart();
        
        return view('client.extra.cart', $array);
    }

    public function addCart(Request $request, $pk_product_id)
    {
        $product = Product::where("pk_product_id", $pk_product_id)->first();
        $pk_category_id = $product->categoryDetail->fk_category_detail_id;
        $classify = $request->classify;
        $number = $request->number;
        if (session('cart.'.$pk_product_id.$classify.'.number') && session('cart.'.$pk_product_id.$classify.'.classify') == $classify) {
            //nếu đã có sp trong giỏ hàng thì số lượng lên 1
            $number = session('cart.'.$pk_product_id.$classify.'.number') + $number;
            session(['cart.'.$pk_product_id.$classify.'.number' => $number]);
        } else {         
            session(['cart.'.$pk_product_id.$classify => [
                'pk_product_id' => $pk_product_id,
                'c_name' => $product->c_name,
                'c_img' => $product->c_img,
                'number' => $number,
                'classify' => $classify,
                'c_price' => $product->c_price
            ]]);
        }
        return redirect('gio-hang');
    }
    /**
     * Cập nhật số lượng sản phẩm
     */
    // public function updateCart(Request $request)
    // {    
    //     foreach (session('cart') as $rows) {
    //         $classify = $rows['classify'];
    //         $classify_replace = str_replace(' ', '', $classify);
    //         $pk_product_id = $rows['pk_product_id'];
    //         $number = $request->input('product_'.$pk_product_id.$classify_replace);
    //         if ($number == 0) {
    //             //xóa sp ra khỏi giỏ hàng
    //             $request->session()->forget('cart.'.$pk_product_id.$classify);
    //         } else {
    //             session(['cart.'.$pk_product_id.$classify.'.number' => $number]);
    //         }
    //     }
    //     return redirect('gio-hang');
    // }
    // /**
    //  * Xóa sản phẩm ra khỏi giỏ hàng
    //  */
    public function deleteCart(Request $request, $pk_product_id)
    {
        $request->session()->forget('cart.'.$pk_product_id);

        return redirect('gio-hang');
    }
    // /**
    //  * Xóa sản phẩm đã mua ra khỏi giỏ hàng
    //  */
    public function deletePurchased($customer_id)
    {
        $order_id = Order::where('customer_id', $customer_id)->first();

        Order::where('customer_id', $customer_id)->delete();
        OrderDetail::where('order_id', $order_id->order_id)->delete();
        Customer::where('pk_customer_id', $customer_id)->delete();
        
        return redirect('gio-hang');
    }
    /**
     * Tổng giá trị giỏ hàng
     */
    public function totalCart()
    {
        $total = 0;
        foreach(session('cart') as $product){
            $total += $product['c_price'] * $product['number'];
        }
        return $total;
    }
    /*
     * Số sản phẩm có trong giỏ hàng
    */
     
    public function numberCart()
    {
        $number = 0;
        $n = 0;
        foreach(session('cart') as $product){
            $number += $product['number'];
            $n++;
        }
        session(['number' => $n]);
        return $number;
    }
    /**
     * Xóa giỏ hàng
     */
    public function destroyCart()
    {
        session(['cart' => []]);
        return redirect('gio-hang');
    }

}

