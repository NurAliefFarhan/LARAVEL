@extends('layout')
@section('content')

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


   <div class="overlay"></div>
   <form method="POST" class="box" action="{{route('register.post')}}"> 
        @csrf 
       <div class="header">
           <h2>Register Page</h2>
           <p>Ini adalah register page, untuk mesuk ke halaman login!</p>
       </div>

       {{-- alert, register gagal --}}
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif


       <div class="login-area">
            <input type="email" name= "email" class="username" placeholder="Email">
            <input type="text" name= "name" class="username" placeholder="Nama Lengkap">
            <input type="text" name= "username" class="username" placeholder="Username">
            <input type="password" name= "password" class="username" placeholder="Password">
            <!-- <input type="submit" value="Register" class="submit">  -->
            <button type="submit" value="Login" class="submit">Register</button>


           <!-- <input type="text" class="username" placeholder="Username">
           <input type="password" class="password" placeholder="Password"> -->
           <!-- <a href="#">Sudah punya account!</a> -->

            <p>
            Sudah punya account?
            <a href="/">Form Login</a>
            </p>
       </div>
   </form> 
@endsection 

































{{-- @extends('layout')

@section('content')

<div class="container my-5 d-flex justify-content-center align-items-center">
    <form method="POST" action="{{route('register.post')}}" class="card py-4 px-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="text-center logo ml-3">
            <i class="fas fa-user-plus"></i>
        </div>
        <div class="text-center mt-3">
            
        <span class="info-text">silahkan mengisi data di bawah untuk membuat akun baru</span>
        
        </div>
        <div class="position-relative mt-3 form-input">
            <label>Email</label>
            <input class="form-control" type="email" name="email">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="position-relative mt-3 form-input">
            <label>Nama Lengkap</label>
            <input class="form-control" type="text" name="name">
            <i class="fas fa-id-card"></i>
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
            <span><a href="/" style="text-decoration: underline;">Login</a></span>
            <button type="submit" class="go-button"><i class="fas fa-plus"></i></button>
        </div>
    </form>
</div>
@endsection

     --}}