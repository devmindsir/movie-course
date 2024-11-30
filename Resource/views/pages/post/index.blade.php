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
                        <i class="fas fa-check active text-white"></i>
                        <span class="showcart-top-text">اطلاعات سفارش</span>
                    </div>
                    <div class="showcart-top-line active"></div>
                    <div class="showcart-top-circle active ">
                        <i class="fas fa-check text-white"></i>

                        <span class="showcart-top-text"> اطلاعات پست</span>
                    </div>
                    <div class="showcart-top-line "></div>
                    <div class="showcart-top-circle">

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

            <div class="product px-0 px-lg-8 table-responsive">
                <span class="title-structuring">انتخاب آدرس</span>
                @foreach($address as $row)
                <table class="address table table-bordered mt-3">
                    <tbody>
                    <tr>
                        <td class="address-item text-center align-middle" rowspan="3">
                            <span class="address-circle" onclick="toggleCheck(this)"></span>
                            <input class="address-radio" name="address" type="radio" value="1">
                        </td>
                        <td class="address-item" colspan="3">{{$row->name}}</td>
                    </tr>
                    <tr>
                        <td class="address-item">استان:
                            {{$row->ostan}}</td>
                        <td class="address-item align-middle" rowspan="2">آدرس:
                        {{$row->address}}
                        </td>
                        <td class="address-item">شماره تماس ثابت:
                        {{$row->tel}}
                        </td>
                    </tr>
                    <tr>
                        <td class="address-item">شهر:
                        {{$row->city}}
                        </td>
                        <td class="address-item">شماره تماس :
                        {{$row->phone}}
                        </td>
                    </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
            <div class="mt-7 px-0 px-lg-8 table-responsive">
                <span class="title-structuring">انتخاب نوع ارسال</span>

                @foreach($posts as $post)
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
                                <p>{{$post->title}}</p>
                                <p>{{$post->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="width-5 h-100 flex-center text-center gap-3">
                        <span>هزینه ارسال:

                            {{number_format($post->cost)}}

                            تومان</span>
                    </div>
                </div>
                @endforeach

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