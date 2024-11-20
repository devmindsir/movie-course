@extends('pages.layouts.master',[
    'pageTitle'=>$product->title
])

@section('content')
    <main>
        <div class="mt-8 container2xl">
            <div class="row">
                <div
                        class="col-12 product-breadcrumb text-subtitle fs-4 flex-start gap-2">
                    <a class="product-item">آکادمی توسعه دهندگان</a>
                    <span>/</span>
                    <a class="product-item">موبایل</a>
                    <span>/</span>

                    <a>گوشی موبایل</a>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-4">
            <span
                    class="py-3 flex-start px-4 rounded-2 bg-danger-light text-danger fw-bold"
            >فروش ویژه</span
            >
                </div>
                <div class="col-8 flex-start">
                    <h1 class="fs-2 fw-bold">
                        {{$product->title}}
                    </h1>
                </div>
            </div>
            <div class="row mt-6">
                <!-- //!RIGHT ( IMAGE) -->
                <div class="col-4">
                    <div class="w-100 p-4 flex-center">
                        <img
                                id="Zoom_01"
                                class="mw-100 object-fit-cover"
                                data-zoom-image="{{URL.$product->image}}"
                                src="{{URL.$product->image}}"/>
                    </div>
                    <div class="flex-center gap-2">
                        @foreach($gallery as $row)
                            @if($loop->index < 5)
                        <div
                                class="product-image-item border border-1 border-gray rounded-2 flex-center p-2">
                            <a href="#">
                                <img
                                        src="{{URL.$row->image_src}}"
                                        class="w-100 h-100 object-fit-cover"/>
                            </a>
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-8">
                    <div class="row">
                        <div class="col-8">
                            <!-- //! RATE -->

                            <div class="flex-start text-subtitle gap-4 fs-5 fw-bold">
                                <div>
                                    <i class="fas fa-star fs-5 text-yellow"></i>
                                    <span>{{$product->rate}}</span>
                                </div>
                                <span class="circle"></span>
                                <div class="text-primary">
                                    <span>۱۳۷۹</span>
                                    دیدگاه
                                </div>
                                <span class="circle"></span>
                                <div class="text-primary">
                                    <span>۸۷۸</span>
                                    پرسش
                                </div>
                            </div>
                            <!-- //!COLOR -->
                            <div class="row mt-6">
                                <div class="fw-bold fs-4">
                                    رنگ :
                                    <span class="fs-4 text-primary" id="color-title">{{$product->all_color[0]->title}}</span>
                                </div>
                                <div class="d-flex gap-1 mt-3">
                                    @foreach($product->all_color as $index=>$color)
                                        <span
                                                class="product-item-color border border-1 border-gray rounded-circle flex-center {{$index===0 ? 'active' : ''}}"
                                                data-colortitle="{{$color->title}}"
                                                onclick="ColorTag(this)">
                      <span style="background-color: {{$color->hex_code}}"></span>
                    </span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- //!ATTR -->
                            <div class="row mt-6">
                                <div class="fw-bold fs-4">ویژگی ها</div>
                                <div class="mt-2 flex-center gap-4">
                                    <div class="col-12 flex-center flex-wrap">
                                        <div class="row w-100">
                                            <div class="col-4 mb-2">
                                                <div
                                                        class="bg-secondary rounded-2 p-1 d-flex gap-1 justify-content-center flex-column">
                            <span class="fs-5 text-subtitle"
                            >فناوری صفحه نمایش</span
                            >
                                                    <span class="fs-4 text-title fw-bold"
                                                    >Android 14</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-4 mb-2">
                                                <div
                                                        class="bg-secondary rounded-2 p-1 d-flex gap-1 justify-content-center flex-column">
                            <span class="fs-5 text-subtitle"
                            >فناوری صفحه نمایش</span
                            >
                                                    <span class="fs-4 text-title fw-bold"
                                                    >Android 14</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-4 mb-2">
                                                <div
                                                        class="bg-secondary rounded-2 p-1 d-flex gap-1 justify-content-center flex-column">
                            <span class="fs-5 text-subtitle"
                            >فناوری صفحه نمایش</span
                            >
                                                    <span class="fs-4 text-title fw-bold"
                                                    >Android 14</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-4 mb-2">
                                                <div
                                                        class="bg-secondary rounded-2 p-1 d-flex gap-1 justify-content-center flex-column">
                            <span class="fs-5 text-subtitle"
                            >فناوری صفحه نمایش</span
                            >
                                                    <span class="fs-4 text-title fw-bold"
                                                    >Android 14</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-4 mb-2">
                                                <div
                                                        class="bg-secondary rounded-2 p-1 d-flex gap-1 justify-content-center flex-column">
                            <span class="fs-5 text-subtitle"
                            >فناوری صفحه نمایش</span
                            >
                                                    <span class="fs-4 text-title fw-bold"
                                                    >Android 14</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- //!ALL ATTR -->

                            <div class="row">
                                <div class="product-attr c-pointer">
                    <span class="product-attr-box"
                    >مشاهده همه ویژگی ها
                      <i class="fas fa-chevron-left ms-4 me-4 fw-bold"></i>
                    </span>
                                </div>
                            </div>

                            <!-- //!!Alert -->
                            <div class="row mt-9">
                                <div class="text-subtitle d-flex gap-2">
                                    <div>
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div>
                                        <p class="fs-5 line2">
                                            امکان برگشت کالا در گروه موبایل با دلیل "انصراف از خرید"
                                            تنها در صورتی مورد قبول است که پلمب کالا باز نشده باشد.
                                            تمام گوشی‌های دیجی‌کالا ضمانت رجیستری دارند. در صورت
                                            وجود مشکل رجیستری، می‌توانید بعد از مهلت قانونی ۳۰ روزه،
                                            گوشی خریداری‌شده را مرجوع کنید.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!--! free Send -->
                            <div class="row mt-7">
                                <div
                                        class="border border-1 border-gray rounded-2 pe-4 flex-between">
                                    <span class="fw-bold">ارسال رایگان برای این کالا </span>
                                    <img
                                            src="{{URL}}assets/images/product/postfree.png"
                                            class="product-send-icon"/>
                                </div>
                            </div>
                        </div>
                        <!-- //! ADD TO BASKET SECTION -->
                        <div class="col-4">
                            <div
                                    class="border border-1 boder-gray rounded-2 bg-secondary p-4">
                                <div class="w-100 flex-between mb-5">
                                    <span class="fw-bold">فروشنده</span>
                                </div>
                                <div class="flex-start gap-2">
                                    <img
                                            width="40"
                                            height="40"
                                            src="https://img.icons8.com/color/48/small-business.png"
                                            alt="small-business"/>
                                    <span class="text-subtitle">آکادمی توسعه دهندگان</span>
                                </div>
                                <div class="w-100 my-3">
                                    <div class="flex-center gap-4 fs-4">
                                        <div class="d-flex gap-1">
                                            <span class="text-success fw-bold">{{$product->rate*20}}%</span>
                                            <span>رضایت از کالا</span>
                                        </div>
                                        <div class="vertical"></div>
                                        <div class="d-flex gap-1">
                                            <span>عملکرد</span>
                                            @if($product->rate*20 > 90)
                                                <span class="text-success fw-bold">عالی</span>
                                            @elseif($product->rate*20 <90 && $product->rate*20 >70)
                                                <span class="text-yellow fw-bold">خوب</span>
                                            @elseif($product->rate*20 <70)
                                                <span class="text-danger fw-bold">ضعیف</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="horizontal"></div>
                                <div
                                        class="w-100 mt-5 d-flex justify-content-end align-items-center gap-4">
                    <span
                            class="fs-4 text-decoration-line-through text-subtitle"
                    >
                        {{$product->price}}
                    </span
                    >
                                    <span
                                            class="px-3 fw-bold py-1 fs-6 rounded-pill bg-danger text-white flex-center"
                                    >{{$product->discount}}
                                    %</span
                                    >
                                </div>
                                <div class="w-100 mt-5">
                                    <div
                                            class="w-100 mt-5 d-flex justify-content-end align-items-center gap-4">
                      <span class="fs-2 fw-bold text-black"
                      >
                        {{number_format($product->price*(1-$product->discount/100))}}
                           تومان</span
                      >
                                    </div>
                                </div>

                                <div class="w-100 mt-5">
                                    <div
                                            class="w-100 py-2 flex-center bg-basket rounded-2 text-white fs-5 fw-bold">
                                        افزودن به سبد خرید
                                    </div>
                                </div>

                                @foreach($product->all_garanti as $garanti)
                                    <div class="w-100 my-5 fs-5 flex-start gap-2">
                                        <img
                                                width="30"
                                                height="30"
                                                src="https://img.icons8.com/emoji/48/shield-emoji.png"
                                                alt="shield-emoji"/>
                                        <span class="fw-bold fs-5">{{$garanti->title}}</span>
                                    </div>
                                @endforeach
                                <div class="horizontal"></div>

                                <div class="w-100 my-5 fw-bold fs-4 flex-between">
                                    <div class="text-subtitle flex-start gap-2 fs-5">
                                        <i class="fa-solid fa-car-side"></i>
                                        <span class="text-subtitle">ارسال دیجی کالا</span>
                                    </div>
                                    <i class="fas fa-chevron-left fs-5"></i>
                                </div>
                                <div
                                        class="w-100 my-5 fw-bold fs-5 text-subtitle flex-start gap-2">
                                    <i class="fa-solid fa-share-nodes"></i>
                                    <span>ارسال امروز(فعلا در شهرهای تهران و کرج)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //!Express -->
            <div
                    class="mt-8 py-4 border-top border-bottom border-1 border-gray w-75 m-auto">
                <div class="flex-around product-express">
                    <div>
                        <span class="product-express-icon product-express-icon--1"></span>
                        <span class="fs-5 text-subtitle">هفت روز ضمانت بازگشت کالا</span>
                    </div>
                    <div>
                        <span class="product-express-icon product-express-icon--2"></span>
                        <span class="fs-5 text-subtitle">امکان پرداخت در محل</span>
                    </div>
                    <div>
                        <span class="product-express-icon product-express-icon--3"></span>
                        <span class="fs-5 text-subtitle">ضمانت اصل بودن کالا</span>
                    </div>
                    <div>
                        <span class="product-express-icon product-express-icon--4"></span>
                        <span class="fs-5 text-subtitle">۲۴ ساعته، ۷ روز هفته</span>
                    </div>
                    <div>
                        <span class="product-express-icon product-express-icon--5"></span>
                        <span class="fs-5 text-subtitle">امکان تحویل اکسپرس</span>
                    </div>
                </div>
            </div>

            <!-- //!example -->
            <div class="mt-8 border border-1 border-gray rounded-2 py-4 px-3">
                <h3 class="product-title fs-4 fw-bold">کالاهای مشابه</h3>
                <div class="overflow-hidden py-2">
                    <div class="swiper mySwiper1">
                        <div class="swiper-wrapper row flex-nowrap">
                            @foreach($product_categories as $row)
                            <div class="swiper-slide swiper-slide-item">
                                <div class="card mt-5 rounded-5 overflow-hidden">
                                    <div class="w-100">
                                        <a href="/product/show/{{$row->id}}/{{generateSlug($row->title)}}" class="card-product flex-center">
                                            <img
                                                    class="card-product-img"
                                                    src="{{URL.$row->image}}"/>
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

            <!-- //!Navbar -->
            <div class="mt-8">
                <ul
                        class="product-nav flex-start gap-7 fs-5 fw-bold text-subtitle border-bottom border-1 border-gray position-sticky top-0 py-3 bg-white z-3">
                    <li class="pb-2 active">معرفی</li>
                    <li class="pb-2">بررسی تخصصی</li>
                    <li class="pb-2">مشخصات</li>
                    <li class="pb-2">دیدگاه‌ها</li>
                </ul>
                <div class="row mt-5">
                    <div class="col-10">
                        <section class="mt-5 border-break">
                            <h3 class="product-title fs-4 fw-bold mb-5">معرفی</h3>
                            <div
                                    class="text-justify overflow-hidden fs-5 text-subtitle footer__text"
                                    style="max-height: 14rem; line-height: 3rem">
                                <p>
                                    {{$product->description}}
                                </p>
                            </div>
                            <span
                                    role="button"
                                    style="bottom: -4rem"
                                    class="text-info flex-start gap-1 my-4 fs-5">
                  <span class="footer__more"> مشاهده بیشتر </span>
                  <i class="fas fa-chevron-left"></i>
                </span>
                        </section>
                        <section class="mt-5 border-break">
                            <h3 class="product-title fs-4 fw-bold mb-5">بررسی تخصصی</h3>
                            <div
                                    class="text-justify overflow-hidden fs-5 text-subtitle footer__text"
                                    style="max-height: 14rem; line-height: 3rem">
                                <p>
                                   {{$special->description}}
                                </p>
                            </div>
                            <span
                                    role="button"
                                    style="bottom: -4rem"
                                    class="text-info flex-start gap-1 my-4 fs-5">
                  <span class="footer__more"> مشاهده بیشتر </span>
                  <i class="fas fa-chevron-left"></i>
                </span>
                        </section>
                        <section class="mt-5 border-break">
                            <h3 class="product-title fs-4 fw-bold mb-5">مشخصات</h3>
                            <div
                                    class="text-justify overflow-hidden fs-5 footer__text"
                                    style="max-height: 14rem; line-height: 3rem">
                                <div>
                                    <div class="d-flex gap-8 w-100 mt-5">
                                        <div class="fs-3 w-25 flex-center">مشخصات کلی</div>
                                        <div class="w-75">
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-8 w-100 mt-5">
                                        <div class="fs-3 w-25 flex-center">صفحه نمایش</div>
                                        <div class="w-75">
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                            <div class="d-flex w-100 justify-content-between py-2">
                                                <p class="width-5 fs-4 text-subtitle">صفحه نماش</p>
                                                <p
                                                        class="width-15 fs-4 pb-1 fw-bold border-bottom border-1 border-gray">
                                                    124 اینچ
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-start gap-2 gap-3 mt-3 text-subtitle">
                                    <i class="fas fa-triangle-exclamation"></i>
                                    <p>
                                        هشدار سامانه همتا: در صورت انجام معامله، از فروشنده کد
                                        فعالسازی را گرفته و حتما در حضور ایشان، دستگاه را از طریق
                                        #7777*، برای سیمکارت خود فعالسازی نمایید. آموزش تصویری در
                                        آدرس اینترنتی hmti.ir/06
                                    </p>
                                </div>
                            </div>
                            <span
                                    role="button"
                                    style="bottom: -4rem"
                                    class="text-info flex-start gap-1 my-4 fs-5">
                  <span class="footer__more"> مشاهده بیشتر </span>
                  <i class="fas fa-chevron-left"></i>
                </span>
                        </section>
                        <section class="mt-5 border-break">
                            <h3 class="product-title fs-4 fw-bold mb-5">دیدگاه‌ها</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="my-5 fs-2 gap-2 flex-start">
                                        <i class="fas fa-star text-yellow"></i>

                                        <span class="fs-1 fw-bold text-success">4.5</span>
                                        <span class="text-subtitle">از 5</span>
                                    </div>
                                    <div>
                                        <ul>
                                            <li class="flex-center gap-6 mb-3">
                                                <div class="">
                                                    <span>۵</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="progress width-16">
                                                    <div
                                                            class="progress-bar bg-success"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                </div>
                                                <div>
                                                    <span>۲</span>
                                                </div>
                                            </li>
                                            <li class="flex-center gap-6 mb-3">
                                                <div class="">
                                                    <span>۴</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="progress width-16">
                                                    <div
                                                            class="progress-bar bg-danger"
                                                            role="progressbar"
                                                            style="width: 45%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                </div>
                                                <div>
                                                    <span>۴</span>
                                                </div>
                                            </li>
                                            <li class="flex-center gap-6 mb-3">
                                                <div class="">
                                                    <span>۳</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="progress width-16">
                                                    <div
                                                            class="progress-bar bg-yellow"
                                                            role="progressbar"
                                                            style="width: 55%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                </div>
                                                <div>
                                                    <span>۱</span>
                                                </div>
                                            </li>
                                            <li class="flex-center gap-6 mb-3">
                                                <div class="">
                                                    <span>۲</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="progress width-16">
                                                    <div
                                                            class="progress-bar bg-info"
                                                            role="progressbar"
                                                            style="width: 85%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                </div>
                                                <div>
                                                    <span>۴</span>
                                                </div>
                                            </li>
                                            <li class="flex-center gap-6 mb-3">
                                                <div class="">
                                                    <span>۱</span>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="progress width-16">
                                                    <div
                                                            class="progress-bar bg-success"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                </div>
                                                <div>
                                                    <span>۲</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-8">
                                            <h4 class="fs-3">بازخورد این محصول</h4>
                                            <p class="fs-5 text-subtitle mt-2">
                                                با ثبت بازخورد خود در خرید دیگران راهنمایی خوبی باشید
                                            </p>
                                            <a
                                                    href="#"
                                                    class="mt-4 flex-center bg-secondary py-3 fw-bold fs-4 rounded-2"
                                            >ثبت دیدگاه</a
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="overflow-y-auto" style="max-height: 46rem">
                                        <div class="bg-secondary p-4 rounded-4 mb-2">
                                            <div class="d-flex gap-4">
                                                <div>
                                                    <img
                                                            style="
                                width: 8rem;
                                height: 8rem;
                                object-fit: cover;
                                border-radius: 100%;
                              "
                                                            src="{{URL}}assets/images/teacher/teacher.jpg"/>
                                                </div>
                                                <div>
                                                    <div class="flex-between mb-4">
                                                        <div class="d-flex gap-2 fs-5 text-subtitle">
                                                            <span>فرهاد کاظم زاده</span>
                                                            <span>1403/05/05</span>
                                                        </div>
                                                        <div class="fs-5">
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="fs-4 line2">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                            صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                            سطرآنچنان که لازم است
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-secondary p-4 rounded-4 mb-2">
                                            <div class="d-flex gap-4">
                                                <div>
                                                    <img
                                                            style="
                                width: 8rem;
                                height: 8rem;
                                object-fit: cover;
                                border-radius: 100%;
                              "
                                                            src="{{URL}}assets/images/teacher/teacher.jpg"/>
                                                </div>
                                                <div>
                                                    <div class="flex-between mb-4">
                                                        <div class="d-flex gap-2 fs-5 text-subtitle">
                                                            <span>فرهاد کاظم زاده</span>
                                                            <span>1403/05/05</span>
                                                        </div>
                                                        <div class="fs-5">
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="fs-4 line2">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                            صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                            سطرآنچنان که لازم است
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-secondary p-4 rounded-4 mb-2">
                                            <div class="d-flex gap-4">
                                                <div>
                                                    <img
                                                            style="
                                width: 8rem;
                                height: 8rem;
                                object-fit: cover;
                                border-radius: 100%;
                              "
                                                            src="{{URL}}assets/images/teacher/teacher.jpg"/>
                                                </div>
                                                <div>
                                                    <div class="flex-between mb-4">
                                                        <div class="d-flex gap-2 fs-5 text-subtitle">
                                                            <span>فرهاد کاظم زاده</span>
                                                            <span>1403/05/05</span>
                                                        </div>
                                                        <div class="fs-5">
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="fs-4 line2">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                            صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                            سطرآنچنان که لازم است
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-secondary p-4 rounded-4 mb-2">
                                            <div class="d-flex gap-4">
                                                <div>
                                                    <img
                                                            style="
                                width: 8rem;
                                height: 8rem;
                                object-fit: cover;
                                border-radius: 100%;
                              "
                                                            src="{{URL}}assets/images/teacher/teacher.jpg"/>
                                                </div>
                                                <div>
                                                    <div class="flex-between mb-4">
                                                        <div class="d-flex gap-2 fs-5 text-subtitle">
                                                            <span>فرهاد کاظم زاده</span>
                                                            <span>1403/05/05</span>
                                                        </div>
                                                        <div class="fs-5">
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star text-yellow"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="fs-4 line2">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                            صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                            سطرآنچنان که لازم است
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-2">
                        <div
                                class="border border-1 border-gray rounded-2 py-3 px-2 position-sticky"
                                style="top: 1rem">
                            <div class="d-flex gap-2 py-3">
                                <div>
                                    <img
                                            style="width: 8rem"
                                            src="{{URL.$product->image}}"/>
                                </div>
                                <div>
                                    <p class="fs-5 text-subtitle ellipsis-2">
                                        {{ $product->title}}                                </p>
                                    <div class="d-flex my-2 gap-2 align-items-center">
                      <span
                              class="d-flex p-1 bg-primary"
                              style="
                          width: 1.5rem;
                          height: 1.5rem;
                          border-radius: 50%;
                        "></span>
                                        <span class="fs-5">بنفش</span>
                                    </div>
                                </div>
                            </div>
                            <div class="horizontal"></div>
                            <div class="py-3">
                                <div class="flex-start gap-2 my-3 text-subtitle">
                                    <i class="fas fa-shop"></i>
                                    <span class="fs-5">آکادمی توسعه دهندگان</span>
                                </div>

                                @foreach($product->all_garanti as $garanti)

                                <div class="flex-start gap-2 my-3 text-subtitle">
                                    <i class="fas fa-shield"></i>
                                    <span class="fs-5">{{$garanti->title}}</span>
                                </div>
                                @endforeach
                                <div class="flex-start gap-2 my-3 text-subtitle">
                                    <i class="fas fa-save"></i>
                                    @if($product->stock>0)
                                    <span class="fs-5">موجود در انبار فروشنده</span>
                                    @else
                                        <span class="fs-5 text-danger">اتمام موجودی</span>
                                    @endif
                                </div>
                                <div class="fs-3 text-start">
                                    <span>
                                        {{number_format($product->price*(1-$product->discount/100))}}
                                        تومان </span>
                                </div>
                                <div
                                        class="bg-basket py-2 flex-center rounded-2 text-white fs-5 mt-4 c-pointer">
                                    افزودن به سبد خرید
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('Thubnails')
    <div id="Thubnails">
        <div class="Thubnails_Title">
            <h4>تصاویر رسمی</h4>
            <i class="Close_Thubnails"></i>
        </div>
        <div class="Thubnails_Content">
            <div class="Thubnails_Content_Right">
                <img src=""/>
            </div>
            <div class="Thubnails_Content_Left">
                <h4>{{$product->title}}</h4>
                <ul>
                    @foreach($gallery as $row)
                    <li data-image="{{URL.$row->image_src}}">
                        <img src="{{URL.$row->image_src}}"/>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div id="Dark"></div>
@endpush
@push('script')
    <script src="{{URL}}assets/js/elevatezoom/jquery.elevatezoom.js"></script>
    <script src="{{URL}}assets/js/header-top.js"></script>
    <script src="{{URL}}assets/js/swiper.js"></script>
    <script src="{{URL}}assets/js/section-more.js"></script>
    <script src="{{URL}}assets/js/elevate-zoom.js"></script>
    <script src="{{URL}}assets/js/Thubnails.js"></script>
    <script src="{{URL}}assets/js/color.js"></script>
    <script src="{{URL}}assets/js/scroll.js"></script>
@endpush

