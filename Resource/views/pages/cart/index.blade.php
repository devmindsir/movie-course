@extends('pages.layouts.master',[
    'pageTitle'=>'سبد خرید شما'
])
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
                        <div class="showcart-top-line"></div>
                        <div class="showcart-top-circle">

                            <span class="showcart-top-text"> اطلاعات پست</span>
                        </div>
                        <div class="showcart-top-line"></div>
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
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="table-item bg-primary py-4 text-center text-white fs-5">محصول</th>
                            <th class="table-item bg-primary py-4 text-center text-white fs-5">قیمت واحد</th>
                            <th class="table-item bg-primary py-4 text-center text-white fs-5">تخفیف</th>
                            <th class="table-item bg-primary py-4 text-center text-white fs-5">تعداد</th>
                            <th class="table-item bg-primary py-4 text-center text-white fs-5">قیمت کل</th>
                            <th class="table-item bg-primary py-4 text-center text-white fs-5">حذف</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($carts as $cart)
                            <tr class="align-middle">
                                <td class="table-item py-4 text-center fs-4 bg-secondary">
                                    <div>{{$cart['title']}}</div>
                                    @if($cart['type']==='product')
                                        <div class="bg-danger-light py-2 px-3 rounded-2 flex-between mt-3">
                                            <span>رنگ:</span>
                                            <span>{{$cart['color_name']}}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="table-item py-4 text-center fs-4 bg-secondary">
                                    {{number_format($cart['price'])}}
                                    تومان
                                </td>
                                <td class="table-item py-4 text-center fs-4 bg-secondary">
                                    {{$cart['discount']}}
                                    درصد

                                </td>
                                <td class="table-item text-center fs-4 bg-secondary">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        @if($cart['type']==='product')
                                            <button style="width: 3rem;height: 3rem"
                                                    class="btn btn-primary rounded-circle fs-4"
                                                    onclick="changeQuantity(this, -1)">-
                                            </button>
                                        @endif
                                        <span id="product-quantity-{{$cart['id']}}" data-id="{{$cart['id']}}">{{$cart['count']}}</span>
                                        @if($cart['type']==='product')
                                            <button style="width: 3rem;height: 3rem"
                                                    class="btn btn-primary rounded-circle fs-4"
                                                    onclick="changeQuantity(this, 1)">+
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td class="table-item py-4 text-center fs-4 bg-secondary">
                                    {{number_format(($cart['price']*(1-$cart['discount']/100))*$cart['count'])}}
                                     تومان

                                </td>
                                <td class="table-item py-4 text-center fs-4 bg-secondary">
                                    <i class="fas fa-close fs-1 text-primary" style="cursor: pointer"
                                       data-id="{{$cart['id']}}"
                                       data-type="{{$cart['type']}}"
                                       data-color-id="{{$cart['color_id'] ?? ''}}"
                                       onclick="deleteRow(this)"></i>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="price w-100 d-flex justify-content-end mt-4 px-0 px-lg-8">
                    <div
                            class="w-50 flex-between bg-success-Light py-4 px-5 rounded-2 border border-1 border-silver">
                        <div class="fs-4">جمع کل خرید شما</div>
                        <div class="fs-4">
                            <span class="total_price">
                            {{number_format(cart()->getTotalPrice())}}
                                </span>
                             تومان
                        </div>
                    </div>
                </div>
                <div class="w-100 flex-between mt-4 px-0 px-lg-8">
                    <a class="showcart-btn bg-title gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>بازگشت</span>
                    </a>

                    @if(cart()->getTotalCount()>=1)
                    <a href="{{URL}}post" class="showcart-btn bg-success gap-2">
                        <span>ادامه سفارش</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
@push('script')
    <script src="{{URL}}assets/js/cart.js"></script>
@endpush