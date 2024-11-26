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
                        <i class="fas fa-check active"></i>
                        <span class="showcart-top-text">اطلاعات سفارش</span>
                    </div>
                    <div class="showcart-top-line active"></div>
                    <div class="showcart-top-circle active ">
                        <i class="fas fa-check"></i>

                        <span class="showcart-top-text"> اطلاعات پست</span>
                    </div>
                    <div class="showcart-top-line "></div>
                    <div class="showcart-top-circle">
                        <i class="fas fa-check"></i>

                        <span class="showcart-top-text showcart-top-text--1"
                        >بازبینی و پرداخت
                </span>
                    </div>
                    <div class="showcart-top-line"></div>
                    <div class="showcart-top-circle">
                        <i class="fas fa-check"></i>

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

            <div class="product px-0 px-lg-8 table-responsive">
                <span class="title-structuring">انتخاب آدرس</span>
                <table class="address table table-bordered mt-3">
                    <tbody>
                    <tr>
                        <td class="address-item text-center align-middle" rowspan="3">
                            <span class="address-circle" onclick="toggleCheck(this)"></span>
                            <input class="address-radio" name="address" type="radio" value="1">
                        </td>
                        <td class="address-item" colspan="3">فرهاد کاظم زاده</td>
                    </tr>
                    <tr>
                        <td class="address-item">استان: خراسان رضوی</td>
                        <td class="address-item align-middle" rowspan="2">آدرس: تهران</td>
                        <td class="address-item">شماره تماس ثابت: 0510000000</td>
                    </tr>
                    <tr>
                        <td class="address-item">شهر: مشهد</td>
                        <td class="address-item">شماره تماس اضطراری: 09300000470</td>
                    </tr>
                    </tbody>
                </table>
                <table class="address table table-bordered mt-3">
                    <tbody>
                    <tr>
                        <td class="address-item text-center align-middle" rowspan="3">
                            <span class="address-circle" onclick="toggleCheck(this)"></span>
                            <input class="address-radio" name="address" type="radio" value="1">
                        </td>
                        <td class="address-item" colspan="3">فرهاد کاظم زاده</td>
                    </tr>
                    <tr>
                        <td class="address-item">استان: خراسان رضوی</td>
                        <td class="address-item align-middle" rowspan="2">آدرس: تهران</td>
                        <td class="address-item">شماره تماس ثابت: 0510000000</td>
                    </tr>
                    <tr>
                        <td class="address-item">شهر: مشهد</td>
                        <td class="address-item">شماره تماس اضطراری: 09300000470</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-7 px-0 px-lg-8 table-responsive">
                <span class="title-structuring">انتخاب نوع ارسال</span>


                <div class="mt-5 border border-1 border-silver rounded-2 w-100 d-flex justify-content-between align-items-center" style="height: 12rem;">
                    <div class="width-3 flex-center h-100 border-start border-1 border-gray" onclick="selectShipping(this)">
                <span class="border border-1 border-gray rounded-circle d-flex position-relative" style="width: 3rem; height: 3rem;">
                  <span class="checkmark d-none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: green; border-radius: 50%;"></span>
                </span>
                        <input type="radio" name="shipping" class="d-none">
                    </div>
                    <div class="width-12 d-flex align-items-center border-start border-1 border-gray h-100">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="position-relative">
                                <i class="address-post address-post--1"></i>
                            </div>
                            <div>
                                <p>پست پیشتاز هزینه ارسال طبق تعرفه پست</p>
                                <p>زمان تقریبی ارسال سفارش در محدوده زمانی 48-72 ساعت</p>
                            </div>
                        </div>
                    </div>
                    <div class="width-5 h-100 flex-center text-center gap-3">
                        <span>هزینه ارسال: 75,000 تومان</span>
                    </div>
                </div>

                <!-- تکرار برای دومین div -->
                <div class="mt-5 border border-1 border-silver rounded-2 w-100 d-flex justify-content-between align-items-center" style="height: 12rem;">
                    <div class="width-3 flex-center h-100 border-start border-1 border-gray" onclick="selectShipping(this)">
                <span class="border border-1 border-gray rounded-circle d-flex position-relative" style="width: 3rem; height: 3rem;">
                  <span class="checkmark d-none" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: green; border-radius: 50%;"></span>
                </span>
                        <input type="radio" name="shipping" class="d-none">
                    </div>
                    <div class="width-12 d-flex align-items-center border-start border-1 border-gray h-100">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="position-relative">
                                <i class="address-post address-post--1"></i>
                            </div>
                            <div>
                                <p>پست پیشتاز هزینه ارسال طبق تعرفه پست</p>
                                <p>زمان تقریبی ارسال سفارش در محدوده زمانی 48-72 ساعت</p>
                            </div>
                        </div>
                    </div>
                    <div class="width-5 h-100 flex-center text-center gap-3">
                        <span>هزینه ارسال: 75,000 تومان</span>
                    </div>
                </div>



            </div>
            <div class="w-100 flex-between mt-4 px-0 px-lg-8">
                <a class="showcart-btn bg-title gap-2">
                    <i class="fas fa-arrow-right"></i>
                    <span>بازگشت</span>
                </a>
                <a class="showcart-btn bg-success gap-2">
                    <span>ادامه سفارش</span>
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
@push('script')
<script src="{{URL}}assets/js/post.js"></script>
@endpush