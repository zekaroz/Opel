    @if(env('APP_ENV') == 'local')
    <style>
        .DEVENV{
            border-bottom: 2px solid red !important;
        }
    </style>
    @endif

<nav class="navbar navbar-default {{ (env('APP_ENV') == 'local')? 'DEVENV' : '' }}" style="margin-bottom: 0px;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    PCQAR
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::user())
                     <!--    <li {{ (Request::is('*shops') ? 'class="active"' : '') }}>
                          <a href="{{ url ('shops') }}"><i class="fa fa-car fa-fw"></i> Shops</a>
                     </li> -->
                     <li {{ (Request::is('*part_types') ? 'class="active"' : '') }}>
                         <a href="{{ url ('part_types') }}"><i class="fa fa-gears fa-fw"></i> Part Types</a>
                     </li>
                <!--     <li {{ (Request::is('*article_types') ? 'class="active"' : '') }}>
                         <a href="{{ url ('article_types') }}"><i class="fa fa-pencil-square-o fa-fw"></i> Article Types</a>
                     </li> -->
                     <li {{ (Request::is('*brands') ? 'class="active"' : '') }}>
                         <a href="{{ url ('brands') }}"><i class="fa fa-tags fa-fw"></i> Brands</a>
                     </li>
                     <li {{ (Request::is('*articles') ? 'class="active"' : '') }}>
                         <a href="{{ url ('articles') }}"><i class="fa fa-folder-open-o fa-fw"></i> Articles</a>
                     </li>
                     <li {{ (Request::is('*users') ? 'class="active"' : '') }}>
                         <a href="{{ url ('users') }}"><i class="fa fa-user fa-fw"></i> Users</a>
                     </li>
                     <li {{ (Request::is('*Dashboard') ? 'class="active"' : '') }}>
                         <a href="{{ url ('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                     </li>
                     @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
