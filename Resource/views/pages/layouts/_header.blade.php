@php
use App\Models\Options;
$options=Options::getOptions();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$pageTitle??'آکادمی توسعه دهندگان ذهن | آموزش برنامه نویسی'}}</title>

    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="{{URL}}assets/css/style.css" />
</head>
<body>
<header class="header container-fluid p-0">
    <!--! Header-Top -->
    <div class="header-top px-5 py-4 bg-secondary flex-between">
        <ul class="flex-start gap-4">
            <li class="fs-5">
                <a href="#">پنل اختصاصی دوره های آنلاین</a>
            </li>
            <li class="fs-5">
                <a href="#"> قوانین سایت </a>
            </li>
            <li class="fs-5">
                <a href="#">درباره ما </a>
            </li>
            <li class="fs-5">
                <a href="#"> همکاری با ما </a>
            </li>
            <li class="fs-5">
                <a href="#">سوالات متداول</a>
            </li>
            <li class="fs-5">
                <a href="#">فروشگاه</a>
            </li>
        </ul>
        <div class="flex-center gap-4 header-socialmedia">

            <a class="gap-2">
                <span class="fs-4 ms-1">{{$options['instagram']}}</span>
                <i class="fa-brands fa-instagram text-primary fs-3"></i>
            </a>
            <a class="gap-2">
                <span class="fs-4 ms-1"> {{$options['email']}}</span>
                <i class="fas fa-envelope text-primary fs-3"></i>
            </a>
        </div>
    </div>

    <!--! Header-Bottom -->
    <div
            class="header-bottom bg-white flex-between py-4 px-3  container2xl">
        <!--! Header-Bottom-Right -->
        <div class="flex-start gap-3 header-bottom-items">
            <div class="HamburgerMenu">
                <i class="header-hamburger fas fa-bars d-none fs-1"></i>
            </div>
            <nav class="nav header-navbar">
                <ul class="flex-start gap-4">
                    <li data-time="1">
                        <a href="/">صفحه اصلی</a>
                    </li>
                    <li class="nav-link" data-time="2">
                        <a href="course.html">دوره ها</a>
{{--                        <ul class="nav-submenu Submenu2 p-shadow">--}}
{{--                            <div class="nav-submenu-right h-100 w-100">--}}
{{--                                <ul class="h-100 nav-submenu-list bg-secondary w-25">--}}
{{--                                    <li--}}
{{--                                            class="nav-submenu-item flex-between py-4 px-3 c-pointer"--}}
{{--                                            data-time="3">--}}
{{--                                        <div class="nav-submenu2-item">--}}
{{--                                            <img--}}
{{--                                                    width="25"--}}
{{--                                                    height="25"--}}
{{--                                                    src="https://img.icons8.com/fluency/48/javascript.png"--}}
{{--                                                    alt="javascript" />--}}
{{--                                            <a class="text-subtitle fs-4"--}}
{{--                                            >برنامه نویسی فرانت اند</a--}}
{{--                                            >--}}
{{--                                        </div>--}}
{{--                                        <i class="fas fa-chevron-left text-subtitle fs-5"></i>--}}
{{--                                        <ul--}}
{{--                                                class="nav-submenu-sub Submenu3 p-6 flex-between overflow-hidden h-100">--}}
{{--                                            <div class="w-25">--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/officel/50/react.png"--}}
{{--                                                                alt="react" />--}}
{{--                                                        <span>آموزش ریکت</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/external-tal-revivo-shadow-tal-revivo/24/external-vuejs-an-open-source-javascript-framework-for-building-user-interfaces-and-single-page-applications-logo-shadow-tal-revivo.png"--}}
{{--                                                                alt="external-vuejs-an-open-source-javascript-framework-for-building-user-interfaces-and-single-page-applications-logo-shadow-tal-revivo" />--}}
{{--                                                        <span>آموزش ویو جی اس</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/external-tal-revivo-color-tal-revivo/24/external-jquery-is-a-javascript-library-designed-to-simplify-html-logo-color-tal-revivo.png"--}}
{{--                                                                alt="external-jquery-is-a-javascript-library-designed-to-simplify-html-logo-color-tal-revivo" />--}}
{{--                                                        <span>آموزش جی کوئری</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/fluency/48/bootstrap.png"--}}
{{--                                                                alt="bootstrap" />--}}
{{--                                                        <span>آموزش بوت استراپ</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                            <div class="w-25">--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/color/48/html-5--v1.png"--}}
{{--                                                                alt="html-5--v1" />--}}
{{--                                                        <span>آموزش html</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/plasticine/50/css3.png"--}}
{{--                                                                alt="css3" />--}}
{{--                                                        <span>آموزش css</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/color/48/html-5--v1.png"--}}
{{--                                                                alt="html-5--v1" />--}}
{{--                                                        <span>آموزش html</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/plasticine/50/css3.png"--}}
{{--                                                                alt="css3" />--}}
{{--                                                        <span>آموزش css</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                            <div class="w-25">--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/color/48/tailwind_css.png"--}}
{{--                                                                alt="tailwind_css" />--}}
{{--                                                        <span>آموزش tailwind</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/color/48/sass.png"--}}
{{--                                                                alt="sass" />--}}
{{--                                                        <span>آموزش sass</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/color/48/html-5--v1.png"--}}
{{--                                                                alt="html-5--v1" />--}}
{{--                                                        <span>آموزش html</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <img--}}
{{--                                                                width="25"--}}
{{--                                                                height="25"--}}
{{--                                                                src="https://img.icons8.com/plasticine/50/css3.png"--}}
{{--                                                                alt="css3" />--}}
{{--                                                        <span>آموزش css</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                            class="nav-submenu-item flex-between py-4 px-3 c-pointer"--}}
{{--                                            data-time="4">--}}
{{--                                        <div>--}}
{{--                                            <img--}}
{{--                                                    width="25"--}}
{{--                                                    height="25"--}}
{{--                                                    src="https://img.icons8.com/fluency/48/python.png"--}}
{{--                                                    alt="python" />--}}
{{--                                            <span class="text-subtitle fs-4"--}}
{{--                                            >برنامه نویسی بک اند</span--}}
{{--                                            >--}}
{{--                                        </div>--}}
{{--                                        <i class="fas fa-chevron-left text-subtitle fs-5"></i>--}}
{{--                                        <ul--}}
{{--                                                class="nav-submenu-sub Submenu3 p-6 flex-between overflow-hidden h-100">--}}
{{--                                            <div class="w-25">--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <i class="fa-brands fa-react"></i>--}}
{{--                                                        <span>آموزش ریکت</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <i class="fa-brands fa-react"></i>--}}
{{--                                                        <span>آموزش ریکت</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                            class="nav-submenu-item flex-between py-4 px-3 c-pointer"--}}
{{--                                            data-time="5">--}}
{{--                                        <div>--}}
{{--                                            <img--}}
{{--                                                    width="25"--}}
{{--                                                    height="25"--}}
{{--                                                    src="https://img.icons8.com/external-flat-juicy-fish/60/external-hack-cyber-crime-flat-flat-juicy-fish-3.png"--}}
{{--                                                    alt="external-hack-cyber-crime-flat-flat-juicy-fish-3" />--}}
{{--                                            <span class="text-subtitle fs-4">هک و امنیت</span>--}}
{{--                                        </div>--}}
{{--                                        <i class="fas fa-chevron-left text-subtitle fs-5"></i>--}}
{{--                                        <ul--}}
{{--                                                class="nav-submenu-sub Submenu3 p-6 flex-between overflow-hidden h-100">--}}
{{--                                            <div class="w-25">--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <i class="fa-brands fa-react"></i>--}}
{{--                                                        <span>آموزش network+</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <i class="fa-brands fa-react"></i>--}}
{{--                                                        <span>آموزش LISP</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                            class="nav-submenu-item flex-between py-4 px-3 c-pointer"--}}
{{--                                            data-time="6">--}}
{{--                                        <div>--}}
{{--                                            <img--}}
{{--                                                    width="25"--}}
{{--                                                    height="25"--}}
{{--                                                    src="https://img.icons8.com/fluency/48/flutter.png"--}}
{{--                                                    alt="flutter" />--}}
{{--                                            <span class="text-subtitle fs-4"--}}
{{--                                            >برنامه نویسی موبایل</span--}}
{{--                                            >--}}
{{--                                        </div>--}}
{{--                                        <i class="fas fa-chevron-left text-subtitle fs-5"></i>--}}
{{--                                        <ul--}}
{{--                                                class="nav-submenu-sub Submenu3 p-6 flex-between overflow-hidden h-100">--}}
{{--                                            <div class="w-25">--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <i class="fa-brands fa-react"></i>--}}
{{--                                                        <span>آموزش جاوا</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <i class="fa-brands fa-react"></i>--}}
{{--                                                        <span>آموزش فلاتر</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </ul>--}}
                    </li>

                    <li data-time="7">
                        <a href="shop.html">محصولات</a>
{{--                        <ul class="nav-submenu Submenu2 p-shadow">--}}
{{--                            <div class="nav-submenu-right h-100 w-100">--}}
{{--                                <ul class="h-100 nav-submenu-list bg-secondary w-25">--}}
{{--                                    <li--}}
{{--                                            class="nav-submenu-item flex-between py-4 px-3 c-pointer"--}}
{{--                                            data-time="8">--}}
{{--                                        <div class="nav-submenu2-item">--}}
{{--                                            <img--}}
{{--                                                    width="25"--}}
{{--                                                    height="25"--}}
{{--                                                    src="https://img.icons8.com/color/48/smartphone.png"--}}
{{--                                                    alt="smartphone" />--}}
{{--                                            <a class="text-subtitle fs-4">موبایل</a>--}}
{{--                                        </div>--}}
{{--                                        <i class="fas fa-chevron-left text-subtitle fs-5"></i>--}}
{{--                                        <ul--}}
{{--                                                class="nav-submenu-sub Submenu3 p-6 flex-between overflow-hidden h-100">--}}
{{--                                            <div class="w-25">--}}
{{--                                                <a class="mb-5 flex-start text-info">گوشی موبایل</a>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <span>آیفون</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                                <li--}}
{{--                                                        class="nav-item-hover flex-between text-subtitle mb-6">--}}
{{--                                                    <div class="flex-start gap-2">--}}
{{--                                                        <span>سامسونگ</span>--}}
{{--                                                    </div>--}}
{{--                                                    <i class="fas fa-chevron-left fs-5"></i>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </ul>--}}
                    </li>
                    <li data-time="9">
                        <a href="blog.html">مقالات</a>
                    </li>
                    <li data-time="10">
                        <a>نقشه راه برنامه نویسی</a>
                    </li>
                    <li data-time="11">
                        <a>قالب های آماده</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!--! Header-Bottom-Left -->
        <div class="header-shop-icon flex-center gap-3">
            <a href="{{URL}}cart"
                    class="rounded-3 fs-5 bg-secondary py-3 px-3 flex-center position-relative">
                <div>
                    <i class="fas fa-cart-shopping fs-4"></i>
                </div>
                <span
                        class="header-shoping position-absolute fs-6 rounded-circle bg-primary text-white flex-center"
                >
                    {{cart()->getTotalCount()}}
                </span
                >
            </a>


            <div
                    class="border border-1 border-primary rounded-3 fs-5 fw-bold py-3 px-4 flex-center">
                @if(!getSession('name'))
                <a href="{{URL}}login" class="text-primary" >
                    ورود / ثبت نام
                </a>
                @else
                    <a href="{{URL}}dashboard" class="text-primary">
                         {{getSession('name')}}
                    </a>
                @endif
            </div>
        </div>
    </div>
</header>