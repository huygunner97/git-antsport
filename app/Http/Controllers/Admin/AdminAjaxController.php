<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\CategoryDetail;

class AdminAjaxController extends AdminController
{
    public function getCategoryDetail($fk_category_detail_id)
    {
        $category_detail = CategoryDetail::where('fk_category_detail_id', $fk_category_detail_id)->get();
        foreach ($category_detail as $cd) {
            echo "<option value='".$cd->pk_category_detail_id."'>".$cd->c_name."</option>";
        }
    }

}
