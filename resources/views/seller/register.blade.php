<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content=" width=device=width, initial=scale=1.0">
    <title>ثبت نام فروشندگان</title>
    <Link rel="stylesheet"  href="">
    <link href="{{asset('css/SellerRegisterStyle.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
    <head>
<body>
 <main>

    <header class="m-r-1 m-b-1">
        <section>
            <ul class="navbar">
                <li class="text-center m-1 p-1 text-black" >تماس با ما</li>
                <li class="text-center m-1 p-1 text-black">سوالات متداول</li>
                <li class=" text-center m-1 p-1 text-black">مراحل ثبت نام</li>
                <li class=" text-center m-1 p-1 text-black">شرایط و مدارک مورد نیاز</li>
                <li class=" text-center m-1 p-1 text-black">آکادمی همکاران</li>
            </ul>
        </section>
     </header>


     <div class="main navbar">
        <div class="signin">
            <form action="{{route('register.store')}}"  method="POST">
                @csrf
                <label for="chk" aria-hidden="true">فرم ثبت نام فروشندگان</label>
                <input type="text" name="name" id="name" placeholder="نام" required>
                <input type="email" name="email" id="email" placeholder="ایمیل"  required>
                <input type="text" name="phone_number" id="phone_number" placeholder="شماره همراه"  required>
                <input type="password" name="password" id="password" placeholder="رمزعبور"  required>
                <button>ثبت نام</button>
            </form>
            </form>
        </div>


{{--        <div class="login">--}}
{{--            <form action="{{route('register.store')}}" method="POST">--}}
{{--                @csrf--}}
{{--              <button>ثبت نام</button>--}}
{{--            </form>--}}
{{--        </div>--}}


    </div>
 </main>
</body>
