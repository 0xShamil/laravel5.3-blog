@extends('layouts.app')

@section('title')
    Welcome to Droidtronix - Open Source Hub
@endsection

@section('pagetitle')
    <section id="sp-page-title">
        <div class="row">
            <div id="sp-title" class="col-sm-12 col-md-12">
                <div class="sp-column "> Please pick a password</div>
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
                            Welcome to Droidtronix
                            <p>Please pick a password for your account.</p>
                        </div>

                         {!! Form::open(['action' => 'WelcomeController@savePassword']) !!}

                                {!! Form::hidden('token', $token) !!}
                                {!! Form::hidden('email', $user->email) !!}

                            <div class="form-group">
                                <div class="group-control">
                                    {!! Form::password('password', [null, 'class' => 'form-control', 'placeholder' => 'Enter a Password' ]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="group-control">
                                    {!! Form::password('password_confirmation', [null, 'class' => 'form-control', 'placeholder' => 'Confirm your password' ]) !!}
                                </div>
                            </div>

                            <div class="form-group text-right">
                                {!! Form::button('Save password', ['type'=>'submit', 'class' => 'btn btn-success btn-lg btn-block btn-login']) !!}

                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
