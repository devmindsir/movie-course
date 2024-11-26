@extends('pages.layouts.master')
@section('content')
<main>
    <section class="overflow-hidden">
        <div class="login">
            <div
                    class="login-content bg-white p-6 p-shadow rounded-5 border-bottom border-3 border-primary">
                <div class="flex-center flex-column gap-1">
                    <h2 class="fs-3 text-title fw-bold">ایجاد حساب کاربری جدید</h2>
                    <span class="fs-4 text-subtitle"> به خونواده ما خوش اومدی </span>
                </div>
                <div class="flex-center gap-2 bg-secondary p-4 rounded-3 mt-4">
                    <span class="fs-5 text-subtitle"> قبلا حساب کاربری داشتید؟ </span>
                    <a
                            href="{{URL}}login"
                            class="fs-5 py-1 px-2 rounded-3 flex-center bg-subtitle text-white"
                    >ورود</a
                    >
                </div>
                <div class="mt-4">
                    <form>
                        <div class="position-relative mb-1">
                            <input
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="text"
                                    placeholder="نام و نام خانوادگی" />
                            <i
                                    class="login-item-icon fas fa-face-smile text-subtitle fs-2 position-absolute"></i>
                        </div>
                        <div class="position-relative mb-1">
                            <input
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="text"
                                    placeholder="نام کاربری  " />
                            <i
                                    class="login-item-icon fas fa-user text-subtitle fs-2 position-absolute"></i>
                        </div>
                        <div class="position-relative mb-1">
                            <input
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="email"
                                    placeholder=" آدرس ایمیل " />
                            <i
                                    class="login-item-icon fas fa-message text-subtitle fs-2 position-absolute"></i>
                        </div>
                        <div class="position-relative mb-1">
                            <input
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="text"
                                    placeholder="شماره تماس" />
                            <i
                                    class="login-item-icon fas fa-phone text-subtitle fs-2 position-absolute"></i>
                        </div>
                        <div class="position-relative mb-2">
                            <input
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="password"
                                    placeholder=" گذرواژه " />
                            <i
                                    class="login-item-icon fas fa-eye text-subtitle fs-2 position-absolute"></i>
                        </div>
                        <div class="position-relative mb-2">
                            <input
                                    class="w-100 border-1 border border-gray rounded-2 py-3 px-4 fs-5 text-subtitle"
                                    type="password"
                                    placeholder=" تکرار گذرواژه " />
                            <i
                                    class="login-item-icon fas fa-lock-open text-subtitle fs-2 position-absolute"></i>
                        </div>
                        <div
                                class="mt-2 w-100 py-3 bg-primary rounded-3 flex-center text-white gap-2 fs-5 fw-bold">
                            <i class="fas fa-right-from-bracket"></i>
                            <span>ثبت نام</span>
                        </div>
                    </form>

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