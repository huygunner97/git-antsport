<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\CategoryDetail;
use App\Category;

class AdminCategoryDetailController extends AdminController
{
    public function getList()
    {

        $category_detail = CategoryDetail::orderBy('pk_category_detail_id', 'desc')->paginate(5);

        return view('admin.category_detail.list', ['category_detail' => $category_detail]);
    }

    public function getAdd()
    {
        $categories = Category::all();
    	return view('admin.category_detail.add', ['categories' => $categories]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'c_name' => 'required|unique:category_detail,c_name'
        ], [
            'c_name.required' => 'Bạn chưa nhập danh mục',
            'c_name.unique' => 'Danh mục đã tồn tại'
        ]);

        $category_detail = new CategoryDetail;
        $category_detail->c_name = $request->c_name;
        $category_detail->unsigned_name = parent::removeUnicode($request->c_name);
        $category_detail->fk_category_detail_id = $request->fk_category_detail_id;
        $category_detail->save();

        return redirect('admin/category-detail/add')->with('announce','Thêm thành công');
    }

    public function getEdit($id)
    {
        $category_detail = CategoryDetail::find($id);
        $categories = Category::all();
        return view('admin.category_detail.edit', ['category_detail' => $category_detail, 'categories' => $categories]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'c_name' => ['required', Rule::unique('category_detail')->ignore($id, 'pk_category_detail_id')],
        ], [
            'c_name.required' => 'Bạn chưa nhập danh mục',
            'c_name.unique' => 'Danh mục đã tồn tại'
        ]);

        $category_detail = CategoryDetail::find($id);
        $category_detail->c_name = $request->c_name;
        $category_detail->unsigned_name = parent::removeUnicode($request->c_name);
        $category_detail->fk_category_detail_id = $request->fk_category_detail_id;
        $category_detail->save();

        return redirect('admin/category-detail/edit/'.$id)->with('announce','Sửa thành công');
    }

    public function getDelete($id)
    {
        $category_detail = CategoryDetail::find($id);
        $category_detail->delete();
        return redirect('admin/category-detail/list');
    }
    
}
