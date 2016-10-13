@extends('layouts.app')

@section('title')
    Droidtronix - Open Source Hub
@endsection

@section('pagetitle')
    <section id="sp-page-title">
        <div class="row">
            <div id="sp-title" class="col-sm-12 col-md-12">
                <div class="sp-column "></div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div id="sp-component" class="col-sm-12 col-md-12">
        <div class="sp-column ">
            <div id="system-message-container">
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="page-login-form box login">
                        <div class="login-description text-center">
                            Welcome Back
                            <p>You can sign in with your email.</p>
                        </div>

                        <form action="{{ url('/login') }}" method="post" class="form-validate">
                            
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="group-control">
                                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address *" required autofocus> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="group-control">
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"> Remember me </label>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success btn-lg btn-block btn-login">
                                    Log in </button>
                            </div>

                        </form>
                    </div>
                    <div class="form-links">
                        <ul>
                            <li>
                                <a href="{{ url('/password/reset') }}">Forgot your password?</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection