<div class="comment" id="comment">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                     {{-- <div class="card-body">
                        @include('client.comment.commentsDisplay', ['comments' => $product_detail->comments, 'post_id' => $product_detail->pk_product_id])

                        <form method="post" action="{{ route('add-comments') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control textarea" name="body" placeholder="Thêm bình luận..." required></textarea>
                                <input type="hidden" name="post_id" value="{{ $product_detail->pk_product_id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-submit" value="Bình luận" />
                            </div>
                        </form>
                    </div>  --}}
                    <div class="card-body" data-post="{{$product_detail->pk_product_id}}">
                        @if(Auth::user())

                        <content-comments  :user="{{ Auth::user() }}" :comments="comments"></content-comments>
                        <form-comment v-on:commentsent="addComment" ></form-comment>

                        @else
                        <form method="post" action="{{ route('add-comments') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control textarea" name="body" placeholder="Thêm bình luận..." ></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-submit" value="Bình luận" />
                            </div>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
