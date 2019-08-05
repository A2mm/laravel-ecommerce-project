@extends('layouts.master')

@section('content')

   <div class="container">
   <div class="row admin-form-row">
    <div class="col-md-offset-2 col-md-8">
    <div class="admin-form">
            @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h5> {{ Session::get('error_message') }} </h5>
            </div>
            @endif
           <h3 class="text-center">Admin Login </h3>
        <form class="form-horizontal" method="POST" action="/admin/login">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('admin_email') ? ' has-error' : '' }}">

                            <label for="admin_email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <div class="input-group"> 
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="admin_email" class="form-control" name="admin_email" value="{{ old('admin_email') }}"  >
                                </div>

                                @if ($errors->has('admin_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('admin_password') ? ' has-error' : '' }}">
                            <label for="admin_password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <div class="input-group"> <span class="input-group-addon">
                                    <i class="fas fa-lock"></i></span>
                                <input id="admin_password" type="password" class="form-control" name="admin_password" >
                            </div>

                                @if ($errors->has('admin_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
</div>
</div>
</div>
</div>

@endsection
