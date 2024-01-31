<ul>
    @if(!empty($data))
        @foreach($data as $comment)
            <li>
                <div class='row'>
                    <div class='d-flex delete-comment justify-content-between'>
                        <div class='d-flex align-items-center'>
                            <p class='name-user'><i class='fa-regular fa-user'></i>{{$comment['Name']}}:</p>
                            <p class='content-comment'>{{$comment['Content']}}</p>
                        </div>
                        @can('comment',$comment['UserId'])
                        <div class="d-flex align-items-center">
                            <form  action="{{route('DeleteComment')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$comment['CommentId']}}" name="CommentId">
                                <input class="" type="submit" value="Xóa">
                            </form>
                        </div>
                        @endcan
                    </div>
                </div>
                <div>
                    <div>

                        <form action='{{route('AddComment')}}' method='POST'>
                            @csrf
                            <textarea name='Content' id='submit' cols='100%' rows='1'></textarea>
                            <input type='hidden' name='PostsId' value="{{$postsId}}">
                            <input type='hidden' name='ParentId' value="{{$comment['CommentId']}}"><button type='submit' class='btn btn-primary'>Gửi</button>
                        </form>
                    </div>
                </div>
                @if(isset($comment['children']))
                    @include('clients.comment', ['data' => $comment['children'], '$postsId' => $postsId])
                @endif
            </li>
        @endforeach
    @endif
</ul>

<style>
    .delete-comment input{
        border: 0;
        padding-left:5px ;
        align-items: center;
        background: white;
    }

    .delete-comment input:hover{
        color: #0a6aa1;
    }

    .delete-comment p{
        margin: 0;
    }
</style>

