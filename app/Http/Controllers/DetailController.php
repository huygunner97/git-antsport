<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryDetail;
use App\Product;
use App\News;
use App\Post;

class DetailController extends ControllerClient
{
    public function getAllProduct()
    {
        $filter = isset($_GET['filter']) ? $_GET['filter'] : 1;
        
        switch ($filter) {
            case '2':
                $product = Product::where('c_price', '>', 2000000)->orderBy('pk_product_id', 'desc')->paginate(8);
                break;

            case '3':
                $product = Product::whereBetween('c_price', [1000001, 2000000])->orderBy('pk_product_id', 'desc')->paginate(8);
                break;

            case '4':
                $product = Product::whereBetween('c_price', [500001, 1000000])->orderBy('pk_product_id', 'desc')->paginate(8);
                break;

            case '5':
                $product = Product::where('c_price', '<', 500000)->orderBy('pk_product_id', 'desc')->paginate(8);
                break;
            
            default:
                $product = Product::orderBy('pk_product_id', 'desc')->paginate(6);
                break;
        }

        $array = [
            'product' => $product,
            'filter' => $filter
        ];
        return view('client.detail.content_all_product', $array);
    }

    public function getProductType($type_id, $type)
    {
        $filter = isset($_GET['filter']) ? $_GET['filter'] : 1;

        $category = Category::where('pk_category_id', $type_id)->first('c_name');
        $category_detail = CategoryDetail::where('fk_category_detail_id', $type_id)->get();
        $id = [];
        foreach ($category_detail as $c) {
            $id[] = $c->pk_category_detail_id;
        }

        switch ($filter) {
            case '2':
                $product = Product::whereIn('fk_product_id', $id)->where('c_price', '>', 2000000)->paginate(8);
                break;

            case '3':
                $product = Product::whereIn('fk_product_id', $id)->whereBetween('c_price', [1000001, 2000000])->paginate(8);
                break;

            case '4':
                $product = Product::whereIn('fk_product_id', $id)->whereBetween('c_price', [500001, 1000000])->paginate(8);
                break;

            case '5':
                $product = Product::whereIn('fk_product_id', $id)->where('c_price', '<', 500000)->paginate(8);
                break;
            
            default:
                $product = Product::whereIn('fk_product_id', $id)->paginate(8);
                break;
        }

        $array = [
            'product' => $product,
            'category' => $category,
            'type_id' => $type_id,
            'type' => $type,
            'filter' => $filter
        ];
        return view('client.detail.content_product_type', $array);
    }

    public function getProductTypeDetail($type_detail_id, $type, $type_detail)
    {
        $filter = isset($_GET['filter']) ? $_GET['filter'] : 1;

        $category_detail = CategoryDetail::where('pk_category_detail_id', $type_detail_id)->first();
        switch ($filter) {
            case '2':
                $product = Product::where('fk_product_id', $type_detail_id)->where('c_price', '>', 2000000)->paginate(8);
                break;

            case '3':
                $product = Product::where('fk_product_id', $type_detail_id)->whereBetween('c_price', [1000001, 2000000])->paginate(8);
                break;

            case '4':
                $product = Product::where('fk_product_id', $type_detail_id)->whereBetween('c_price', [500001, 1000000])->paginate(8);
                break;

            case '5':
                $product = Product::where('fk_product_id', $type_detail_id)->where('c_price', '<', 500000)->paginate(8);
                break;
            
            default:
                $product = Product::where('fk_product_id', $type_detail_id)->paginate(8);
                break;
        }

        $array = [
            'product' => $product,
            'category_detail' => $category_detail,
            'type_detail_id' => $type_detail_id,
            'type' => $type,
            'type_detail' => $type_detail,
            'filter' => $filter
        ];
        return view('client.detail.content_product_type_detail', $array);
    }

    public function getProductDetail($product_id)
    {
        $product_detail = Product::where('pk_product_id', $product_id)->first();
        $product_related = Product::where('fk_product_id', $product_detail->fk_product_id)->get();
        $product_related = $product_related->where('pk_product_id', '!=', $product_id);

        $array = [
            'product_detail' => $product_detail,
            'product_related' => $product_related
        ];
        return view('client.detail.content_product_detail', $array);
    }

    public function getNewses()
    {
        $newses = News::where('c_type', 0)->get()->sortByDesc('pk_news_id');
        $tips = News::where('c_type', 1)->get()->sortByDesc('pk_news_id');
        $hot_news = News::where('c_hotnews', 1)->get()->sortByDesc('pk_news_id');

        $array = [
            'newses' => $newses,
            'tips' => $tips,
            'hot_news' => $hot_news
        ];
        return view('client.detail.content_all_news', $array);
    }

    public function getNews($news_id)
    {

        $news = News::where('pk_news_id', $news_id)->first();
        $newses = News::where('c_type', $news->c_type)->get();
        $newses = $newses->where('pk_news_id', '!=', $news_id);

        $array = [
            'newses' => $newses,
            'news' => $news
        ];
        return view('client.detail.content_news', $array);
    }

    public function getSearch()
    {
        $search = addslashes($_GET['search']);
        if (empty($search)) {
            echo "<script>alert('Bạn chưa nhập thông tin cần tìm kiếm')</script>";
            echo "<script>location.href='http://localhost/sport-project/laravel-antsport-finnal/'</script>";
        } else {
            $num = Product::where('c_name', 'like', '%'.$search.'%')->count();
            $product = Product::where('c_name', 'like', '%'.$search.'%')->paginate(9);
            $array = [
                'product' => $product,
                'num' => $num,
                'search' => $search
            ];
            return view('client.detail.content_search', $array);
        }

    }
    
}
