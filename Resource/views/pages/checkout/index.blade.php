@extends('pages.layouts.master')
@section('content')
<main>
    <div class="container-fluid container-lg">
        <div class="w-100 p-shadow bg-white showcart py-9 mt-6 px-4">
            <div class="w-75 m-auto showcart-top">
                <div class="flex-center gap-1">
                    <div class="flex-start gap-1 showcart-top-list active">
                        <span class="showcart-top-dashed"></span>
                        <span class="showcart-top-dashed"></span>
                        <span class="showcart-top-dashed"></span>
                        <span class="showcart-top-dashed"></span>
                    </div>
                    <div class="showcart-top-circle active">
                        <i class="fas fa-check text-white"></i>
                        <span class="showcart-top-text">اطلاعات سفارش</span>
                    </div>
                    <div class="showcart-top-line active"></div>
                    <div class="showcart-top-circle active">
                        <i class="fas fa-check text-white"></i>

                        <span class="showcart-top-text">اطلاعات پست</span>
                    </div>
                    <div class="showcart-top-line active"></div>
                    <div class="showcart-top-circle active">
                        <i class="fas fa-check text-white"></i>

                        <span class="showcart-top-text showcart-top-text--1"
                        >بازبینی و پرداخت
                </span>
                    </div>
                    <div class="showcart-top-line"></div>
                    <div class="showcart-top-circle">

                        <span class="showcart-top-text">اطلاعات پرداخت</span>
                    </div>
                    <div class="flex-start gap-1">
                        <span class="showcart-top-dashed"></span>
                        <span class="showcart-top-dashed"></span>
                        <span class="showcart-top-dashed"></span>
                        <span class="showcart-top-dashed"></span>
                    </div>
                </div>
            </div>

            <div class="mt-9 border border-1 border-gray rounded-2 px-4 py-6">
            <span class="title-structuring"
            >کد تخفیف دارید؟ اینجا وارد کنید</span
            >
                <div class="flex-start mt-3 order-code">
                    <input
                            class="order-code-input w-100 px-5 border border-1 border-gray text-subtitle fs-4"
                            placeholder="وارد کردن کد تخفیف" />
                    <span
                            class="order-code-btn px-2 max-content bg-primary fs-4 flex-center text-white"
                    >ثبت کد تخفیف</span
                    >
                </div>
                <span class="gift-message mt-3 fs-5 text-primary d-flex"></span>
            </div>

            <div class="mt-4 px-4 py-5">
                <span class="title-structuring"> جزئیات صورت حساب </span>
                <div class="mt-6">
                    <div class="row">
                        <div class="col-6">
                            <span class="text-subtitle fs-5">نام و نام خانوادگی*</span>
                            <div
                                    class="mt-2 py-3 px-4 border border-1 border-gray rounded-2 text-subtitle fs-4">
                                {{$user->name}}
                            </div>
                        </div>
                        <div class="col-6">
                            <span class="text-subtitle fs-5">نام کاربری*</span>
                            <div
                                    class="mt-2 py-3 px-4 border border-1 border-gray rounded-2 text-subtitle fs-4">
                                {{$user->username}}
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <span class="text-subtitle fs-5">تلفن *</span>
                            <div
                                    class="mt-2 py-3 px-4 border border-1 border-gray rounded-2 text-subtitle fs-4">
                                {{$user->phone}}
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <span class="text-subtitle fs-5">آدرس ایمیل *</span>
                            <div
                                    class="mt-2 py-3 px-4 border border-1 border-gray rounded-2 text-subtitle fs-4">
                                {{$user->email}}
                            </div>
                        </div>
                        <div class="mt-4 flex-start fs-4 gap-2 fw-bold">
                            <i class="fas fa-triangle-circle-square text-primary"></i>
                            <span class="text-title"> جزئیات صورت حساب نادرست هست ؟</span>
                            <a class="text-primary">از اینجا اطلاح کنید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-2 px-4">
                <span class="title-structuring"> جزئیات محصول </span>
                <div class="mt-5 table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th
                                    class="table-item bg-title py-4 text-center text-white fs-5">
                                محصول
                            </th>
                            <th
                                    class="table-item bg-title py-4 text-center text-white fs-5">
                                قیمت واحد
                            </th>
                            <th
                                    class="table-item bg-title py-4 text-center text-white fs-5">
                                 تعداد
                            </th>
                            <th
                                    class="table-item bg-title py-4 text-center text-white fs-5">
                                تخفیف
                            </th>
                            <th
                                    class="table-item bg-title py-4 text-center text-white fs-5">
                                قیمت نهایی
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($baskets as $basket)
                        <tr>
                            <td class="table-item py-4 text-center fs-4 bg-secondary">
                                {{$basket['title']}}
                            </td>
                            <td class="table-item py-4 text-center fs-4 bg-secondary">
                                {{number_format($basket['price'])}}
                                تومان
                            </td>
                            <td class="table-item py-4 text-center fs-4 bg-secondary">
                                {{$basket['count']}}
                            </td>
                            <td class="table-item py-4 text-center fs-4 bg-secondary">
                                {{number_format($basket['price']*($basket['discount']/100)*$basket['count'])}}
                                تومان
                            </td>
                            <td class="table-item py-4 text-center fs-4 bg-secondary">
                                {{number_format($basket['price']*(1-$basket['discount']/100)*$basket['count'])}}
                                تومان
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if($address)
            <div class="py-2 px-4">
                <span class="title-structuring"> جزئیات ارسال سفارشات </span>
                <div class="mt-5 ">
                    <table class="showcart-post" cellspacing="0">
                        <tr>
                            <td style="width: 5%">
                                <i style="background-position:  -806px -204px;"></i>
                            </td>
                            <td>
                                این سفارش به
                                <strong class="text-primary">{{$address->address}}</strong>
                                واقع در
                                <strong class="text-primary">{{$address->city}}</strong>
                                ارسال می شود
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i style="background-position: -806px -247px;"></i>
                            </td>
                            <td>
                                این سفارش با

                                <strong class="text-primary">{{$post->title}}</strong>

                                به آدرس مورد نظر شما ارسال خواهد شد
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="mt-4 flex-start fs-4 gap-2 fw-bold">
                    <i class="fas fa-triangle-circle-square text-primary"></i>
                    <span class="text-title"> جزئیات ارسال سفارش نادرست هست ؟</span>
                    <a href="{{URL}}post" class="text-primary">از اینجا اطلاح کنید</a>
                </div>
            </div>
            @endif


            <div class="mt-6 py-2 px-4">
                <span class="title-structuring"> فاکتور نهایی </span>
                <div class="w-100 border border-1 border-gray mt-3">
                    <div
                            class="w-100 flex-between px-5 py-4 border-bottom border-1 boder-title">
                        <span class="fw-bold fs-4">جمع کل خرید شما:</span>
                        <span class="fw-bold fs-4">
                            <span class="amount">
                            {{number_format(cart()->getTotalPrice())}}
                                </span>
                            تومان </span>
                    </div>
                    <div
                            class="w-100 flex-between px-5 py-4 border-bottom border-1 boder-title">
                        <span class="fw-bold fs-4"> هزینه ارسال سفارش: </span>
                        <span class="fw-bold fs-4">
                            <span class="post-price">
                            {{number_format($postPrice)}}
                                </span>
                            تومان </span>
                    </div>

                    <div
                            class="w-100 flex-between px-5 py-4 border-bottom border-1 boder-title bg-khaki">
                <span class="fw-bold text-khaki-text fs-4">

                    میزان کد تخفیف: (
                    <span class="discount-percent">0</span>
                    درصد)

                </span>
                        <span class="fw-bold text-khaki-text fs-4">
                            <span class="discount-amount">0</span>
                            تومان </span>
                    </div>

                    <div class="w-100 flex-between px-5 py-4 bg-success-Light">
                        <span class="fw-bold text-success fs-4">مبلغ قابل پرداخت:</span>
                        <span class="fw-bold text-success fs-4">
                            <span class="total-price">{{number_format($totalPrice)}}</span>

                            تومان </span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-2">
                <span class="title-structuring">انتخاب نوع پرداخت</span>
                <div class="mt-5 flex-start px-3 fs-4 fw-bold gap-3">
                    <span>درگاه زرین پال</span>
                    <input type="checkbox" />
                </div>
            </div>
            <div class="px-4 py-2">
                <span class="title-structuring">تایید قوانین سایت و پرداخت</span>
                <div class="mt-5 flex-start px-3 fs-4 fw-bold gap-3">
              <span>
                من شرایط و مقررات سایت را خوانده ام و آن را می پذیرم *
              </span>
                    <input type="checkbox" />
                </div>
            </div>

            <div
                    class="mt-5 w-100 bg-primary text-white py-3 rounded-3 flex-center fs-4 fw-bold">
                ثبت سفارش و پرداخت
            </div>
        </div>
    </div>
</main>

@endsection

@push('script')
    <script src="{{URL}}assets/js/checkoutAjax.js"></script>
 @endpush