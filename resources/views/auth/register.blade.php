@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- register --}}
        <div class="col-md-8">
            <div class="row" id="login">
                <div class="col-12 col-md-6 hoverme">
                    <div class="img-file">
                        <img src="{{asset('frontend_assests/img/login.jpg')}}" width="400px" height="400px">
                    </div>
                    <div class="info">
                        <div class="content">
                           <h4 style="font-size: 30px;">Welcome To <span style="font-family: 'Satisfy', cursive;font-size: 30px;" class="text-dark">Alisaisai</span></h4> 
                           <p>To keep connected us please register with your personal info</p>
                           <a class="btn register" href="{{route('login')}}">login</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" id="content">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h3 class="text-center my-3 text-primary" style="letter-spacing: 2px;">Register</h3>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary d-block login w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex" id="social">
                        <a href=""><i class="icofont-facebook"></i></a>
                        <a href=""><i class="icofont-google-plus"></i></a>
                        <a href=""><i class="icofont-email"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
    <style type="text/css">
        #login{
            position: relative;
            width: 800px;
            height: 500px;
            /*border: 1px solid black;*/
            box-shadow: 2px 10px 20px black;
            overflow: hidden;
            border-radius: 20px;
        }
        h3{
            font-weight: 700;
            line-height: 40px;
            position: absolute;
            top: 50px;
            left: 30%;
        }
        #login .img-file{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
        }
        #login .img-file img{
            position: absolute;
            width: 100%;
            height: 100%;
        }
        #content{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-control{
            width: 300px;
            line-height: 40px;
            border-radius: 30px;
            min-height: 20px;
            font-size: 15px;
            padding: 10px 20px;
        }
        .login{
            font-size: 15px;
            border-radius: 30px;
            margin-bottom: 15px;
        }
        #social{
            position: absolute;
            bottom: 10%;
            left: 28%;
        }
        #social a{
            display: inline-block;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 50%;
            border:1px solid #0275d8;
            margin-right: 15px;
            transition: .5s;
            /*font-size:16px;*/
        }
        #social a i{
            font-size: 16px;
            transition: .5s;
        }
        #social a:hover{
            background-color:#0275d8;
            color: white!important;
            transform: rotate(360deg);
        }
        .info{
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            transition: .5s;
            visibility: hidden;
            transform: translate(-300px,-300px);
            background-color: #5882FA;
        }
        .hoverme:hover .info{
            transform: translateX(0px);
            visibility: visible;
        }
        .info .content{
            padding: 10px 40px;
            text-align:center;
        }
        .register{
            font-size: 15px;
            border-radius: 30px;
            margin-bottom: 15px;
            border: 1px solid white;
            color: white;
            padding: 10px 40px;
            transition: .5s;
        }
        .register:hover{
            background-color: white;
            color: #5882FA;
        }
        .info .content h4{
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: white;
        }
        .info .content p{
            color: #F2F2F2;
            padding: 5px 40px;
            font-size: 15px;
            line-height: 25px;
        }
        body{
             background-image:linear-gradient(to right,#5882FA 51.5%,white 50%);
        }
    </style>
@endsection
