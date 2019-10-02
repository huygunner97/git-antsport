<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Category;

class AdminCategoryController extends AdminController
{

    public function getList()
    {
        $categories = Category::orderBy('pk_category_id', 'desc')->paginate(3);
        return view('admin.category.list', ['categories' => $categories]);
    }

    public function getAdd()
    {
    	return view('admin.category.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'c_name' => 'required|unique:category,c_name'
        ], [
            'c_name.required' => 'Bạn chưa nhập danh mục',
            'c_name.unique' => 'Danh mục đã tồn tại'
        ]);

        $category = new Category;
        $category->c_name = $request->c_name;
        $category->unsigned_name = parent::removeUnicode($request->c_name);

        $c_img = "";
        if ($request->hasFile("c_img")) {
            $c_img = $request->file("c_img")->getClientOriginalName();
            $c_img = time().$c_img;            
            $request->file("c_img")->move("public/upload/mainproduct/", $c_img);
        }
        $category->c_img = $c_img;
        $category->save();

        return redirect('admin/category/add')->with('announce','Thêm thành công');
    }

    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'c_name' => ['required', Rule::unique('category')->ignore($id, 'pk_category_id')], 
        ], [
            'c_name.required' => 'Bạn chưa nhập danh mục',
            'c_name.unique' => 'Danh mục đã tồn tại'
        ]);

        $category = Category::find($id);
        $category->c_name = $request->c_name;
        $category->unsigned_name = parent::removeUnicode($request->c_name);

        if ($request->hasFile("c_img")) {
            $old_img = Category::where('pk_category_id', $id)->first('c_img');
            if ($old_img->c_img != "" && file_exists("public/upload/mainproduct/".$old_img->c_img))
                unlink("public/upload/mainproduct/".$old_img->c_img);

            $c_img = $request->file("c_img")->getClientOriginalName();
            $c_img = time().$c_img;            
            $request->file("c_img")->move("public/upload/mainproduct/", $c_img);
            
            $category->c_img = $c_img;
        }
        $category->save();

        return redirect('admin/category/edit/'.$id)->with('announce','Sửa thành công');
    }

    public function getDelete($id)
    {
        $category = Category::find($id);
        if ($category->c_img != "" && file_exists("public/upload/mainproduct/".$category->c_img)){
            unlink("public/upload/mainproduct/".$category->c_img);
        }
        $category->delete();
        return redirect('admin/category/list');
    }
    
}
