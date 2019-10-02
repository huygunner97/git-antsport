<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategoryDetail;
use App\News;

class HomeClientController extends ControllerClient
{   
    public function index()
    {   
        $new_product = Product::all()->sortByDesc('pk_product_id')->slice(0, 8);

        $hot_product = [];
        $category = Category::all('pk_category_id');
        $n = 1;
        foreach ($category as $c) {
            $category_detail = CategoryDetail::where('fk_category_detail_id', $c->pk_category_id)->get();
            $id = [];
            foreach ($category_detail as $cd) {
                $id[] = $cd->pk_category_detail_id;
            }
            $hot_product[$n] = Product::whereIn('fk_product_id', $id)->get();
            $n++;
        }

        $news = News::all()->sortByDesc('pk_news_id');

        $array = [
        	'new_product' => $new_product,
            'hot_product' => $hot_product,
            'news' => $news
        ];
        return view('client.home.content', $array);
    }
    
}
