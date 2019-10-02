<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends AdminController
{
    public function getList()
    {
        $users = User::orderBy('id', 'desc')->paginate(3);

        $array = [
        	'users' => $users
        ];
        return view('admin.user.list', $array);
    }


    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::where('id', $id)->first('level');
        if ($user->level == 1) {
            User::where('id', $id)->update([
                'level' => 0,
            ]);
        } else {
            User::where('id', $id)->update([
                'level' => 1,
            ]);
        }

        return redirect('admin/user/list');
    }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list');
    }

}
