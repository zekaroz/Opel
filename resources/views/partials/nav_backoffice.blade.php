         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url ('') }}">Reci-Opel | Backoffice</a>
            </div>
            <div class="navbar-header">
            <!-- /.navbar-top-links -->
            </div>
          <!--    /.navbar-top-links -->
<!-- user profile -->   
                @if(! Auth::check() )
                    <div class="navbar-header" style="margin-left: 35%;margin-top: 9px;">
                        <a href="auth/login" class="btn btn-success btn-outline" style="width: 250px">Log In</a>
                    </div>
                @else
                    <ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-user">
                                <ul style="padding:0px;">
                                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}  </a>
                                        </li>
                                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                <li><a href="{{url('/')}}/auth/logout">Logout</a></li>
                                </ul>
                                <!-- /.dropdown-user -->    
                            </div>

                        </li>
                        <!-- /.dropdown -->
                    </ul>
                @endif
          
          
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                                <li {{ (Request::is('*shops') ? 'class="active"' : '') }}>
                                     <a href="{{ url ('shops') }}"><i class="fa fa-car fa-fw"></i> Shops</a>
                                </li>
                                <li {{ (Request::is('*part_types') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('part_types') }}"><i class="fa fa-gears fa-fw"></i> Part Types</a>
                                </li>
                                <li {{ (Request::is('*article_types') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('article_types') }}"><i class="fa fa-pencil-square-o fa-fw"></i> Article Types</a>
                                </li>
                                <li {{ (Request::is('*brands') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('brands') }}"><i class="fa fa-bold fa-fw"></i> Brands</a>
                                </li>
                                <li {{ (Request::is('*articles') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('articles') }}"><i class="fa fa-wrench fa-fw"></i> Articles</a>
                                </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
