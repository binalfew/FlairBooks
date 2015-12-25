@extends('layouts.app')

@section('content')
    <div class="log-reg content-md margin-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-md-7 md-margin-bottom-50">
                    <h2 class="welcome-title">Welcome to Flair Books Center</h2>

                    <div class="row margin-bottom-50">
                        <div class="col-sm-4 md-margin-bottom-20">
                            <div class="site-statistics">
                                <span>20,039</span>
                                <small>Books</small>
                            </div>    
                        </div>
                        <div class="col-sm-4 md-margin-bottom-20">
                            <div class="site-statistics">
                                <span>54,283</span>
                                <small>Reviews</small>
                            </div>    
                        </div>
                        <div class="col-sm-4">
                            <div class="site-statistics">
                                <span>376k</span>
                                <small>Sale</small>
                            </div>    
                        </div>
                    </div>
                    <div class="members-number">
                        <h3>Join more than <span class="shop-green">13,000</span> members</h3>
                        <img class="img-responsive" src="/images/map.png" alt="">
                    </div>    
                </div>

                <div class="col-md-5">                    
                    <form method="POST" action="{{ url('/register') }}" class="log-reg-block">
                        <h2>Create New Account</h2>
                        @include('errors.list')
                        {{ csrf_field() }}

                        <div class="login-input reg-input">
                            <div class="row">
                                <div class="col-sm-6">
                                    <section>
                                        <label class="input">
                                            <input type="text"
                                                name="first_name"
                                                placeholder="First name"
                                                class="form-control"
                                                value="{{ old('first_name') }}"
                                                required>
                                        </label>
                                    </section>
                                </div>
                                <div class="col-sm-6">
                                    <section>
                                        <label class="input">
                                            <input type="text"
                                                name="last_name"
                                                placeholder="Last name"
                                                class="form-control"
                                                value="{{ old('last_name') }}"
                                                required>
                                        </label>
                                    </section>        
                                </div>
                            </div>                          
                            <section>
                                <label class="input">
                                    <input type="email"
                                        name="email"
                                        placeholder="Email address"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        required>
                                </label>
                            </section>                                
                            <section>
                                <label class="input">
                                    <input type="password"
                                        name="password"
                                        placeholder="Password"
                                        id="password"
                                        class="form-control"
                                        required>
                                </label>
                            </section>                                
                            <section>
                                <label class="input">
                                    <input type="password"
                                        name="password_confirmation"
                                        placeholder="Confirm password"
                                        class="form-control"
                                        required>
                                </label>
                            </section>                                
                        </div>

                        <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">
                            <i class="fa fa-btn fa-user"></i>Create Account
                        </button>
                    </form>

                    <div class="margin-bottom-20"></div>
                    <p class="text-center">Already you have an account? <a href="/login">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
@stop