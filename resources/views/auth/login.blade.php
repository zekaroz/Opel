@extends('layouts.app')

@section('body')

<script src="{{ asset("js/login_script.js") }}" charset="utf-8"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form id="login" class="form-horizontal" role="form" method="POST" action="{{ route('ajax_login') }}"  data-parsley-validate>
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="O campo email é obrigatório">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required="Introduza a sua password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary ladda-button ladda-progress"
                                        data-style="zoom-out">
                                    <i class="fa fa-btn fa-sign-in"></i>
                                    <span class="ladda-label"> Login</span>
                                </button>

                                <a href="/login/facebook">
                                      <div class="btn btn-md btn-primary ladda-button"
                                          data-style="expand-left"
                                          data-size="s"
                                          data-color="blue">
                                          <i class="fa fa-facebook"></i>
                                          Login with Facebook
                                      </div>
                                </a>
                            </div>

                          <div class="col-md-6 col-md-offset-4">
                              <hr>
                          </div>

                            <div class="col-md-6 col-md-offset-4" style="margin-top:20px;">
                              <a href="/social/redirect/google" class="btn btn-block btn-social btn-google">
                                <i class="fa fa-google"></i> Sign in with Google
                              </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
