<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content=" width=device=width, initial=scale=1.0">
    <title>تکمیل فرم رستوران</title>
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
            <form action="{{route('restaurant.store', $seller_id)}}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">تکمیل مشخصات رستوران</label>
                <input type="hidden" name="seller_id" id="seller_id" value="{{$seller_id}}">
                <input type="text" name="name" id="name" placeholder="نام رستوران" required>
{{--                <input type="text" name="type" id="type" placeholder="نوع رستوران">--}}
{{--                <select name="name" id="name" class="m-l-2 p-t-1 p-b-1 p-l-1 color-gray btn">--}}
{{--                    <option value="">سنتی</option>--}}
{{--                    <option value="">کبابی</option>--}}
{{--                    <option value="">آش و حلیم</option>--}}
{{--                    <option value="">طباخی</option>--}}
{{--                </select>--}}
                <input type="number" name="phone_number" id="phone_number" placeholder="شماره تماس" required>
                <input type="number" name="account" id="account" placeholder="شماره حساب" required>
                <input type="string" name="address" id="address" placeholder="آدرس" required>
                <div>
                    <label for="restaurant_category_id">نوع رستوران</label>
{{--                    <select name="restaurant_category_id" id="restaurant_category_id">--}}
{{--                        <option value="ff" selected disabled>Select a category</option>--}}
{{--                        @foreach($restaurantCategories as $restaurantCategory)--}}
{{--                            <option value="{{ $restaurantCategory->id }}">{{ $restaurantCategory->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

                </div>

                <button>ثبت</button>
            </form>
        </div>


{{--        <div class="login">--}}
{{--            <form action="{{route('register.store')}}" method="POST">--}}
{{--                @csrf--}}
{{--                <button>ثبت</button>--}}
{{--            </form>--}}
{{--        </div>--}}



    </div>
</main>





</body>


