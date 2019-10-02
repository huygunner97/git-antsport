<?php

namespace App\Http\Controllers;

use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Customer;
use App\Events\UserOnline;

class ExtraController extends ControllerClient
{
    public function logout()
    {
        User::where('id', Auth::id())->update(['status' => 'off']);
        $user = User::find(Auth::id());
        broadcast(new UserOnline($user))->toOthers();

        Auth::logout();
        session()->invalidate();

        return redirect('');
    }

    public function getIntroduct()
    {
        return view('client.extra.introduction');
    }

    public function getContact()
    {
        return view('client.extra.contact_us');
    }

    public function getTrademark()
    {
        return view('client.extra.trademark');
    }

    public function getCheckout()
    {
        $user = User::where('id', Auth::id())->first();
        return view('client.extra.checkout', ['user' => $user]);
    }

    public function postCheckout(Request $request)
    {
        $this->validate($request,[
            'phone' => 'size:10',
        ], [
            'phone.size' => 'Số điện thoại không hợp lệ (10 số)',
        ]);

        $customer = new Customer;
        $customer->hoten = $request->name;
        $customer->diachi = $request->address;
        $customer->dienthoai = $request->phone;
        $customer->date = now();
        $customer->fk_user_id = Auth::id();
        $customer->save();

        $tonggia = 0;
        foreach (session('cart') as $product) {
            $tonggia = $tonggia + $product["number"] * $product["c_price"];
        }

        $order = new Order;
        $order->customer_id = $customer->pk_customer_id;
        $order->price = $tonggia;
        $order->save();

        foreach (session('cart') as $value) {
            //insert ban ghi
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->order_id;
            $order_detail->fk_product_id = $value['pk_product_id'];
            $order_detail->price = $value['c_price'];
            $order_detail->number = $value['number'];
            $order_detail->classify = $value['classify'];
            $order_detail->save();
        }
        session(['cart' => []]);
        return redirect('gio-hang');
    }

    public function getUserInfo()
    {
        return view('client.extra.user_info');
    }

    public function validateUserInfoForm(Request $request)
    {
        $validator = Validator::make($request->all(), [], []);

        $name = $request->name;
        if ($name == "") {
            $validator->after(function ($validator) {
                $validator->errors()->add('name', 'Bạn chưa nhập tên đăng nhập');
            });
        }

        $password = $request->password;
        if (isset($password)) {
            if ($password == 'null') {
                $validator->after(function ($validator) {
                    $validator->errors()->add('password', 'Bạn chưa nhập mật khẩu');
                });
            }
            else if (strlen($password) < 8) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('password', 'Mật khẩu cần ít nhất 8 ký tự');
                });
            }
        }
        

        $phone = $request->phone;
        if ($phone == "") {
            $validator->after(function ($validator) {
                $validator->errors()->add('phone', 'Bạn chưa nhập số điện thoại');
            });
        } else if (strlen($phone) != 10) {
            $validator->after(function ($validator) {
                $validator->errors()->add('phone', 'Số điện thoại không hợp lệ (10 số)');
            });
        }

        $address = $request->address;
        if ($address == "") {
            $validator->after(function ($validator) {
                $validator->errors()->add('address', 'Bạn chưa nhập địa chỉ');
            });
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors;
        } else {
            return response()->json(['ok'=> '']);
        }


    }

    public function postUserInfo(Request $request)
    {
        $id = Auth::id();

        if ($request->hasFile("img")) {
            $old_img = UserInformation::where('user_id', $id)->first('img');
            if ($old_img && $old_img->img  && file_exists("public/upload/user/".$old_img->img)) {
                unlink("public/upload/user/".$old_img->img);
            }

            $img = $request->file("img")->getClientOriginalName();
            $img = time().$img;
            $request->file("img")->move("public/upload/user/", $img);
            UserInformation::updateOrCreate(
                ['user_id' => $id],
                ['img' => $img]
            );
        }

        UserInformation::updateOrCreate(
            ['user_id' => $id],
            ['address' => $request->address, 'phone' => $request->phone]
        );

        if (!isset($request->password)) {
            User::where('id', $id)->update([
                'name' => $request->name,
            ]);
        } else {
            User::where('id', $id)->update([
                'password' => Hash::make($request->password),
                'name' => $request->name,
            ]);
        }

        return redirect('user-info');
    }
}
