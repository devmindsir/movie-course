@extends('pages.layouts.master')
@section('content')
<main>
    <section class="overflow-hidden">
        <div class="login">
            <div
                    class="login-content bg-white p-6 p-shadow rounded-5 border-bottom border-3 border-primary">
                <div class="flex-center flex-column gap-1">
                    <h2 class="fs-3 text-title fw-bold">ورود به حساب کاربری</h2>
                    <span class="fs-4 text-subtitle">
                خوشحالیم دوباره میبینیمت دوست عزیز :)
              </span>
                </div>
                <div class="flex-center gap-2 bg-secondary p-4 rounded-3 mt-4">
                    <span class="fs-5 text-subtitle">کاربر جدید هستید؟</span>
                    <a
                            href="{{URL}}register"
                            class="fs-5 py-1 px-2 rounded-3 flex-center bg-subtitle text-white"
                    >ثبت نام</a
                    >
                </div>
                <div class="mt-4">
                    <form action="{{URL}}login" method="POST">
                        <div class="position-relative mb-1">
                            <input
                                    name="email"
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="text"
                                    placeholder="لطفا آدرس ایمیل خود را وارد کنید" />
                            <i
                                    class="login-item-icon fas fa-user text-subtitle fs-2 position-absolute"></i>
                            @if (error('email'))
                                <p class="fs-5 text-danger my-3"> {{error('email')}} </p>
                            @endif

                        </div>
                        <div class="position-relative mb-2">
                            <input
                                    name="password"
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="password"
                                    placeholder="لطفا گذرواژه خود را وارد کنید" />
                            <i
                                    class="login-item-icon fas fa-eye text-subtitle fs-2 position-absolute"></i>
                            @if (error('password'))
                                <p class="fs-5 text-danger my-3"> {{error('password')}} </p>
                            @endif
                        </div>
                        <button
                                class="mt-2 w-100 py-3 bg-primary rounded-3 flex-center text-white gap-2 fs-5 fw-bold">
                            <i class="fas fa-right-from-bracket"></i>
                            <span>ورود به حساب کاربری</span>
                        </button>
                    </form>
                    <div class="mt-5 flex-between">
                        <div class="flex-start gap-2">
                            <div class="position-relative">
                                <span class="login-item-checkbox"></span>
                                <input class="login-item-input" type="checkbox" hidden />
                            </div>
                            <span class="fs-5 fw-bold text-subtitle"
                            >مرا به خاطر داشته باش</span
                            >
                        </div>
                        <div>
                            <a href="forget.html" class="text-subtitle fs-5"
                            >رمز عبور را فراموش کرده اید؟</a
                            >
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="fs-5 text-title">سلام کاربر محترم:</span>
                        <ul class="d-flex flex-column gap-2 mt-2">
                            <li class="login-list-item text-subtitle fs-5">
                                لطفا از مرورگر های مطمئن و بروز مانند گوگل کروم و فایرفاکس
                                استفاده کنید.
                            </li>
                            <li class="login-list-item text-subtitle fs-5">
                                ما هرگز اطلاعات محرمانه شمارا از طریق ایمیل درخواست نمیکنیم.
                            </li>
                            <li class="login-list-item text-subtitle fs-5">
                                لطفا کلمه عبور خود را در فواصل زمانی کوتاه تغییر دهید.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection