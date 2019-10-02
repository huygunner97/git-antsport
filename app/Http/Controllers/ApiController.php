<?php

namespace App\Http\Controllers;

use http\Env\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;

class ApiController extends Controller
{
    public function getProduct()
    {
        $product = Product::all()->sortByDesc('pk_product_id')->slice(0, 4);
        $product->toArray();
        foreach ($product as $key => $p) {
                $product[$key]['c_price'] = number_format($p->c_price);
        }
        return $product->toJson();
    }

    public function getAllUserId()
    {
        return User::where('level', 0)->get('id');
    }

    public function getSearch($search = '')
    {
        if ($search == '') {
            $product = '';
        } else {
            $product = Product::where('c_name', 'like', '%'.$search.'%')->get();
        }
       
        return $product;

    }

}
