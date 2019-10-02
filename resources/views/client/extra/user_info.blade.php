@extends ('client.detail.index')

@section ('menu')
    @include ('client.layout.menu')
@endsection

@section ('content')
<div class="breadcrumb">
    <div class="container">
        <a href=""><i class="fas fa-home"></i>&nbsp;Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;
        <a href="{{route('user-info')}}" class="active-text">Thông tin người dùng</a>
    </div>
</div>
<!-- main -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category">
                    @include ('client.layout.menu_detail')
                </div>
            </div>
            <div class="col-md-9">
                <div class="user-info">
                    <div class="card">
                        <div class="card-header">
                            <span>Thông tin người dùng</span>
                        </div>

                        <div class="card-body">
                            <div class="info-detail">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên người dùng') }} :</label>
                                    <input class="col-md-6 form-control" type="text" value="{{Auth::user()->name}}" disabled />
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }} :</label>
                                    <input class="col-md-6 form-control" type="text" value="{{Auth::user()->email}}" disabled />
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ') }} :</label>
                                    <input class="col-md-6 form-control" type="text" value="@if(Auth::user()->information && Auth::user()->information->address){{Auth::user()->information->address}}@endif" disabled />
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Điện thoại') }} :</label>
                                    <input class="col-md-6 form-control" type="text" value="@if(Auth::user()->information && Auth::user()->information->phone)+(84){{Auth::user()->information->phone}}@endif" disabled />
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Ảnh đại diện') }} :</label>

                                    <div class="col-md-6">
                                        @if(!Auth::user()->information || Auth::user()->information->img=="")
                                            <img src="public/images/user.jpg" alt="">
                                        @else
                                            <img src="public/upload/user/{{Auth::user()->information->img}}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top:20px;">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-6 text-md-left">
                                        <button type="button" class="btn btn-submit change-info">
                                            {{ __('Thay đổi') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('user-info') }}"  class="info-form" enctype= "multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right"><i>*</i>{{ __('Tên người dùng') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{isset(Auth::user()->name) ? Auth::user()->name : old('name') }}"  >
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="err err-name"></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"><i>*</i>{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{isset(Auth::user()->email) ? Auth::user()->email : old('email') }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right"><i>*</i>{{ __('Mật khẩu') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"  disabled placeholder="Tích để đổi mật khẩu">

                                        <span class="invalid-feedback" role="alert">
                                            <strong class="err err-pass"></strong>
                                        </span>
                                    </div>
                                    <div class="col-md-2" >
                                        <input id="change-pass" type="checkbox">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right text-add-infor">{{ __('Thông tin thêm :') }}</label>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address" value="{{isset(Auth::user()->information->address) ? Auth::user()->information->address : old('address') }}" >
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="err err-address"></strong>
                                        </span>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">{{ __('Điện thoại') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{isset(Auth::user()->information->phone) ? '0'.Auth::user()->information->phone : old('phone') }}" >

                                        <span class="invalid-feedback" role="alert">
                                            <strong class="err err-phone"></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">{{ __('Ảnh đại diện') }}</label>

                                    <div class="col-md-6">
                                        <input type="file"  name="img">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-submit" id="save-change">
                                            {{ __('Lưu thay đổi') }}
                                        </button>
                                        <button type="button" class="btn btn-submit cancel-change">
                                            {{ __('Huỷ') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->

@endsection

@section ('script')
<script>
    $(function(){
        $('#change-pass').click(function(){
            if ($(this).prop('checked') == true) {
                $('#password').removeAttr('disabled');
            }
            else {
                $('#password').attr('disabled', 'true');
            }
        });
    });

    $(function() {
        $('.change-info').click(function(){
            $('.info-detail').hide();
            $('.info-form').fadeIn('300');
        });

        $('.cancel-change').click(function(){
            $('.info-detail').fadeIn('300');
            $('.info-form').hide();
        });
    });

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var info_form = $('.info-form');
        info_form.find('#save-change').click(function () {
            var name = info_form.find("input[name=name]").val();
            var address = info_form.find("input[name=address]").val();
            var password = info_form.find("input[name=password]").val();
            var phone = info_form.find("input[name=phone]").val();

            if ($('#change-pass').prop('checked') == true) {
                if (password == '') {
                    password = 'null';
                }
            }

            info_form.find('.err').each(function () {
                $(this).html('');
                $(this).parentsUntil('.form-group').find('.form-control').removeClass('is-invalid');
            });

            $.ajax({
                url : "user-info/validate",
                type : "post",
                dataType: 'json',
                data: {
                    name:name, address:address , phone:phone, password:password,
                },
                success : function (data){
                    var result = [];
                    $.each(data, function (key, item) {
                        result[key] = item;
                    });

                    if (result['name']) {

                        var html ='';
                        $.each(result['name'], function (key, item) {
                            html += ''+item+'</br>';
                        });
                        info_form.find('.err-name').html(html);
                        info_form.find("input[name=name]").addClass('is-invalid');

                    } 
                    else if (result['password']) {

                        var html ='';
                        $.each(result['password'], function (key, item) {
                            html += ''+item+'</br>';
                        });
                        info_form.find('.err-pass').html(html);
                        info_form.find("input[name=password]").addClass('is-invalid');

                    } 
                    else if (result['address']) {

                        var html ='';
                        $.each(result['address'], function (key, item) {
                            html += ''+item+'</br>';
                        });
                        info_form.find('.err-address').html(html);
                        info_form.find("input[name=address]").addClass('is-invalid');

                    }  else if (result['phone']) {

                        var html ='';
                        $.each(result['phone'], function (key, item) {
                            html += ''+item+'</br>';
                        });
                        info_form.find('.err-phone').html(html);
                        info_form.find("input[name=phone]").addClass('is-invalid');

                    }  else {
                        info_form.submit();
                    }
                }
            });
        });
    })
</script>
@endsection
