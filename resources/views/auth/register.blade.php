@extends('layouts.app')
@section('css')
<style>
        .register{
 background: -webkit-linear-gradient(left, #3931af, #00c6ff);
 margin-top: 3%;
 padding: 3%;
}
.register-left{
 text-align: center;
 color: #fff;
 margin-top: 4%;
}
.register-left input{
 border: none;
 border-radius: 1.5rem;
 padding: 2%;
 width: 60%;
 background: #f8f9fa;
 font-weight: bold;
 color: #383d41;
 margin-top: 30%;
 margin-bottom: 3%;
 cursor: pointer;
}
.register-right{
 background: #f8f9fa;
 border-top-left-radius: 10% 50%;
 border-bottom-left-radius: 10% 50%;
}
.register-left img{
 margin-top: 15%;
 margin-bottom: 5%;
 width: 25%;
 -webkit-animation: mover 2s infinite  alternate;
 animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
 0% { transform: translateY(0); }
 100% { transform: translateY(-20px); }
}
@keyframes mover {
 0% { transform: translateY(0); }
 100% { transform: translateY(-20px); }
}
.register-left p{
 font-weight: lighter;
 padding: 12%;
 margin-top: -9%;
}
.register .register-form{
 padding: 10%;
 margin-top: 10%;
}
.btnRegister{
 float: right;
 margin-top: 10%;
 border: none;
 border-radius: 1.5rem;
 padding: 2%;
 background: #0062cc;
 color: #fff;
 font-weight: 600;
 width: 50%;
 cursor: pointer;
}
.register-heading{
 text-align: center;
 margin-top: 8%;
 margin-bottom: -15%;
 color: #495057;
}
     </style>
@endsection
@section('content')
<div class="container register" style="max-width:1000px;">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>You are a few steps away from getting the best of Placement Performance</p>
                <input type="submit" name="" value="Login"/><br/>
            </div>
            <div class="col-md-9 register-right">
                {{-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                    </li>
                </ul> --}}
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as an Organization</h3>
                        <div class="register-form">
                                <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                
                                            <div class="col-md-12">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="admin_name" class="col-form-label text-md-right">{{ __('Admin Name') }}</label>
                    
                                                <div class="col-md-12">
                                                    <input id="admin_name" type="text" class="form-control{{ $errors->has('admin_name') ? ' is-invalid' : '' }}" name="admin_name" value="{{ old('admin_name') }}" required autofocus>
                    
                                                    @if ($errors->has('admin_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('admin_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                
                                        <div class="form-group">
                                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-12">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="phone" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>
                    
                                                <div class="col-md-12">
                                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                    
                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="address" class="col-form-label text-md-right">{{ __('Address') }}</label>
                        
                                                    <div class="col-md-12">
                                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
                        
                                                        @if ($errors->has('address'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                
                                        <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
