@extends('pages.layouts.master')

@section('content')
    <main>
        <!-- //!Landing Section -->
        <div class="landing">
            <div class="container-fluid p-0 landing-cover">
                <div class="container h-100">
                    <div
                            class="row h-100 justify-content-center justify-content-xl-start">
                        <div class="col-xl-6 position-relative h-100 d-none d-xl-flex">
                            <div>
                                <div class="landing-character"></div>
                                <div class="landing-circle">
                    <span style="--i: 1">
                      <img
                              src="{{URL}}assets/images/landing/SVGIcons/Github-Dark.svg"/>
                    </span>
                                    <span style="--i: 2">
                      <img src="{{URL}}assets/images/landing/SVGIcons/css3.svg"/>
                    </span>
                                    <span style="--i: 3">
                      <img src="{{URL}}assets/images/landing/SVGIcons/dart.svg"/>
                    </span>
                                    <span style="--i: 4">
                      <img src="{{URL}}assets/images/landing/SVGIcons/figma.svg"/>
                    </span>
                                    <span style="--i: 5">
                      <img
                              src="{{URL}}assets/images/landing/SVGIcons/Firebase-Dark.svg"/>
                    </span>
                                    <span style="--i: 6">
                      <img src="{{URL}}assets/images/landing/SVGIcons/flutter.svg"/>
                    </span>
                                    <span style="--i: 7">
                      <img src="{{URL}}assets/images/landing/SVGIcons/html-5.svg"/>
                    </span>
                                    <span style="--i: 8">
                      <img
                              src="{{URL}}assets/images/landing/SVGIcons/javascript.svg"/>
                    </span>
                                    <span style="--i: 9">
                      <img
                              src="{{URL}}assets/images/landing/SVGIcons/MySQL-Dark.svg"/>
                    </span>
                                    <span style="--i: 10">
                      <img src="{{URL}}assets/images/landing/SVGIcons/nodejs.svg"/>
                    </span>
                                    <span style="--i: 11">
                      <img
                              src="{{URL}}assets/images/landing/SVGIcons/PostgreSQL-Dark.svg"/>
                    </span>
                                    <span style="--i: 12">
                      <img src="{{URL}}assets/images/landing/SVGIcons/python.svg"/>
                    </span>
                                </div>
                                <div class="landing-bg"></div>
                            </div>
                        </div>
                        <div
                                class="col-xl-6 col-12 col-md-9 h-100 text-white flex-center flex-column gap-4">
                            <h1 class="landing-title fw-bold mb-5">بهترین یا هرگز!</h1>
                            <h3 class="fs-2">
                                اجازه دهید صفر و یک ها را ما برایتان ساده کنیم!
                            </h3>
                            <a
                                    class="w-50 flex-center gap-2 bg-primary rounded-4 py-4 text-white">
                                <span>شروع یادگیری برنامه نویسی </span>
                                <i class="fas fa-arrow-left"></i>
                            </a>

                            <div class="mt-9 landing-list">
                                <div class="row">
                                    <div
                                            class="col-6 text-white d-flex gap-2 align-items-center">
                                        <div
                                                class="landing-icon bg-primary rounded-circle flex-center">
                                            <i class="fas fa-headphones"></i>
                                        </div>
                                        <span class="fw-bold">پشتیبانی 24 ساعته</span>
                                    </div>
                                    <div
                                            class="col-6 text-white d-flex gap-2 align-items-center">
                                        <div
                                                class="landing-icon bg-primary rounded-circle flex-center">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                        <span class="fw-bold">پشتیبانی دوره های رایگان</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div
                                            class="col-6 text-white d-flex gap-2 align-items-center">
                                        <div
                                                class="landing-icon bg-primary rounded-circle flex-center">
                                            <i class="fas fa-bank"></i>
                                        </div>
                                        <span class="fw-bold">ضمانت بازگشت وجه</span>
                                    </div>
                                    <div
                                            class="col-6 text-white d-flex gap-2 align-items-center">
                                        <div
                                                class="landing-icon bg-primary rounded-circle flex-center">
                                            <i class="fas fa-file"></i>
                                        </div>
                                        <span class="fw-bold">یادگیری با تمرین و آزمون</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- //!Course Section -->
            <div class="course my-8">
                <div>
                    <div class="row">
                        <div class="col-12 flex-between">
                            <div class="flex-start gap-2">
                                <div
                                        class="course-wrapper bg-primary text-white flex-center rounded-2">
                                    <i class="fas fs-2 fa-graduation-cap"></i>
                                </div>
                                <div>
                                    <h3 class="fw-bold fs-3">جدیدترین دوره ها</h3>
                                    <span class="fs-4 text-subtitle"
                                    >برای پیشرفت شما هر روز در تلاشیم</span
                                    >
                                </div>
                            </div>
                            <div>
                                <a
                                        class="course-links fs-5 rounded-3 py-2 px-3 bg-primary text-white flex-between">
                                    <span>مشاهده دوره ها</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row justify-content-center">
                                @foreach($courses as $course)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card mt-5 rounded-5 overflow-hidden">
                                            <div class="w-100">
                                                <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}" class="w-100">
                                                    <img
                                                            class="w-100"
                                                            src="{{$course->poster}}"/>
                                                </a>
                                            </div>
                                            <div class="w-100 py-4 px-5" >
                                                <h2 class="mb-3 ellipsis-1">
                                                    <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}"  class="fw-bold fs-4">
                                                        {{$course->title}}
                                                    </a>
                                                </h2>
                                                <div class="flex-between">
                                                    <div class="text-subtitle fs-4">
                                                        <i class="fas fa-chalkboard-user"></i>
                                                        <a href="/teacher/show/{{$course->teacher_id}}/{{generateSlug($course->family)}}">{{$course->family}}</a>
                                                    </div>
                                                    <div>
                                                        <img src="{{URL}}assets/images/star/star.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    </div>
                                                </div>

                                                <div class="mt-4 text-subtitle flex-start gap-2">
                                                    <i class="fas fa-user fs-4"></i>
                                                    <span class="fs-5">{{$course->students}}</span>
                                                </div>

                                                <div class="fs-4 mt-4 text-subtitle fw-bold">
                                                    <span>تخفیف :</span>
                                                    <span
                                                    >{{$course->discount}}
                            <span class="text-primary">درصد</span>
                          </span>
                                                </div>

                                                <div class="fs-4 mt-2 text-subtitle fw-bold">
                                                    <span>هزینه دوره :</span>
                                                    <span
                                                    >

                                                {{number_format($course->price*(1-$course->discount/100))}}
                            <span class="text-primary">تومان</span>
                          </span>
                                                </div>
                                            </div>
                                            <div
                                                    class="w-100  border-top border-1 border-gray">
                                                <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}"  class="w-100 px-4 py-3 flex-center gap-3 fs-4">
                                                    <span>مشاهده اطلاعات</span>
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //!Favorite course -->
            <div class="favorite mt-9">
                <div class="row">
                    <div class="col-12 flex-between">
                        <div class="flex-start gap-2">
                            <div
                                    class="course-wrapper bg-primary text-white flex-center rounded-2">
                                <i class="fa-solid fa-code fs-2"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold fs-3">محبوب ترین دوره ها</h3>
                                <span class="fs-4 text-subtitle"
                                >دوره هایی که بیشترین بازدید را داشته اند</span
                                >
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden py-2">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper row flex-nowrap">
                                @foreach($populars as $popular)
                                    <div class="swiper-slide col-lg-4 col-md-6 col-12">
                                        <div class="card mt-5 rounded-5 overflow-hidden">
                                            <div class="w-100">
                                                <a href="/course/show/{{$popular->id}}/{{generateSlug($popular->title)}}"  class="w-100">
                                                    <img
                                                            class="w-100"
                                                            src="{{$popular->poster}}"/>
                                                </a>
                                            </div>
                                            <div class="w-100 py-4 px-5">
                                                <h2 class="mb-3 ellipsis-1">
                                                    <a href="/course/show/{{$popular->id}}/{{generateSlug($popular->title)}}" class="fw-bold fs-4">
                                                        {{$popular->title}}
                                                    </a>
                                                </h2>
                                                <div class="flex-between">
                                                    <div class="text-subtitle fs-4">
                                                        <i class="fas fa-chalkboard-user"></i>
                                                        <a href="#">{{$popular->family}} </a>
                                                    </div>
                                                    <div>
                                                        <img src="{{URL}}assets/images/star/star.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                        <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    </div>
                                                </div>

                                                <div class="mt-4 text-subtitle flex-start gap-2">
                                                    <i class="fas fa-user fs-4"></i>
                                                    <span class="fs-5">{{$popular->students}}</span>
                                                </div>

                                                <div class="fs-4 mt-4 text-subtitle fw-bold">
                                                    <span>تخفیف :</span>
                                                    <span
                                                    >{{$popular->discount}}
                            <span class="text-primary">درصد</span>
                          </span>
                                                </div>

                                                <div class="fs-4 mt-2 text-subtitle fw-bold">
                                                    <span>هزینه دوره :</span>
                                                    <span
                                                    >
                                                    {{number_format($popular->price*(1-$popular->discount/100))}}
                            <span class="text-primary">تومان</span>
                          </span>
                                                </div>
                                            </div>
                                            <div
                                                    class="w-100 px-4 py-3 border-top border-1 border-gray">
                                                <a href="/course/show/{{$popular->id}}/{{generateSlug($popular->title)}}" class="w-100 flex-center gap-3 fs-4">
                                                    <span>مشاهده اطلاعات</span>
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--! //!product Section -->
            <div class="course my-8">
                <div>
                    <div class="row">
                        <div class="col-12 flex-between">
                            <div class="flex-start gap-2">
                                <div
                                        class="course-wrapper bg-primary text-white flex-center rounded-2">
                                    <i class="fas fs-2 fa-gamepad"></i>
                                </div>
                                <div>
                                    <h3 class="fw-bold fs-3">جدیدترین محصولات</h3>
                                    <span class="fs-4 text-subtitle"
                                    >محصولات برند رو از ما بخر</span
                                    >
                                </div>
                            </div>
                            <div>
                                <a
                                        class="course-links fs-5 rounded-3 py-2 px-3 bg-primary text-white flex-between">
                                    <span>تمام محصولات</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row justify-content-center">
                                @foreach($products as $product)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card mt-5 rounded-5 overflow-hidden">
                                        <div class="w-100">
                                            <a href="/product/show/{{$product->id}}/{{generateSlug($product->title)}}" class="card-product flex-center">
                                                <img
                                                        class="card-product-img"
                                                        src="{{$product->image}}"/>
                                            </a>
                                        </div>
                                        <div class="w-100 py-4 px-5">
                                            <h2 class="mb-3 ellipsis-1">
                                                <a href="#" class="fw-bold fs-4">
                                                    {{$product->title}}
                                                </a>
                                            </h2>
                                            <div class="flex-between">
                                                <div
                                                        class="text-subtitle fs-4 d-flex align-items-center gap-1">
                                                    <span>امتیاز محصول</span>
                                                    <span class="text-primary fw-bold">{{$product->rate}}</span>
                                                </div>
                                                <div class="d-flex gap-1 align-items-center">
                                                    <img src="{{URL}}assets/images/star/star.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                </div>
                                            </div>

                                            <div class="fs-4 mt-4 text-subtitle fw-bold">
                                                <span>تخفیف :</span>
                                                <span
                                                >{{$product->discount}}
                            <span class="text-primary">درصد</span>
                          </span>
                                            </div>

                                            <div class="fs-4 mt-2 text-subtitle fw-bold">
                                                <span>قیمت محصول :</span>
                                                <span
                                                >
                                                    {{number_format($product->price*(1-$product->discount/100))}}
                            <span class="text-primary">تومان</span>
                          </span>
                                            </div>
                                        </div>
                                        <div
                                                class="w-100 px-4 py-3 border-top border-1 border-gray">
                                            <a href="#" class="w-100 flex-center gap-3 fs-4">
                                                <span>مشاهده جزئیات محصول</span>
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //!Online Course -->
            <div class="mt-9">
                <div class="row">
                    <div class="col-12 flex-between">
                        <div class="flex-start gap-2">
                            <div
                                    class="course-wrapper bg-primary text-white flex-center rounded-2">
                                <i class="fa-solid fa-code fs-2"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold fs-3">پربازدید ترین محصولات</h3>
                                <span class="fs-4 text-subtitle">محصولات محبوب کاربران</span>
                            </div>
                        </div>
                        <div>
                            <a
                                    class="course-links fs-5 rounded-3 py-2 px-3 bg-primary text-white flex-between">
                                <span>مشاهده بیشتر</span>
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-hidden py-2">
                        <div class="Swiper mySwiper">
                            <div class="swiper-wrapper row flex-nowrap">
                                @foreach($popular_products as $row)
                                <div class="swiper-slide col-lg-4 col-md-6 col-12">
                                    <div class="card mt-5 rounded-5 overflow-hidden">
                                        <div class="w-100">
                                            <a href="#" class="card-product flex-center">
                                                <img
                                                        class="card-product-img"
                                                        src="{{$row->image}}"/>
                                            </a>
                                        </div>
                                        <div class="w-100 py-4 px-5">
                                            <h2 class="mb-3 ellipsis-1">
                                                <a href="#" class="fw-bold fs-4">
                                                    {{$row->title}}
                                                </a>
                                            </h2>
                                            <div class="flex-between">
                                                <div
                                                        class="text-subtitle fs-4 d-flex align-items-center gap-1">
                                                    <span>امتیاز محصول</span>
                                                    <span class="text-primary fw-bold">{{$row->rate}}</span>
                                                </div>
                                                <div class="d-flex gap-1 align-items-center">
                                                    <img src="{{URL}}assets/images/star/star.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                                </div>
                                            </div>

                                            <div class="fs-4 mt-4 text-subtitle fw-bold">
                                                <span>تخفیف :</span>
                                                <span
                                                >{{$row->discount}}
                            <span class="text-primary">درصد</span>
                          </span>
                                            </div>

                                            <div class="fs-4 mt-2 text-subtitle fw-bold">
                                                <span>قیمت محصول :</span>
                                                <span
                                                >
                                                    {{number_format($row->price*(1-$row->discount/100))}}
                            <span class="text-primary">تومان</span>
                          </span>
                                            </div>
                                        </div>
                                        <div
                                                class="w-100 px-4 py-3 border-top border-1 border-gray">
                                            <a href="#" class="w-100 flex-center gap-3 fs-4">
                                                <span>مشاهده جزئیات محصول</span>
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //!Blog -->
            <div class="mt-9">
                <div class="row">
                    <div class="col-12 flex-between">
                        <div class="flex-start gap-2">
                            <div
                                    class="course-wrapper bg-primary text-white flex-center rounded-2">
                                <i class="fa-solid fa-code fs-2"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold fs-3">جدترین مقاله ها</h3>
                                <span class="fs-4 text-subtitle"
                                >اطلاعات خود را افزایش دهید</span
                                >
                            </div>
                        </div>
                        <div>
                            <a
                                    class="course-links fs-5 rounded-3 py-2 px-3 bg-primary text-white flex-between">
                                <span>همه مقالات</span>
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach($blogs as $blog)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card mt-5 rounded-5 overflow-hidden">
                                    <div class="w-100 p-4">
                                        <a href="/blog/show/{{$blog->id}}/{{generateSlug($blog->title)}}" class="w-100 d-flex">
                                            <img
                                                    class="w-100 rounded-3"
                                                    src="{{$blog->image}}"/>
                                        </a>
                                        <h2 class="fs-4 my-4">
                                            {{$blog->title}}
                                        </h2>
                                        <p class="fs-5 text-subtitle ellipsis-2 mb-4">
                                            {{$blog->description}}
                                        </p>
                                        <a href="/blog/show/{{$blog->id}}/{{generateSlug($blog->title)}}"
                                                class="py-2 rounded-1 px-4 flex-center border border-1 border-primary text-primary fs-5 fw-bold"
                                        >بیشتر بخوانید</a
                                        >
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script src="{{URL}}assets/js/swiper.js"></script>
@endpush