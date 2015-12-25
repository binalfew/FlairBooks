@extends('layouts.app')

@section('content')
    <div class="log-reg content-md">
        <div class="container">
            <div class="row">
                <div class="col-md-7 md-margin-bottom-50">
                    <h2 class="welcome-title">Welcome to Flair Books Center</h2>
                    <div class="info-block-v2">
                        <i class="icon icon-layers"></i>
                        <div class="info-block-in">
                            <h3>Pellentesque vulputate</h3>
                            <p>Vestibulum non ex volutpat, sodales diam sit amet, semper nunc. Integer sed nibh commodo, tincidunt nisi.</p>
                        </div>    
                    </div>    
                    <div class="info-block-v2">
                        <i class="icon icon-settings"></i>
                        <div class="info-block-in">
                            <h3>Curabitur tincidunt</h3>
                            <p>Vestibulum non ex volutpat, sodales diam sit amet, semper nunc. Integer sed nibh commodo, tincidunt nisi.</p>
                        </div>    
                    </div>
                    <div class="info-block-v2">
                        <i class="icon icon-paper-plane"></i>
                        <div class="info-block-in">
                            <h3>Aenean condimentum</h3>
                            <p>Vestibulum non ex volutpat, sodales diam sit amet, semper nunc. Integer sed nibh commodo, tincidunt nisi.</p>
                        </div>    
                    </div>
                </div>

                <div class="col-md-5">
                    <form method="POST" action="{{ url('/login') }}" class="log-reg-block sky-form">
                        <h2>Log in to your account</h2>
                        {{ csrf_field() }}
                        @include('errors.list')
                        <section>
                            <label class="input login-input">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="email"
                                        placeholder="Email Address"
                                        name="email"
                                        class="form-control"
                                        value="{{old('email')}}"
                                        required>
                                </div>
                            </label>
                        </section>        
                        <section>
                            <label class="input login-input no-border-top">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password"
                                        placeholder="Password"
                                        name="password"
                                        class="form-control"
                                        required>
                                </div>    
                            </label>
                        </section>
                        <div class="row margin-bottom-5">
                            <div class="col-xs-6">
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox"/>
                                    <i></i>
                                    Remember me
                                </label>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/password/reset') }}">Forget your Password?</a>
                            </div>
                        </div>
                        <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">
                            <i class="fa fa-btn fa-sign-in"></i>Log in
                        </button>
                    </form>
                    
                    <div class="margin-bottom-20"></div>
                    <p class="text-center">Don't have account yet? Learn more and <a href="/register">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
@stop