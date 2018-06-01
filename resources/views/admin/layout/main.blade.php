<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Admin Panel</title>
    <meta name="description" content="" /> 
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Language" content="ru" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <base href="/">
    {{-- <link href="vendor/admin-ui/css/bootstrap.css" rel="stylesheet" /> --}}
    <link href="vendor/admin-ui/css/font-awesome.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i&amp;subset=cyrillic" rel="stylesheet"> 
    @yield('css') 
    <link href="vendor/admin-ui/css/theme.material.css" rel="stylesheet" />
    <link href="vendor/admin-ui/css/app.css" rel="stylesheet" />
</head>
<body class="dark">
    

    {{-- Header --}}
    <header class="wrapper">
        <div class="col-left">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="logo text-center">
                <img src="vendor/admin-ui/images/user-avatar.png" class="img-fluid pull-left">
                <span class="pull-right">Интернет магазин EVA</span>  
            </a>

            {{-- Main Navigation --}}
            <nav class="navbar-left">   
                
                {{-- User --}}
                <div class="navbar-user d-flex align-items-center">
                    <img src="vendor/admin-ui/images/user-avatar.png" class="img-fluid">
                    <div class="navbar-user-name">
                        Александр Беляев <br />
                        <span><i class="online"></i> online</span>    
                    </div>                 
                </div>

                {{-- ActionMenu --}}
                <ul class="nav-main">
                    <li><a href="{{ route('home') }}"><i class="fa fa-tachometer-alt"></i> Панель управления</a></li>
                    <li class="active"><a href="{{ route('product') }}"><i class="fa fa-indent"></i> Товары</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-folder-open"></i> Категории</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-project-diagram"></i> Характеристики</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-file-alt"></i> Страницы</a></li>
                    <li><a href="{{ route('home') }}"><i class="fa fa-users-cog"></i> Пользователи</a></li>
                </ul>

            </nav>                

        </div>

        <div class="col-right">
            <div class="row no-gutters justify-content-between">
                
                {{-- TopNav Left --}}
                <nav class="navbar">
                    <ul class="nav-top nav-top-left">
                        <li><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </nav> 

                {{-- TopNav Right --}}
                <nav class="navbar">
                    <ul class="nav-top nav-top-right">
                        <li class="active"><a href=""><i class="far fa-envelope"></i></a></li>
                        <li><a href=""><i class="far fa-user"></i></a></li>
                        <li>
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <img src="vendor/admin-ui/images/user-avatar.png" class="user-avatar img-fluid rounded-circle">
                                <span>Александр Беляев</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href=""><i class="fa fa-sign-in-alt"></i> Вход</a></li>
                                <li><a href=""><i class="fa fa-sign-out-alt"></i> Выход</a></li>
                                <li><a href=""><i class="fa fa-user-plus"></i> Регистрация</a></li>
                            </ul>
                        </li>
                    </ul>        
                </nav> 

            </div>  
        </div>
    </header> 


    {{-- Content --}}
    <div class="wrapper">
        <div class="col-right">
            
            <div class="app-action-title row no-gutters justify-content-between"> 
                <h3>
                    @yield('title') 
                    <small>
                        @yield('title-description')
                    </small>
                </h3>
                <div class="btn-group-sm">
                    @yield('title-actions')     
                </div>
            </div>
                
            @yield('content') 
                    
        </div>  
    </div>



    


    <script>
        var _token = "{{ csrf_token() }}";
        var _current_url = "{{ Request::url() }}";
        var _current_url_full = "{{ Request::fullUrl() }}";
    </script>
    {{-- <script src="vendor/admin-ui/js/jquery.js"></script> --}}
    {{-- <script src="vendor/admin-ui/js/popper.js"></script>     --}}
    {{-- <script src="vendor/admin-ui/js/bootstrap.js"></script> --}}
    <script src="vendor/admin-ui/js/theme.material.js"></script>
    <script src="vendor/admin-ui/js/app.js"></script>
    @yield('js')

    
    
</body>
</html>