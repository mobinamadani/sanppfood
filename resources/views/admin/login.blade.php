<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ادمین</title>
    <link rel="stylesheet" href="../../css/adminLogin.css">
</head>
<body>
<form class="login-form" action="{{route('admin.store')}}" method="post">
    @csrf

    <div class="m-r form-group">
        <input type="email" id="email" name="email"  placeholder="ایمیل" required>
    </div>

    <div class="form-group m-r">
        <input type="password" id="password" name="password" placeholder="رمزعبور" required>
    </div>

    <div class="m-l">
        <button type="submit" class="button:hover">ورود</button>

    </div>

</form>
</body>
</html>
