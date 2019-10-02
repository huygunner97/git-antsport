@if (Auth::user())
<div class="chat-support" id="chat-support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Auth::user()->email == 'admin@gmail.com')
                <a href="messenger/{{$menu['message_latest']->room_id}}">
                    <div class="chat-button-link">
                        <i class="fas fa-sms"></i>
                    </div>
                </a>
                @else
                <div class="chat-button" id="@if($menu['number_noti']){{$menu['number_noti']->count_noti_client}}@endif">
                    <i class="fas fa-sms"></i>
                    @if($menu['number_noti'] && $menu['number_noti']->count_noti_client != 0)
                    <span id="number-noti">{{$menu['number_noti']->count_noti_client}}</span>
                    @else
                    <span id="number-noti" style="display:none"></span>
                    @endif
                </div>
                @endif
                <chat :user="@if(Auth::user()->information){{Auth::user()->information}}@else{{Auth::user()}}@endif" ></chat>
                
            </div>
        </div>
    </div>
</div>
@else
<div class="chat-support" id="chat-support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('login')}}">
                    <div class="chat-button-link">
                        <i class="fas fa-sms"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endif