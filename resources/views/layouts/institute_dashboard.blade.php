<html>
<head>
<title>Institute Dashboard</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->

@yield('css')
<link href="{{asset('css/institute.css')}}" rel="stylesheet">
<script src="{{asset('js/institute.js')}}"></script>

<style>
nav
{
    background: #F17153;
    background: -webkit-linear-gradient(#F17153, #F58D63, #f1ab53);
    background: -o-linear-gradient(#F17153, #F58D63, #f1ab53);
    background: -moz-linear-gradient(#F17153, #F58D63, #f1ab53);
    background: linear-gradient(#F17153, #F58D63, #f1ab53);

}
.side-nav
{
    background: #F17153;
    background: -webkit-linear-gradient(#F17153, #F58D63, #f1ab53);
    background: -o-linear-gradient(#F17153, #F58D63, #f1ab53);
    background: -moz-linear-gradient(#F17153, #F58D63, #f1ab53);
    background: linear-gradient(#F17153, #F58D63, #f1ab53);
}
.navbar-inverse .navbar-nav>li>a
{
    color:#fff;
}
.list {
    color: #fff;
    list-style: none;
}
.list::first-line {
    color: rgba(255, 255, 255, 0.5);
}
.list>li:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-left: 5px solid white;
    color: white;
}
</style>
</head>
<body>
{{-- <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div> --}}
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="srm.png" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav list">
                <li>
                  <a href="{{route('home')}}"><i class="fa fa-fw fa-home"></i> DASHBOARD</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-briefcase"></i>  COMPANY <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="{{route('addCompany')}}"><i class="fa fa-user-plus"></i> Add Company</a></li>
                        <li><a href="#"><i class="fa fa-list"></i> View Company</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-user"></i>  TEACHERS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="{{route('addTeacher')}}"><i class="fa fa-user-plus"></i> Add Teacher</a></li>
                        <li><a href="#"><i class="fa fa-list"></i> View Teacher</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user"></i> STUDENTS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="{{route('addStudent')}}"><i class="fa fa-user-plus"></i> Add Student</a></li>
                        <li><a href="#"><i class="fa fa-list"></i> View Student</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    @yield('content');
                </div>
            </div>
        </div>
    </div>
</div>
@yield('script');	
</body>
</html>