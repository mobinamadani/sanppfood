<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content=" width=device=width, initial=scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <head>
<body>
<main>
    <form action="{{route('admin.login')}}" method="post">
        @csrf

        <div>
            <input type="email" name="email" id="email" placeholder="ایمیل">
        </div>

        <div>
            <input type="password" name="passsword" id="password" placeholder="رمز عبور">
        </div>

        <div>
            <a href="admin/dashboard">
                <input type="submit" value="ورود">
            </a>

        </div>

    </form>


</main>
</body>
