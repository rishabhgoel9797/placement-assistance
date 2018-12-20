<html>
<head>
<title>Teacher Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#">Teacher</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>

      <!-- Navbar -->
       <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            @if(count($ins_not)>0)
            @foreach($ins_not as $i)
            <div class="row">
              <div class="col-md-6 col-sm-6">
            <img src="/uploads/avatars/institute/{{$ins_pro}}" style="width:50px;height: 50px; border-radius: 50%;">
              </div>
              <div class="col-md-6 col-sm-6">
            <a class="dropdown-item" href="#"><h5>{{$i->title}}</h5>{{$i->description}}</a>
              </div>
            </div>
            <div class="dropdown-divider"></div>
            @endforeach
            @else
             <a class="dropdown-item" href="#">No Notification by your Institute</a>
            <div class="dropdown-divider"></div>
            @endif
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{route('teacherprofile')}}"><i class="fa fa-fw fa-user"></i> Profile</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-fw fa-power-off"></i> Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Companies</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-bell"></i>
            <span>Notification</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
            <span>Teachers</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Students</span></a>
        </li>
      </ul>

<div id="content-wrapper">
 <div class="container-fluid">
         @yield('content')
      </div>
  </div>

    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to Logout?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('teacher.logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('js/sb-admin.min.js')}}"></script>

@yield('script')
</body>
</html>