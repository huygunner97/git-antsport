@extends('messenger.index')

@section('content')
<div class="messenger">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="padding-right:0; padding-left:0">
                <div class="chat-user">
                    <div class="admin">
                        <a href="" id="homepage">
                            <img src="public/upload/user/{{Auth::user()->information->img}}" alt="">
                            <span>Admin</span>
                        </a>
                    </div>
                    <div class="members">
                        <ul>
                            @for ($i = 0; $i< $n ; $i++)
                            <li>
                                <a href="messenger/{{$user_latest[$i]->id}}">
                                    <div class="user @if($user_latest[$i]->id == $user->id){{'active'}}@endif" >
                                        <div class="user-img">
                                            @if (!$user_latest[$i]->information || !$user_latest[$i]->information->img)
                                                <img src="public/images/user.jpg" alt="">
                                            @else
                                                <img src="public/upload/user/{{$user_latest[$i]->information->img}}" alt="">
                                            @endif
                                        </div>
                                        <div class="user-name" id="{{$user_latest[$i]->id}}">
                                            <p>{{$user_latest[$i]->name}}</p>
                                            <p id="message_latest">
                                                @if ($message_latest[$i])
                                                    @if ($message_latest[$i]->user->id == 1)
                                                    You: {{$message_latest[$i]->message}}
                                                    @else
                                                    {{$message_latest[$i]->user->name}}: {{$message_latest[$i]->message}}
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                        <div class="notifications" id="@if($user_latest[$i]->notification){{$user_latest[$i]->notification->count_noti}}@endif">
                                            @if ($user_latest[$i]->notification && $user_latest[$i]->notification->count_noti != 0 )
                                            <span id="number">{{$user_latest[$i]->notification->count_noti}}</span>
                                            @else
                                            <span id="number" style="display:none"></span>
                                            @endif
                                        </div>
                                        <div class="status" @if ($user_latest[$i]->status == 'off')style="display:none"@endif><i class="fas fa-circle"></i></div>
                                    </div>
                                </a>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding-right:0; padding-left:0" id="chat">
                <input type="hidden" name="room_id" value="{{$user->id}}" >
                <message :user="{{$data}}" :admin="@if(Auth::user()->information){{Auth::user()->information}}@else{{Auth::user()}}@endif"></message>
            </div>
            <div class="col-md-3" style="padding-right:0; padding-left:0">
                <div class="user-information">
                    <div class="avatar">
                        <div class="img">
                            @if (!$user->information || !$user->information->img)
                            <img  src="public/images/user.jpg" alt="">
                            @else
                            <img src="public/upload/user/{{$user->information->img}}" alt="">
                            @endif
                        </div>
                        <div class="name">
                            <span>{{$user->name}}</span>
                        </div>
                    </div>
                    <div class="information">
                        <table class="table table-borderless table-striped">
                            <tr>
                            </tr>
                            <tr>
                                <th>Email : </th>
                            </tr>
                            <tr>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Address : </th>
                            </tr>
                            <tr>
                                @if ($user->information)
                                <td>{{$user->information->address}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Phone : </th>
                            </tr>
                            <tr>
                                @if ($user->information)
                                <td>+(84){{$user->information->phone}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('script')
    <script type="text/javascript">
        $('#homepage').hover(function(){
            $(this).children('span').html('Homepage');
        }, function(){
            $(this).children('span').html('Admin');
        });
    </script>
@endsection
