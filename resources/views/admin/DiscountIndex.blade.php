<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AdminDiscountIndex</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>

            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item dropdown d-flex">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-air-play mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-flex mr-4 ">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                        <a class="dropdown-item preview-item">
                            <i class="icon-head"></i> Profile
                        </a>
                        <a class="dropdown-item preview-item">
                            <i class="icon-inbox"></i> Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                    <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
                        <i class="icon-grid"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="user-profile">
                <div class="user-image">
                    <img src="../../images/faces/face28.png">
                </div>
                <div class="user-name">
                    Edward Spencer
                </div>
                <div class="user-designation">
                    Developer
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="icon-box menu-icon"></i>
                        <span class="menu-title">داشبورد</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-disc menu-icon"></i>
                        <span class="menu-title">افزودن دسته بندی</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="route('restaurantCategories.create')}}">رستوران</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('foodCategory.create')}}">غذا</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('AdminDiscount.create')}}">
                        <i class="icon-file menu-icon"></i>
                        <span class="menu-title">تخفیف ها</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/charts/chartjs.html">
                        <i class="icon-pie-graph menu-icon"></i>
                        <span class="menu-title">گزارشات</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">کاربران</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login-2.html"> Login 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register-2.html"> Register 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/lock-screen.html"> Lockscreen </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../docs/documentation.html">
                        <i class="icon-book menu-icon"></i>
                        <span class="menu-title">ویرایش حساب کاربری</span>
                    </a>
                </li>

                <li  class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">
                        <i class="icon-book menu-icon"></i>
                        <span class="menu-title">خروج</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">لیست تخفیف ها</h4>
                                <p class="card-description">

                                </p>
                                <table class="table table-striped">
                                    <tr>
                                        <th>نام</th>
                                        <th>قیمت</th>
                                        <th>تاریخ</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>اکشن</th>
                                    </tr>
                                    @foreach($discounts as $key => $discount)
                                        <tr>
                                            <td>{{$discount->name}}</td>
                                            <td>{{$discount->price}}</td>
                                            <td>{{$discount->date}}</td>
                                            <td>{{$discount->created_at}}</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <form action="{{ route('AdminDiscount.delete', $discount->id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" value="{{ $discount->id }}" name="id">
                                                            <input type="submit" value="حذف" >
                                                        </form>
                                                    </li>
                                                    <li><a href="{{ route('AdminDiscount.edit' , $discount->id) }}">ویرایش</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                </form>
                            </div>
                        </div>
                    </div>



                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- base:js -->
        <script src="../../vendors/base/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/hoverable-collapse.js"></script>
        <script src="../../js/template.js"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="../../vendors/select2/select2.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <script src="../../js/file-upload.js"></script>
        <script src="../../js/typeahead.js"></script>
        <script src="../../js/select2.js"></script>
        <!-- End custom js for this page-->
</body>

</html>


