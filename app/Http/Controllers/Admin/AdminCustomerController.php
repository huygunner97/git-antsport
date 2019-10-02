<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;

class AdminCustomerController extends AdminController
{
    public function getList()
    {
        $customers = Customer::orderBy('pk_customer_id', 'desc')->paginate(3);

        return view('admin.customer.list', ['customers' => $customers]);
    }

    public function getOrder($id)
    {
        $order = Order::where('customer_id', $id)->first();
        $order_detail = OrderDetail::where('order_id', $order->order_id)->get();

        $product = [];
        $count = 0;
        foreach ($order_detail as $key => $od) {
            $product[$key] = Product::where('pk_product_id', $od->fk_product_id)->first();
            $count = $count + $od->number;
        }

        $array = [
            'order' => $order,
            'order_detail' => $order_detail,
            'product' => $product,
            'count' => $count
        ];
        return view('admin.customer.order', $array);
    }

    public function updateOrder($id)
    {
        Order::where('order_id', $id)->update(['status' => 1]);
        return redirect('admin/customer/list');
    }

    public function getDelete($id)
    {
        $order_id = Order::where('customer_id', $id)->first();

        Order::where('customer_id', $id)->delete();
        OrderDetail::where('order_id', $order_id->order_id)->delete();
        Customer::where('pk_customer_id', $id)->delete();

        return redirect('admin/customer/list');
    }
    
}
