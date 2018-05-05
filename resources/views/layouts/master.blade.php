<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Honghafeed C.A.R System</title>
    <link href="{{ URL::asset('css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/dropzone.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.atwho.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset(elixir('css/app.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <style>
        .select2-container .select2-selection--single {
            height: 34px !important;
        }
    </style>
</head>
<body>

<div id="wrapper">

    <button type="button" class="navbar-toggle menu-txt-toggle" style=""><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>

    <div class="navbar navbar-default navbar-top">
        <!--NOTIFICATIONS START-->
        <div class="menu">

            <div class="notifications-header"><p>Thông báo</p> </div>
            <!-- Menu -->
            <ul>
                <?php $notifications = auth()->user()->unreadNotifications; ?>

                @foreach($notifications as $notification)

                    <a href="{{ route('notification.read', ['id' => $notification->id])  }}" onClick="postRead({{ $notification->id }})">
                        <li>
                            <img src="{{ url(auth()->user()->avatar) }}" class="notification-profile-image">
                            <p>{{ $notification->data['message']}}</p></li>
                    </a>
                @endforeach
            </ul>
        </div>

        <div class="dropdown" id="nav-toggle">
            <a style="color: white" href="{{url('/users', \Auth::id())}}"><b>{{Auth::user()->name}}</b></a><span><img style="margin-top: -13px; margin-right:5px" src="{{url(\Auth::user()->avatar)}}" class="notification-profile-image"></span>
            <a id="notification-clock" role="button" data-toggle="dropdown">
                <i class="glyphicon glyphicon-bell"><span id="notifycount">{{ $notifications->count() }}</span></i>
            </a>
        </div>
        @push('scripts')
            <script>
                $('#notification-clock').click(function(e) {
                    e.stopPropagation();
                    $(".menu").toggleClass('bar')
                });
                $('body').click(function(e) {
                    if ($('.menu').hasClass('bar')) {
                        $(".menu").toggleClass('bar')
                    }
                })
                id = {};
                function postRead(id) {
                    $.ajax({
                        type: 'post',
                        url: '{{url('/notifications/markread')}}',
                        data: {
                            id: id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                }

            </script>
    @endpush
    <!--NOTIFICATIONS END-->
        <button type="button" id="mobile-toggle" class="navbar-toggle mobile-toggle" data-toggle="offcanvas" data-target="#myNavmenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>


    <!-- /#sidebar-wrapper -->
    <!-- Sidebar menu -->

    <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
        <div class="list-group panel">
            <p class=" list-group-item siderbar-top" title=""><img src="{{url('images/flarepoint_logo.png')}}" alt=""></p>
            <a href="{{route('dashboard', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-dashboard"></i><span id="menu-txt">{{ __('Dashboard') }}</span> </a>
            <a href="{{route('users.show', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-user"></i><span id="menu-txt">{{ __('Profile') }}</span> </a>

            <a href="#tickets" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-shopping-cart"></i><span id="menu-txt">{{ __('Đặt hàng') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="tickets">

                <a href="{{ route('orders.index')}}" class="list-group-item childlist">{{ __('Tất cả') }}</a>
                <a href="{{ route('orders.create')}}"
                   class="list-group-item childlist">{{ __('Thêm mới') }}</a>
            </div>

            <a href="#clients" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-tag"></i><span id="menu-txt">{{ __('Khách hàng') }}</span>
            <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="clients">

                <a href="{{ route('clients.index')}}" class="list-group-item childlist">{{ __('Tất cả') }}</a>
                @if(Entrust::can('client-create'))
            <a href="{{ route('clients.create')}}"
                       class="list-group-item childlist">{{ __('Tạo mới') }}</a>
                @endif

                @if(Entrust::hasRole('administrator'))
                    <a href="{{ route('clients.import')}}"
                       class="list-group-item childlist">{{ __('Import danh sách') }}
                    </a>
                @endif
                </div>

            <a href="#user" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="sidebar-icon fa fa-users"></i><span id="menu-txt">{{ __('Nhân viên') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="user">
                <a href="{{ route('users.index')}}" class="list-group-item childlist">{{ __('Tất cả') }}</a>
                @if(Entrust::can('user-create'))
                    <a href="{{ route('users.create')}}"
                       class="list-group-item childlist">{{ __('Tạo mới') }}</a>
                @endif

                @if(Entrust::hasRole('administrator'))
                    <a href="{{ route('users.import')}}"
                       class="list-group-item childlist">{{ __('Import danh sách') }}
                    </a>
                @endif
            </div>

            <a href="#departments" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="sidebar-icon glyphicon glyphicon-list-alt"></i><span id="menu-txt">{{ __('Phòng/ban') }}</span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="departments">
                <a href="{{ route('departments.index')}}"
                   class="list-group-item childlist">{{ __('Tất cả') }}</a>
                @if(Entrust::hasRole('administrator'))
                    <a href="{{ route('departments.create')}}"
                       class="list-group-item childlist">{{ __('Tạo mới') }}</a>
                @endif
            </div>

            @if(Entrust::hasRole('administrator'))
                <a href="#settings" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                            class="glyphicon sidebar-icon glyphicon-cog"></i><span id="menu-txt">{{ __('Settings') }}</span>
                    <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
                <div class="collapse" id="settings">
                    <a href="{{ route('settings.index')}}"
                       class="list-group-item childlist">{{ __('Overall Settings') }}</a>

                    <a href="{{ route('roles.index')}}"
                       class="list-group-item childlist">{{ __('Role Management') }}</a>
                    <a href="{{ route('integrations.index')}}"
                       class="list-group-item childlist">{{ __('Integrations') }}</a>
                </div>


            @endif
            <a href="{{ url('/logout') }}" class=" list-group-item impmenu" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-log-out"></i><span id="menu-txt">{{ __('Sign Out') }}</span> </a>

        </div>
    </nav>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>@yield('heading')</h1>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>

                    @endif
                    @if(Session::has('flash_message_warning'))
                        <message message="{{ Session::get('flash_message_warning') }}" type="warning"></message>
                    @endif
                    @if(Session::has('flash_message'))
                        <message message="{{ Session::get('flash_message') }}" type="success"></message>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.caret.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.atwho.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
@stack('scripts')
</body>
</html>