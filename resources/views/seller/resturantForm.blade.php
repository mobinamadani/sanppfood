<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>تکمیل فرم رستوران</title>
    <Link rel="stylesheet"  href="">
    <link href="{{asset('css/ResturantForm.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
{{--    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">--}}
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

            <form action="{{route('restaurant.store', $sellerId)}}" method="POST">
                @csrf

                <h2 for="chk" aria-hidden="true">تکمیل مشخصات رستوران</h2>
                <input type="hidden" name="seller_id" id="seller_id" value="{{$sellerId}}">
                <input type="text" name="name" id="name" placeholder="نام رستوران" required>
                <input type="number" name="phone_number" id="phone_number" placeholder="شماره تماس" required>
                <input type="number" name="account" id="account" placeholder="شماره حساب" required>
                <input type="string" name="address" id="address" placeholder="آدرس" required>
                <div>
{{--                    <input type="text" name="type" id="type" placeholder="نوع رستوران" required>--}}
                    <select class="m-l-3 p-l-2 p-b-2 border-radius"  name="category_id" id="category_id">
                        <option  value="ff" name="type" id="type" selected disabled>نوع رستوران</option>
                        @foreach($restaurantCategories as $restaurantCategory)
                            <option value="{{ $restaurantCategory->id }}">{{ $restaurantCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">ثبت</button>
            </form>

        </div>
    </div>
</main>

</body>


