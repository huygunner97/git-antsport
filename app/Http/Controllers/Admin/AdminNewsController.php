<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\News;

class AdminNewsController extends AdminController
{
    public function getList()
    {
        $newses = News::orderBy('pk_news_id', 'desc')->paginate(3);

        return view('admin.news.list', ['newses' => $newses]);
    }

    public function getAdd()
    {
    	return view('admin.news.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'c_title' => 'required|unique:news,c_title',
            'c_content' => 'required'

        ], [
            'c_title.required' => 'Bạn chưa nhập tiêu đề tin tức',
            'c_title.unique' => 'Tin tức đã tồn tại',
            'c_content.required' => 'Bạn chưa nhập nội dung'
        ]);

        $news = new News;
        $news->c_title = $request->c_title;
        $news->unsigned_title = parent::removeUnicode($request->c_title);
        $news->c_content = $request->c_content;
        if (isset($request->c_date)) {
            $news->c_date = $request->c_date;
        } else {
            $date = getdate();
            $news->c_date = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
        }
        $c_img = "";
        if ($request->hasFile("c_img")) {
            $c_img = $request->file("c_img")->getClientOriginalName();
            $c_img = time().$c_img;            
            $request->file("c_img")->move("public/upload/news/", $c_img);
        }
        $news->c_img = $c_img;
        $news->c_type = $request->c_type;
        $news->c_hotnews = isset($request->c_hotnews) ? 1 : 0; 
        $news->save();

        return redirect('admin/news/add')->with('announce','Thêm thành công');
    }

    public function getEdit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', ['news' => $news]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'c_title' => ['required', Rule::unique('news')->ignore($id, 'pk_news_id')],
            'c_content' => 'required'

        ], [
            'c_title.required' => 'Bạn chưa nhập tiêu đề tin tức',
            'c_title.unique' => 'Tin tức đã tồn tại',
            'c_content.required' => 'Bạn chưa nhập nội dung'
        ]);

        $news = News::find($id);
        $news->c_title = $request->c_title;
        $news->unsigned_title = parent::removeUnicode($request->c_title);
        $news->c_content = $request->c_content;
        if (isset($request->c_date)) {
            $news->c_date = $request->c_date;
        } else {
            $date = getdate();
            $news->c_date = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
        }
        if ($request->hasFile("c_img")) {
            $old_img = News::where('pk_news_id', $id)->first('c_img');
            if ($old_img->c_img != "" && file_exists("public/upload/news/".$old_img->c_img))
                unlink("public/upload/news/".$old_img->c_img);

            $c_img = $request->file("c_img")->getClientOriginalName();
            $c_img = time().$c_img;            
            $request->file("c_img")->move("public/upload/news/", $c_img);
            
            $news->c_img = $c_img;
        }
        $news->c_type = $request->c_type;
        $news->c_hotnews = isset($request->c_hotnews) ? 1 : 0; 
        $news->save();

        return redirect('admin/news/edit/'.$id)->with('announce','Sửa thành công');
    }

    public function getDelete($id)
    {
        $news = News::find($id);
        for ($i = 0; $i < 2 ; $i++) {
            if ($i == 0) {
                if ($news->c_img != "" && file_exists("public/upload/news/".$news->c_img)){
                    unlink("public/upload/news/".$news->c_img);
                }
            } else {
                if ($news->{'c_img'.$i} != "" && file_exists("public/upload/news/".$news->{'c_img'.$i})){
                    unlink("public/upload/news/".$news->{'c_img'.$i});
                }
            }
        }
        $news->delete();
        return redirect('admin/news/list');
    }
    
}
