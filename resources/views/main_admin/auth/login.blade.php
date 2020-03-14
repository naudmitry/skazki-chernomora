<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('vali-admin/css/app.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vali-admin/logo.png') }}" />
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

                    <h4 class="login-head{{ session('error') ? ' mb-1' : '' }}">
                        <i class="fas fas-lg fas-fw fa-user"></i> Вход в систему
                    </h4>

                    <div class="form-group">
                        <label class="control-label">Электронная почта:</label>
                        <input class="form-control" type="text" placeholder="Email" autofocus name="email">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Пароль:</label>
                        <input class="form-control" type="password" placeholder="Пароль" name="password">
                    </div>

                    @if (session('error'))
                        <div class="bs-component">
                            <div class="alert alert-dismissible alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <div class="form-group btn-container pt-3">
                        <button
                                type="submit" class="btn btn-primary btn-block"
                        ><i class="fas fa-sign-in-alt fas-lg fas-fw"></i> Войти</button>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>

