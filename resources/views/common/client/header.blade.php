<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <title><?= $title ?></title>--}}
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-light nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="fa-solid fa-house"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active sub-nav" href="#">Thời sự</a>
                    <a class="nav-link active sub-nav" href="#">Góc nhìn</a>
                    <a class="nav-link active sub-nav" href="#">Thế giới</a>
                    <a class="nav-link active sub-nav" href="#">Chính trị</a>
                    <a class="nav-link active sub-nav" href="#">Hot</a>
                </div>
            </div>
            <div class="d-flex  align-items-center">
                <form action="" method="get">
                    <div class="search-icon" id="searchIcon" onclick="toggleSearchBox()">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="search-box" id="searchBox" onchange="offForm()">
                        <input type="text" placeholder="Search...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                @if (Auth::check())
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{route('login')}}" class="login"><i class="fa-regular fa-user"></i> Đăng nhập</a>
                @endif





        </div>
        </div>
    </nav>
</header>
{{--<style>--}}
{{--    .login {--}}
{{--        border: none;--}}
{{--    }--}}

{{--    .search-icon {--}}
{{--        cursor: pointer;--}}
{{--        margin-right: 10px;--}}
{{--    }--}}

{{--    .search-box {--}}
{{--        display: none;--}}
{{--        margin-right: 10px;--}}
{{--    }--}}

{{--    .search-box input {--}}
{{--        /* padding: 10px; */--}}
{{--        margin-right: 10px;--}}
{{--        width: 200px;--}}
{{--        border: 1px solid #ccc;--}}
{{--        border-radius: 5px;--}}
{{--        font-size: 14px;--}}
{{--    }--}}

{{--    .search-box button {--}}
{{--        border: none;--}}
{{--        background-color: white;--}}
{{--    }--}}
{{--</style>--}}
{{--<script>--}}
{{--    function toggleSearchBox() {--}}
{{--        const searchBox = document.getElementById("searchBox");--}}
{{--        const searchIcon = document.getElementById("searchIcon");--}}

{{--        if (searchBox.style.display === "none" || searchBox.style.display === "") {--}}
{{--            searchBox.style.display = "block";--}}
{{--            searchIcon.style.display = "none";--}}
{{--        } else {--}}
{{--            searchBox.style.display = "none";--}}
{{--            searchIcon.style.display = "block";--}}
{{--        }--}}
{{--    }--}}

{{--    function offForm() {--}}
{{--        const searchBox = document.getElementById("searchBox");--}}
{{--        const searchIcon = document.getElementById("searchIcon");--}}

{{--        if (searchBox.style.display === "none" || searchBox.style.display === "") {--}}
{{--            searchBox.style.display = "block";--}}
{{--            searchIcon.style.display = "none";--}}
{{--        } else {--}}
{{--            searchBox.style.display = "none";--}}
{{--            searchIcon.style.display = "block";--}}
{{--        }--}}

{{--    }--}}
{{--</script>--}}
