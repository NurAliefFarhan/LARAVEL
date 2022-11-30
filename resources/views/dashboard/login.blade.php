@extends('layout')
@section('content')
    <div class="overlay"></div>
    <form method="POST" action="{{route('login.auth')}}" class="box"> 
        @csrf 
        <div class="header">
            <h2>Login Page</h2>
            <p>Ini adalah login page untuk masuk!</p>
        </div>
            <!-- jika register akan menghasilkan popup ini di login form -->
                <!-- @if(Session::get('success'))
                    <div class="alert alert-success w-75">
                        {{Session::get('success')}}
                    </div>
                @endif -->

        <div class="login-area">
        @if(Session::get('success'))
            <div class="alert alert-success w-70">
                {{Session::get('success')}} 
            </div>
        @endif

        <!-- fail, jika gagal login --> 
        @if(Session::get('fail'))
            <div class="alert alert-denger w-70">
                {{Session::get('fail')}} 
            </div>
        @endif

        {{-- disesuaikan dengan halaman Middleware, sehingga harus login untuk akses todo, tidak bisa http://127.0.0.1:8000/todo --}}
        @if(Session::get('notAllowed'))
            <div class="alert alert-danger w-70">
                {{Session::get('notAllowed')}} 
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <input type="text" name="username" class="username" placeholder="Username">
            <input type="password" name="password" class="password" placeholder="Password">
            <!-- <input type="submit" value="Login" class="submit"> -->
            <button type="submit" value="Login" class="submit">Login</button>

            <!-- <a href="#">Belum punya account!</a> -->
                <p>
                    Tidak punya account?
                    <!-- <a href="register.html">Form register</a> -->
                    <a href="register">Form register</a>
                </p>
        </div>
    </form> 
@endsection


























{{-- @extends('layout')

@section('content')
<div class="overlay"></div>
<div class="container d-flex justify-content-center align-items-center mt-5">
    <form method="POST" action="{{route('login.auth')}}" class="box">

        @csrf
        <div class="header">
            <h2>Login Page</h2>
            <p>Ini adalah login page untuk masuk!</p>
        </div>



        @if (Session::get('success'))
             <div class="alert alert-success w-75">
                 {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('fail'))
             <div class="alert alert-danger">
                 {{ Session::get('fail') }}
            </div>
        @endif
        @if (Session::get('notAllowed'))
             <div class="alert alert-danger">
                 {{ Session::get('notAllowed') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>   
            </div>
        @endif
        <div class="text-center logo">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="text-center mt-3">
            
        <span class="info-text">silahkan mengisi username dan password untuk login</span>
        
        </div>
        <div class="position-relative mt-3 form-input">
            <label>Username</label>
            <input class="form-control" type="text" name="username">
            <i class="fas fa-user"></i>
        </div>
        <div class="position-relative mt-3 form-input">
            <label>Password</label>
            <input class="form-control" type="password" name="password">
            <i class="fas fa-lock"></i>
        </div>
        
        <div class=" mt-5 d-flex justify-content-between align-items-center">
            <span><a href="{{route('register')}}" style="text-decoration: underline;">Tidak punya akun?</a></span>
            <button type="submit" class="go-button"><i class="fas fa-long-arrow-right"></i></button>
        </div>


            <input type="text" name="username" class="username" placeholder="Username">
            <input type="password" name="password" class="password" placeholder="Password">
            <button type="submit" value="Login" class="submit">Login</button>

        <p> 
            Tidak punya account?
            <a href="register">Form register</a>
        </p>
    </form>
</div>
@endsection
 --}}



