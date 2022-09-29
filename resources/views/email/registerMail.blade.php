<!DOCTYPE html>
<html>
<head>
    <title>Readerstacks.com</title>
</head>
<body>
<h1>Hello {{ $user['name'] }}</h1>

<p>Bạn vừa đăng ký tài khoản tại TopJob, để xác thực tài khoản, vui lòng ấn vào link bên dưới:</p>
<a href=`http://127.0.0.1:8000/register-verify/{{$user['verify_code']}}`>
    http://127.0.0.1:8000/register-verify/{{$user['verify_code']}}
</a>
</body>
</html>
