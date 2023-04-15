<!DOCTYPE html>
<html lang="en">
<head>
@include('page.head1')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Register</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- @include('admin.alert') -->
      <?php

use Illuminate\Support\Facades\Session;

        $msg = Session::get('message');
        if($msg){
          echo '<span class="text-danger mr-1">'.$msg.'</span>';
          Session::put('message',null);
        }
      ?>
      <form action="/register" method="post">
      <div class="input-group mb-3">
          <input type="input" name="name" class="form-control" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fa-solid fa-user"></i>
              <!-- <span class="fas fa-lock"></span> -->
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="input" name="phone" class="form-control" placeholder="Phone">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fa-solid fa-phone"></i>
              <!-- <span class="fas fa-lock"></span> -->
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea class="form-control" name="address" id="" cols="20" rows="5" placeholder="Address"></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <!-- <span class="fas fa-lock"></span> -->
            </div>
          </div>
        </div>
        
        <!-- <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
         
        </div> -->
        <div class="row" style="display:flex;justify-content:space-evenly">
        <!-- <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div> -->
          <div class="col-4" style="float: right;">
            <button type="submit" class="btn btn-success btn-block">Register</button>
          </div>
        </div>
        @csrf 
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@include('page.foot1')
</body>
</html>


