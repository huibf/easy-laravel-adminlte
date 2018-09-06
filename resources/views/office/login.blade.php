<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <style>
        html, body {
            height: 90%;
        }
        .login-page {
            background-color: #f3f3f4;
        }
        .login-logo {
            margin-bottom: 0;
        }
        .login-box {
            width: 360px;
            margin: 20% auto;
        }
        .login-box-body {
            background: #f3f3f4;
        }
        .login-alert {
            position: absolute;
            width: 360px;
            margin: 2% auto
        }
        @media (max-width: 768px) {
            .login-alert {
                position: absolute;
                width:90%;
            }
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="login-alert txt_message" style="display: none;">
        <div class="alert alert-warning alert-dismissible" style="opacity: 0.9;padding: 8px 30px 8px 15px;">
            <div class="alert-content"></div>
        </div>
    </div>

    <div class="login-logo">
        <h1><span>Admin</span> <small>Login</small></h1>
    </div>

    <div class="login-box-body">
        <form id="login_form" action="">
            <div class="form-group has-feedback">
                <input name="id" type="text" class="form-control" placeholder="ID">
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button id="btn_login" type="button" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
    </div>

</div>
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/api.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script>
    function login_alert(content) {
        $('.txt_message .alert-content').html(content);
        $('.txt_message').fadeIn();
    }

    $(function(){
        $('#btn_login').on('click', function(){
            ajax(admin.api.login, $('#login_form').serialize()).done(function(res){
                if (res.code == 0) {
                    // success

                    // redirect
                    window.location.href = admin.web.login;
                } else {
                    // fail
                    login_alert(res.message);
                }
            }).fail(function(err){
                console.log('fail, please check up!');
            });
        });
    });
</script>
</body>
</html>
