@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('content')

    <div class="container main">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="row p-4" style="border-bottom: 1px solid #ccc;">
                    <div class="col-lg-8 col-md-12">
                        <img src="{{asset('uploads/' . $dataPosts[0]->image)}}" alt="" style="width: 100%;">
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <a class="sub-link" href="{{route('clients.detail', ['id' => $dataPosts[0]->posts_id])}}">
                            <h3>{{$dataPosts[0]->title}}</h3>
                        </a>
                        <a class="sub-link" href="{{route('clients.detail', ['id' => $dataPosts[0]->posts_id])}}">
                            <p>{{$dataPosts[0]->short_description}}</p>
                        </a>

                    </div>
                </div>
                <div class="row p-4" style="border-bottom: 1px solid #ccc;">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div >
                                    <a class="sub-link" href="{{route('clients.detail', ['id' => $dataPosts[1]->posts_id])}}"><img src="{{asset('uploads/' . $dataPosts[1]->image)}}" alt="" style="width: 100%;"></a>
                                </div>
                                <a class="sub-link" href="{{route('clients.detail', ['id' => $dataPosts[1]->posts_id])}}">
                                    <p class="sub-text">{{$dataPosts[1]->title}}</p>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div>
                                    <a class="sub-link" href="{{route('clients.detail', ['id' => $dataPosts[2]->posts_id])}}"><img src="{{asset('uploads/' . $dataPosts[2]->image)}}" alt="" style="width: 100%;"></a>
                                </div>
                                <a class="sub-link" href="{{route('clients.detail', ['id' => $dataPosts[2]->posts_id])}}">
                                    <p class="sub-text">{{$dataPosts[2]->title}}</p>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-12">
                        <p class="mindset">Góc nhìn</p>
                        <a class="sub-link" href="">
                            <p class="sub-text">Bóng đá 'thấp bé nhẹ cân'</p>
                        </a>
                        <p class="">Bóng đá Việt Nam nên 'mơ mộng' ở tầm World Cup, hay cần một cái nhìn thực tế hơn?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-4">
                <img src="{{asset('uploads/qc.png')}}" alt="" style="width: 100%;">
            </div>
        </div>
        <div class="row remarkable">
            <div class="row">
                <p class="attention">Đáng chú ý</p>
            </div>
            <div class="row sub-remarkable ">
                <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                    <a href=""><img src="{{asset('uploads/z5095812137999-e33113e5cdcfea3-4036-6977-1705921668.jpg')}}" alt=""></a>
                    <a href="">
                        <p>Romania muốn thành cửa ngõ cho hàng hóa Việt Nam vào châu Âu</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                    <a href=""><img src="{{asset('uploads/z5095812137999-e33113e5cdcfea3-4036-6977-1705921668.jpg')}}" alt=""></a>
                    <a href="">
                        <p>Romania muốn thành cửa ngõ cho hàng hóa Việt Nam vào châu Âu</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                    <a href=""><img src="{{asset('uploads/z5095812137999-e33113e5cdcfea3-4036-6977-1705921668.jpg')}}" alt=""></a>
                    <a href="">
                        <p>Romania muốn thành cửa ngõ cho hàng hóa Việt Nam vào châu Âu</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 p-4">
                    <a href=""><img src="{{asset('uploads/z5095812137999-e33113e5cdcfea3-4036-6977-1705921668.jpg')}}" alt=""></a>
                    <a href="">
                        <p>Romania muốn thành cửa ngõ cho hàng hóa Việt Nam vào châu Âu</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row content-2">
            <div class="col-lg-5 col-md-12 side-bar p-4">
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <a href="">
                            <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                        </a>
                    </div>
                    <div class="row sub-side-bar">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2">
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 p-3 aside">
                <div class="row">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Kinh doanh</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link" href="#">quốc tế</a>
                                        <a class="nav-link" href="#">doanh nghiệp</a>
                                        <a class="nav-link" href="#">chứng khoán</a>
                                        <a class="nav-link" href="#">Vĩ mô</a>
                                        <a class="nav-link" href="#">Hậu trường kinh doanh</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href=""><img src="{{asset('uploads/xangdautphcm42020quynhtran-170-9186-7910-1705909539.jpg')}}" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Doanh nghiệp bán lẻ vẫn muốn có chiết khấu cố định xăng dầu
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        Doanh nghiệp bán lẻ đề xuất có chiết khấu cố định trong cơ cấu giá bán khi Bộ Công Thương xây dựng nghị định ...
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Doanh nghiệp bán lẻ vẫn muốn có chiết khấu cố định xăng dầu
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        Doanh nghiệp bán lẻ đề xuất có chiết khấu cố định trong cơ cấu giá bán khi Bộ Công Thương xây dựng nghị định ...
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Hòa Phát lãi hơn 6.800 tỷ đồng năm ngoái
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Ngân hàng tiếp tục hạ giá du thuyền của FLC thêm 2,6 tỷ đồng
                                </a>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Người Mỹ lạc quan về nền kinh tế
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <table class="table table-bordered border-primary table-primary">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="2">
                                        TỶ GIÁ NGOẠI TỆ</th>
                                    <th scope="col">Mua TM</th>
                                    <th scope="col">Mua CK</th>
                                    <th scope="col">Bán</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row" colspan="2">USD/VNĐ</td>
                                    <td>24.330</td>
                                    <td>24.410</td>
                                    <td>24.720</td>
                                </tr>
                                <tr>
                                    <td scope="row" colspan="2">EUR/VNĐ</td>
                                    <td>26.374</td>
                                    <td>26.453</td>
                                    <td>27.126</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Bất động sản</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link" href="#">chính sách</a>
                                        <a class="nav-link" href="#">thị trường</a>
                                        <a class="nav-link" href="#">dự án</a>
                                        <a class="nav-link" href="#">không gian sống</a>
                                        <a class="nav-link" href="#">Tư vấn</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href=""><img src="{{asset('uploads/hieu0831-jpg-1705908977.jpg')}}" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Căn hộ 110 m2 gợi nhắc không gian biệt thự Pháp cổ
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        HÀ NỘI-Không gian căn hộ lấy cảm hứng từ lối kiến trúc và cách sử dụng màu sắc của các biệt thự Pháp cổ
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Dư 60 triệu đồng một tháng, nên đầu tư loại bất động sản nào?
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        Chuyên gia nói, đất dân sinh, đất nền dự án ở TP HCM hoặc tỉnh có thể cho lợi nhuận kỳ vọng vượt trội
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Biệt thự 880 m2 như 'chốn ẩn mình' giữa khu Thảo Điền
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Lợi nhuận đầu tư căn hộ TP HCM giảm
                                </a>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Dự án Bắc Đầm Vạc, biệt thự vườn Vinaconex 6 chậm tiến độ
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Thể thao</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link" href="#">Bóng đá</a>
                                        <a class="nav-link" href="#">Tennis</a>
                                        <a class="nav-link" href="#">Marathon </a>
                                        <a class="nav-link" href="#">Lịch thi đấu</a>
                                        <a class="nav-link" href="#">Asian Cup 2023</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href=""><img src="{{asset('uploads/2-1705979514-4206-1705979672.jpg')}}" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Djokovic muốn treo vợt bên các đàn em
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        AUSTRALIA-Tay vợt số một thế giới Novak Djokovic cho biết thích ý tưởng kết thúc sự nghiệp bên các đàn em, hơn là với các kình địch trong ...
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Ronaldo bị nghi chê Ligue 1 vì Messi
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        PHÁP-Theo cựu nữ tuyển thủ Pháp Laure Boulleau, Cristiano Ronaldo chê giải Ligue 1 có thể là vì Lionel Messi từng thi đấu tại đây.
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Alcaraz: 'Đối thủ bất lực như khi tôi gặp Djokovic'
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Các mẹo để runner cải thiện dáng chạy
                                </a>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Trung Quốc khó qua vòng bảng Asian Cup 2023
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside result p-4">
                        <div class="sub-aside-border row">
                            <!-- <div class="slider-container"> -->
                            <div class="card">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-6" class="team">
                                                <p class="time">KT</p>

                                            </div>
                                            <div class="col-6" class="end-time">
                                                <p class="time">Hôm nay</p>

                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-6" class="team">
                                                <p class="name">Quatar</p>

                                            </div>
                                            <div class="col-6" class="end-time">
                                                <p class="res">1</p>

                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-6" class="team">
                                                <p class="name">Trung quốc</p>

                                            </div>
                                            <div class="col-6" class="end-time">
                                                <p class="name">0</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-6" class="team">
                                                <p class="time">KT</p>

                                            </div>
                                            <div class="col-6" class="end-time">
                                                <p class="time">Hôm nay</p>

                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-6" class="team">
                                                <p class="name">Australia</p>

                                            </div>
                                            <div class="col-6" class="end-time">
                                                <p class="res">1</p>

                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-6" class="team">
                                                <p class="name">Uzbekistan</p>

                                            </div>
                                            <div class="col-6" class="end-time">
                                                <p class="name">0</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-5" class="team">
                                                <p class="time">KT</p>

                                            </div>
                                            <div class="col-5" class="end-time">
                                                <p class="time">Hôm nay</p>

                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-5" class="team">
                                                <p class="name">Syria</p>

                                            </div>
                                            <div class="col-5" class="end-time">
                                                <p class="res">1</p>

                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 0; margin: 0;">
                                            <div class="col-5" class="team">
                                                <p class="name">Ấn độ</p>

                                            </div>
                                            <div class="col-5" class="end-time">
                                                <p class="name">0</p>

                                            </div>
                                        </div>

                                    </div>



                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Giải trí</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link" href="#">Nhạc</a>
                                        <a class="nav-link" href="#">Giới sao </a>
                                        <a class="nav-link" href="#">Phim </a>
                                        <a class="nav-link" href="#">Thời trang</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href=""><img src="{{asset('uploads/laurensanchezmacsexy-170597758-2285-8955-1705977654.jpg')}}" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Người tình mặc sexy đón sinh nhật tỷ phú Jeff Bezos
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        Diễn viên Mỹ Lauren Sánchez diện váy hở ngực dịp mừng tuổi 60 của chồng sắp cưới ...
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        'Trái đất chuyển mình' - lịch sử chưa kể về nhân loại
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        Tác giả Peter Frankopan cho rằng môi trường tự nhiên là yếu tố quyết định đến lịch sử loài người, trong ...
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Vợ phủ nhận bị Quách Phú Thành coi thường
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Hậu trường Diệu Nhi đóng cảnh bị cháy trong phim Tết
                                </a>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Những màn 'lăn xả' của Mỹ Linh tại show Đạp gió
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row d-flex     ">
                            <div class=" d-flex align-items-center">
                                <p style="margin: 0;">Cẩm nang các bệnh:</p>
                                <!-- </div>
                            <div class="col"> -->
                                <button class="health">Hô hấp</button>
                                <button class="health">Tai mũi hỏng</button>
                                <button class="health">Gia liễu</button>
                                <button class="health">Tiêu hóa</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Đời sống</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link" href="#">Bài học sống</a>
                                        <a class="nav-link" href="#">Tổ ấm</a>
                                        <a class="nav-link" href="#">Tiêu dùng </a>
                                        <a class="nav-link" href="#">Mua sắm thông minh</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href=""><img src="{{asset('uploads/64562cd7d5847fda2695-170597910-1462-6408-1705979118.jpg')}}" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Công nhân xếp hàng lấy gà, gạo, thịt ăn Tết
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        TP HCM-Cảnh công nhân xếp hàng nhận thưởng Tết là gạo, mắm, thịt, gà sống "như thời bao cấp" tại một công ty ở Tân Thạnh Đông, huyện Củ Chi ...
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Gia đình hơn 70 năm làm mứt gừng
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        BÌNH DƯƠNG-Hai tháng nay, bà Trần Tuyết Phượng, 50 tuổi, ở phường Hưng Định, TP Thuận An tất bật vào vụ làm mứt gừng bán dịp ...
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    5 vật dụng không nên để cạnh tivi
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Dấu hiệu một tình bạn đã đến lúc kết thúc
                                </a>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Mẹo bảo quản tôm tươi lâu ngày Tết
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Giáo dục</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="nav-link" href="#">Tin tức</a>
                                        <a class="nav-link" href="#">Tuyển sinh</a>
                                        <a class="nav-link" href="#">Chân dung </a>
                                        <a class="nav-link" href="#">Du học sinh</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row">
                            <div class="col-md-4 col-sm-12">
                                <a href=""><img src="{{asset('uploads/tung-1-jpeg-1705939075-4363-1705939211.jpg')}}" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Nam sinh đỗ trường có tỷ lệ chọi top đầu ở Mỹ
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        Đức Tùng, 18 tuổi, trúng tuyển ngôi trường có tỷ lệ chấp nhận chỉ 1% ở Mỹ, có thể học tập tại 7 quốc gia và vùng lãnh thổ, sau khi trải qua 6 ...
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="row">
                                    <a href="" class="text">
                                        Thêm 4 trường công ở TP HCM dự kiến thi đầu vào lớp 6
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="" class="sub-text">
                                        4 trường THCS ở quận 4, 7 và TP Thủ Đức dự kiến tuyển lớp 6 bằng bài khảo sát, bên cạnh trường chuyên ...
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row sub-aside p-4">
                        <div class="sub-aside-border row" style="border: 0;">
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Ai cướp ngôi nhà Trần, lập ra triều đại ngắn nhất lịch sử Việt Nam?
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Tự học ngành An ninh mạng có được không?
                                </a>

                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="" class="text text-two">
                                    Bốn điểm mới trong tuyển sinh đại học Mỹ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row content-3 p-4">
            <div class="row sub-content">
                <div class="row" style="border-bottom: 1px solid #ccc">
                    <div class="row">
                        <div class="col title p-4">
                            <h2>Khoa học - Công nghệ</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="container-fluid d-flex align-items-center">
                                    <a class="navbar-brand" href="#">Khoa học</a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                        <div class="navbar-nav">
                                            <a class="nav-link" href="#">Việt nam</a>
                                            <a class="nav-link" href="#">Chỉ số PII</a>
                                            <a class="nav-link" href="#">Phát minh</a>
                                            <a class="nav-link" href="#">Ứng dụng</a>
                                            <a class="nav-link" href="#">Thế giới tự nhiên</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="row ">
                                <div class="col">
                                    <img src="{{asset('uploads/')}}Raochanlu-1705981904-8267-1705982121.jpg" alt="">
                                    <a href="">
                                        <p class="sub-text">Hệ thống rào chắn lũ khổng lồ của Venice hoạt động thế nào?</p>
                                    </a>
                                    <a href="">
                                        <p class="text">Hệ thống rào chắn MOSE, hoạt động lần đầu vào năm 2020, gồm 78 cổng lớn tương đương 2 sân tennis và có thể dựng lên khi nước dâng. </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-5  center-content">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{asset('uploads/VNETaxi-1705980369-2063-1705980477.jpg')}}" alt="">
                                            <p class="sub-text" class="sub-text">Huyndai ra mắt taxi bay 193 km/h cất hạ cánh thẳng đứng</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{asset('uploads/VNEWhale-1705919703-8761-1705919772.jpg')}}" alt="">
                                            <p class="sub-text">Hung thần cá voi từng khiến thủy thủ Constantinope khiếp sợ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Đại dương đáng giá bao nhiêu?</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/VNE-Buy.jpg')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Loài chim 'đồ tể' chuyên xiên thịt con mồi</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/Chimxien-1705900067-6813-1705901068.jpg')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Bên trong nhà kính rộng bằng 80 sân bóng</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/nhakinhsetreal-1705921828-7802-1705921854.jpg')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Tàu vũ trụ Nhật Bản dừng hoạt động sau 3 tiếng đổ bộ Mặt Trăng</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/VNEMoon59551705677806-17059118-8518-8430-1705912049.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-bottom: 1px solid #ccc">
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="container-fluid d-flex align-items-center">
                                    <a class="navbar-brand" href="#">Số hóa</a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                        <div class="navbar-nav">
                                            <a class="nav-link" href="#">Công nghệ</a>
                                            <a class="nav-link" href="#">Sản phẩm</a>
                                            <a class="nav-link" href="#">Blockchain</a>
                                            <a class="nav-link" href="#">Kinh nghiệm</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-lg-6 col-sm-12">
                            <div class="row ">
                                <div class="col">
                                    <img src="{{asset('uploads/galaxy-ring-jpeg-1705985471-6168-1705985474.jpg')}}" alt="">
                                    <a href="">
                                        <p class="sub-text">Nhẫn Galaxy Ring dự kiến ra cuối 2024</p>
                                    </a>
                                    <a href="">
                                        <p class="text">Nhẫn thông minh Galaxy Ring của Samsung được cho là ra mắt nửa cuối năm, trọng lượng nhẹ với ba kiểu dáng và 13 kích cỡ khác nhau. </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-5  center-content">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{asset('uploads/top-1705987527-3565-1705987535.jpg')}}" alt="">
                                            <p class="sub-text" class="sub-text">Có nên bật máy sưởi, điều hòa ấm cả đêm?</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{asset('uploads/ios17-1705966482-1705966498-7731-1705966710.jpg')}}" alt="">
                                            <p class="sub-text">Apple ra iOS 17.3 loại bỏ dần mật khẩu</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Sự tiến hóa lên phiên bản 3.0 của Jack Ma</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/jack-ma-1-4587-1680322545-1705-7595-4735-1705934974.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Galaxy S24 Ultra thắng iPhone 15 Pro Max về thời lượng pin</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/Screenshot20240122at094802-170-2523-4096-1705891809.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">Epson EB-L770U - máy chiếu có thể ghép đôi</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/DSC09889-1705936320.jpg')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row content-right">
                                        <div class="col-8">
                                            <p class="sub-text">BST 'Kỳ Linh Giáp Thìn' - quà Tết ấn tượng và ý nghĩa 2024</p>
                                        </div>
                                        <div class="col-4">
                                            <img src="{{asset('uploads/481989r648364z37994279i369.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
