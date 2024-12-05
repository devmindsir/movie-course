@extends('pages.layouts.master')
@section('content')
<main>
    <section class="showCart showCart-2">
        <div class="container-fluid container-md">
            <div class="showCart__Content">
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
                        <div class="showcart-top-line active"></div>
                        <div class="showcart-top-circle active">
                            <i class="fas fa-check text-white"></i>

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

                <div class="showcart2">
                    <div class="pyro">
                        <div class="before"></div>
                        <div class="after"></div>
                    </div>

                    <div class="showcart2_Order">
                <span class="showcart2_Order-Title Section__Title-Header"
                >اطلاعات پرداخت</span
                >
                        <div class="showcart2_Order-Content">
                  <span class="showcart2_Order-Content-Title"
                  >متشکریم سفارش شما به ثبت رسید</span
                  >
                            <ul class="showcart2_Order-Lists">
                                <li class="showcart2_Order-Item">
                                    <span class="showcart2_Order-Item-Key">شماره سفارش:</span>
                                    <span class="showcart2_Order-Item-Value">{{$order->transaction_code}}</span>
                                </li>
                                <li class="showcart2_Order-Item">
                                    <span class="showcart2_Order-Item-Key">تاریخ:</span>
                                    <span class="showcart2_Order-Item-Value">{{$order->update_at}}</span>
                                </li>
                                <li class="showcart2_Order-Item">
                                    <span class="showcart2_Order-Item-Key">ایمیل:</span>
                                    <span class="showcart2_Order-Item-Value"
                                    >{{$user->email}}</span
                                    >
                                </li>
                                <li class="showcart2_Order-Item">
                                    <span class="showcart2_Order-Item-Key">قیمت نهایی:</span>
                                    <span class="showcart2_Order-Item-Value"
                                    >
                                       {{number_format($order->total_amount)}}
                                        تومان</span
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="showcart2_Info">
                <span class="showcart2_Info-Title Section__Title-Header"
                >مشخصات سفارش</span
                >
                        <div class="showcart2_Info-Content">
                            <div class="showcart2_Info-Item showcart2_Info-Item-Head">
                                <span class="showcart2_Info-Item-Key">محصول</span>
                                <span class="showcart2_Info-Item-Value">قیمت پس از تخفیف</span>
                            </div>
                            @foreach($items as $item)
                            <div class="showcart2_Info-Item">
                    <span class="showcart2_Info-Item-Key"
                    >{{$item->title}}</span
                    >
                                <span class="showcart2_Info-Item-Value">
                                    {{number_format($item->unit_price*(1-$item->unit_discount/100)*$item->quantity)}}
                                    تومان</span>
                            </div>
                            @endforeach
                        </div>
                        <a class="showcart2_Info-Link">رفتن به پنل کاربری</a>
                    </div>
                    <div class="showcart2_Profile">
                <span class="showcart2_Info-Title Section__Title-Header"
                >آدرس صورتحساب</span
                >
                        <div class="showcart2_Info-Content">
                            <div class="showcart2_Info-Item showcart2_Info-Item1">
                    <span class="showcart2_Info-Item-Key">
                      نام و نام خانوادگی</span
                    >
                                <span class="showcart2_Info-Item-Value"
                                >{{$user->name}}</span
                                >
                            </div>
                            <div class="showcart2_Info-Item showcart2_Info-Item1">
                                <span class="showcart2_Info-Item-Key"> شماره همراه</span>
                                <span class="showcart2_Info-Item-Value">{{$user->phone}}</span>
                            </div>
                            <div class="showcart2_Info-Item showcart2_Info-Item1">
                                <span class="showcart2_Info-Item-Key"> ایمیل</span>
                                <span class="showcart2_Info-Item-Value"
                                >{{$user->email}}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection