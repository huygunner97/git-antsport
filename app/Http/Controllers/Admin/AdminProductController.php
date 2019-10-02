<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Product;
use App\Category;
use App\CategoryDetail;

class AdminProductController extends AdminController
{
    public function getList()
    {
        $products = Product::orderBy('pk_product_id', 'desc')->paginate(3);

        return view('admin.product.list', ['products' => $products]);
    }

    public function getAdd()
    {
        $categories = Category::all();
        $category_detail = CategoryDetail::where('fk_category_detail_id', 1)->get();
        $array = [
            'categories' => $categories,
            'category_detail' => $category_detail
        ];
    	return view('admin.product.add', $array);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'c_name' => 'required|unique:product,c_name',
            'c_price' => 'required'
        ], [
            'c_name.required' => 'Bạn chưa nhập tên sản phẩm ',
            'c_name.unique' => 'Sản phẩm đã tồn tại',
            'c_price.required' => 'Bạn chưa nhập giá cho sản phẩm'
        ]);

        $product = new Product;
        $product->c_name = $request->c_name;
        $product->unsigned_name = parent::removeUnicode($request->c_name);
        $product->fk_product_id = $request->pk_category_detail_id;
        $product->c_description = $request->c_description;
        $product->c_price = $request->c_price;
        $product->c_hotproduct = isset($request->c_hotproduct) ? 1 : 0 ;

        for ($i = 0; $i < 5 ; $i++) {
            if ($i == 0) {
                $c_img = "";
                if ($request->hasFile("c_img")) {
                    $c_img = $request->file("c_img")->getClientOriginalName();
                    $c_img = time().$c_img;            
                    $request->file("c_img")->move("public/upload/product/", $c_img);
                }
                $product->c_img = $c_img;
            } else {
                ${'c_img'.$i} = "";
                if ($request->hasFile("c_img".$i)) {
                    ${'c_img'.$i} = $request->file("c_img".$i)->getClientOriginalName();
                    ${'c_img'.$i} = time().${'c_img'.$i};            
                    $request->file("c_img".$i)->move("public/upload/product/", ${'c_img'.$i});
                }
                $product->{'c_img'.$i} = ${'c_img'.$i};
            }
        }
        $product->save();

        return redirect('admin/product/add')->with('announce','Thêm thành công');
    }

    public function getEdit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $category_detail = CategoryDetail::where('fk_category_detail_id', $product->categoryDetail->fk_category_detail_id)->get();
        $array = [
            'product' => $product, 
            'categories' => $categories, 
            'category_detail' => $category_detail
        ];
        return view('admin.product.edit', $array);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'c_name' => ['required', Rule::unique('product')->ignore($id, 'pk_product_id')],
            'c_price' => 'required'
        ], [
            'c_name.required' => 'Bạn chưa nhập tên sản phẩm ',
            'c_name.unique' => 'Sản phẩm đã tồn tại',
            'c_price.required' => 'Bạn chưa nhập giá cho sản phẩm'
        ]);

        $product = Product::find($id);
        $product->c_name = $request->c_name;
        $product->unsigned_name = parent::removeUnicode($request->c_name);
        $product->fk_product_id = $request->pk_category_detail_id;
        $product->c_description = $request->c_description;
        $product->c_price = $request->c_price;
        $product->c_hotproduct = isset($request->c_hotproduct) ? 1 : 0 ;

        for ($i=0 ; $i < 5; $i++) {
            if ($i == 0) {
                if ($request->hasFile("c_img")) {
                    $old_img = Product::where('pk_product_id', $id)->first('c_img');
                    if ($old_img->c_img != "" && file_exists("public/upload/product/".$old_img->c_img))
                        unlink("public/upload/product/".$old_img->c_img);

                    $c_img = $request->file("c_img")->getClientOriginalName();
                    $c_img = time().$c_img;            
                    $request->file("c_img")->move("public/upload/product/", $c_img);
                    
                    $product->c_img = $c_img;
                }
            } else {
                if ($request->hasFile("c_img".$i)) {
                    ${'old_img'.$i} = Product::where('pk_product_id', $id)->first('c_img'.$i);
                    if (${'old_img'.$i}->{'c_img'.$i} != "" && file_exists("public/upload/product/".${'old_img'.$i}->{'c_img'.$i}))
                        unlink("public/upload/product/".${'old_img'.$i}->{'c_img'.$i});

                    ${'c_img'.$i} = $request->file("c_img".$i)->getClientOriginalName();
                    ${'c_img'.$i} = time().${'c_img'.$i};            
                    $request->file("c_img".$i)->move("public/upload/product/", ${'c_img'.$i});
                    
                    $product->{'c_img'.$i} = ${'c_img'.$i};
                }
            }
        }
        $product->save();

        return redirect('admin/product/edit/'.$id)->with('announce','Sửa thành công');
    }

    public function getDelete($id)
    {
        $product = Product::find($id);
        for ($i = 0; $i < 5 ; $i++) {
            if ($i == 0) {
                if ($product->c_img != "" && file_exists("public/upload/product/".$product->c_img)){
                    unlink("public/upload/product/".$product->c_img);
                }
            } else {
                if ($product->{'c_img'.$i} != "" && file_exists("public/upload/product/".$product->{'c_img'.$i})){
                    unlink("public/upload/product/".$product->{'c_img'.$i});
                }
            }
        }
        $product->delete();
        return redirect('admin/product/list');
    }
    
}
