<div>
    <h2>
        Lấy lại mật khẩu
    </h2>
    <p>Xin chào {{$name}}</p>
    <strong>Link này chỉ hiểu lực trong 5 phút</strong>
    <p><a href="{{ route('ChangePassword', ['id'=>$id, 'token'=>$token ]) }}">Click vào đây để lấy lại mật khẩu.</a></p>
</div>
