@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="user-name">
            @if (!$comment->user->information || !$comment->user->information->img)
                <img src="public/images/user.jpg" alt="">
            @else
                <img src="public/upload/user/{{$comment->user->information->img}}" alt="">
            @endif
            <span >{{ $comment->user->name }}</span>
            <span>{{$comment->created_at}}</span>
        </div>
        <p class="content-comment">{{ $comment->body }}</p>
        @if ($comment->user_id == Auth::id())
        <form action="edit-comments/{{$comment->id}}" method="post" class="edit-comments">
            @csrf
            <div class="form-group">
                <textarea class="form-control textarea" name="body" required>{{ $comment->body }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-submit" id="submit" value="Gửi" />
                <input type="button" class="btn btn-submit" id="cancel" value="Hủy" />
                <input type="button" class="btn btn-submit" id="function" value="Sửa" />
                <a href="delete-comments/{{$comment->id}}" class="btn btn-submit" id="delete" onclick="return window.confirm('Chắc chắn xóa')">Xóa</a>
            </div>
        </form>
        @else
        <form method="post" action="{{ route('add-comments') }}" class="add-comments">
            @csrf
            <div class="form-group">
                <textarea class="form-control textarea" name="body" placeholder="Trả lời..." required></textarea>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-submit" id="function" value="Trả lời" />
                @if(Auth::user() && Auth::user()->level == 1)
                <a href="delete-comments/{{$comment->id}}" class="btn btn-submit" id="delete" onclick="return window.confirm('Chắc chắn xóa')">Xóa</a>
                @endif
                <input type="submit" class="btn btn-submit" id="submit" value="Gửi" />
                <input type="button" class="btn btn-submit" id="cancel" value="Hủy" />
            </div>
        </form>
        @endif
        @include('client.comment.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach

@section ('script')
<script type="text/javascript">
    $(function(){
        $('.display-comment').find('#function').click(function(){
            $(this).parentsUntil('.display-comment').find('.textarea').css('display', 'block');
            $(this).hide();
            $(this).siblings('#submit').show();
            $(this).siblings('#cancel').show();
            $(this).siblings('#delete').hide();
        });
        $('.display-comment').find('#cancel').click(function(){
            $(this).hide();
            $(this).siblings('#submit').hide();
            $(this).siblings('#function').show();
            $(this).parentsUntil('.display-comment').find('.textarea').css('display', 'none');
            $(this).siblings('#delete').show();
        });
    });
</script>
@endsection
