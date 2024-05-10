<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content=" width=device=width, initial=scale=1.0">
    <title>ResturantForm</title>
    <Link rel="stylesheet"  href="">
    <link href="{{asset('css/ResturantForm.css')}}" rel="stylesheet">
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


    <div class="main navbar"
    >
        <div class="signin">
            <form>
                @csrf
                <label for="chk" aria-hidden="true">تکمیل مشخصات رستوران</label>
                <input type="text" name="name" id="name" placeholder="نام رستوران" required>
                <input type="text" name="type" id="type" placeholder="نوع رستوران">
                <select name="name" id="name" class="m-l-2 p-t-1 p-b-1 p-l-1 color-gray btn">
{{--                    <option value="" disabled selected>نوع رستوران</option>--}}
                    <option value="">سنتی</option>
                    <option value="">کبابی</option>
                    <option value="">آش و حلیم</option>
                    <option value="">طباخی</option>
                </select>
                <input type="password" name="phone_number" id="phone_number" placeholder="شماره تماس" required>
                <input type="number" name="account" id="account" placeholder="شماره حساب" required>
                <input type="string" name="address" id="address" placeholder="آدرس" required>


            </form>
        </div>


        <div class="login">
            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <button>ثبت</button>
            </form>
        </div>



    </div>
</main>





</body>


