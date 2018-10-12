<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('main_admin/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
        <title>Вход | Sacave</title>
    </head>
    <body>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>

        <section class="login-content">
            <div class="logo">
                <h1>Sacave</h1>
            </div>
            <div class="login-box">
                <form class="login-form" method="POST" action="{{ route('account.adminLoginPost') }}">
                    {{ csrf_field() }}

                    <h3 class="login-head"><i class="fas fas-lg fas-fw fa-user"></i> Вход в систему</h3>
                    <div class="form-group">
                        <label class="control-label">Электронная почта:</label>
                        <input class="form-control" type="text" placeholder="Email" autofocus name="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Пароль:</label>
                        <input class="form-control" type="password" placeholder="Пароль" name="password">
                    </div>
                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" name="remember"><span class="label-text">Запомнить</span>
                                </label>
                            </div>
                            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Забыли пароль?</a></p>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        <button
                                type="submit" class="btn btn-primary btn-block"
                        ><i class="fas fa-sign-in-alt fas-lg fas-fw"></i> Войти</button>
                    </div>
                </form>

                <form class="forget-form" action="#">
                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Забыли пароль?</h3>
                    <div class="form-group">
                        <label class="control-label">EMAIL</label>
                        <input class="form-control" type="text" placeholder="Email">
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>СБРОС</button>
                    </div>
                    <div class="form-group mt-3">
                        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                    </div>
                </form>
            </div>
        </section>

        <script>$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});</script>

        <script type="text/javascript">
            // Login Page Flipbox control
            $('.login-content [data-toggle="flip"]').click(function() {
                $('.login-box').toggleClass('flipped');
                return false;
            });
        </script>
    </body>
</html>

