<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Notification;
use App\Message;
use App\Category;
use App\CategoryDetail;

class ControllerClient extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->getMenu();
        
            return $next($request);
        });
    }
    public function getMenu()
    {
    	$categories = Category::all();
        $category_detail = [];
        foreach ($categories as $key => $category) {
        	$category_detail[$key] = CategoryDetail::where('fk_category_detail_id', $category->pk_category_id)->get(); 
        }

        $message_latest = Message::latest()->first('room_id');

        $number_noti = Notification::where('user_id', Auth::id())->first('count_noti_client'); 

        $array = [
            'categories' => $categories, 
            'category_detail' => $category_detail, 
            'message_latest' => $message_latest,
            'number_noti' => $number_noti
        ];

        View::share('menu', $array);
    }

}
