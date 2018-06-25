@extends('page.index')
@section('title')

@endsection
@section('content')

    <div class="login">

        <div class="form-signin">
            <div class="text-center">
                <img src="img/logo.png" alt="Metis Logo">
            </div>
            <hr>
            @if ($errors->any())
                <div>
                    <ul class="nav errors">
                        @foreach ($errors->all() as $error)
                            <li class="nav-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <script>
                    $(document).ready(function(){

                        $('#regModal').modal({show: true});

                    })
                </script>
            @endif
            <div class="tab-content">
                <div id="login" class="tab-pane active">
                    <form action="{{ route('login') }}" method="post">
                        <p class="text-muted text-center">
                            Enter your username and password
                        </p>
                        <input type="text" placeholder="Email" name="email" class="form-control top">
                        <input type="password" placeholder="Password" name="password" class="form-control bottom">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                        <input type="hidden" name="_token" value="{{  Session::token() }}">
                        <button  class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                </div>
                <div id="forgot" class="tab-pane">
                    <form action="index.blade.php">
                        <p class="text-muted text-center">Enter your valid e-mail</p>
                        <input type="email" placeholder="mail@domain.com" class="form-control">
                        <br>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
                    </form>
                </div>
                <div id="signup" class="tab-pane">
                    <form action="{{ route('registration') }}" method="post">

                        <input type="email" placeholder="mail@domain.com" name="email" class="form-control middle">
                        <input type="text" placeholder="Full Name" name="name" class="form-control middle">
                        <input type="password" placeholder="password" name="password" class="form-control middle">
                        <input type="password" placeholder="re-password"  name="password_confirmation" class="form-control bottom">
                        <input type="hidden" name="_token" value="{{  Session::token() }}">
                        <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <ul class="list-inline">
                    <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
                    <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
                    <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
                </ul>
            </div>
        </div>


        <!--jQuery -->
        <script src="lib/jquery/jquery.js"></script>

        <!--Bootstrap -->
        <script src="lib/bootstrap/js/bootstrap.js"></script>


        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('.list-inline li > a').click(function () {
                        var activeForm = $(this).attr('href') + ' > form';
                        //console.log(activeForm);
                        $(activeForm).addClass('animated fadeIn');
                        //set timer to 1 seconds, after that, unload the animate animation
                        setTimeout(function () {
                            $(activeForm).removeClass('animated fadeIn');
                        }, 1000);
                    });
                });
            })(jQuery);
        </script>
    </div>
@endsection
