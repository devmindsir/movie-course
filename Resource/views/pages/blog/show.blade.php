@extends('pages.layouts.master',[
    'pageTitle'=>$blog->title
])

@section('content')
<main>
    <div class="container mt-3">
        <div class="row">
            <!-- //!breadcrumb -->
            <div class="col-12">
                <div
                        class="w-100 breadcrumb bg-secondary py-3 px-5 rounded-4 flex-start gap-5">
              <span class="flex-center p-3 bg-white rounded-3">
                <i class="fas fa-home fs-5"></i>
              </span>
                    <ul class="flex-start">
                        <li class="fs-4 text-subtitle breadcrumb-item">
                            <a href="#">خانه</a>
                            <i class="fas fa-chevron-left mx-2 fs-5"></i>
                        </li>
                        <li class="fs-4 text-subtitle breadcrumb-item">
                            <a href="/blog-category/index/{{$category->id}}/{{generateSlug($category->title)}}">{{$category->title}}</a>
                            <i class="fas fa-chevron-left mx-2 fs-5"></i>
                        </li>
                        <li class="fs-4 text-subtitle breadcrumb-item">
                            <a href="#">{{$blog->title}} </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-lg-8">
                    <!--! //Blog Details -->
                    <div class="p-shadow p-6 rounded-3 bg-white">
                        <h1 class="fs-2">{{$blog->title}}</h1>
                        <div class="my-4">
                            <ul class="flex-start gap-3">
                                <li class="text-subtitle fs-5 flex-start gap-2">
                                    <i class="fas fa-folder"></i>
                                    <a href="/blog-category/index/{{$category->id}}/{{generateSlug($category->title)}}">{{$category->title}}</a>
                                </li>
                                <li class="text-subtitle fs-5 flex-start gap-2">
                                    <i class="fas fa-user"></i>
                                    <a href="/author/show/{{$author->id}}/{{generateSlug($author->family)}}">{{$author->family}}</a>
                                </li>
                                <li class="text-subtitle fs-5 flex-start gap-2">
                                    <i class="fas fa-clock"></i>
                                    <span>{{$blog->create_at}}</s>
                                </li>
                                <li class="text-subtitle fs-5 flex-start gap-2">
                                    <i class="fas fa-eye"></i>
                                    <span>{{$blog->views}}
                        بازدید
                      </span>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-center my-4">
                            <img class="w-75 object-fit-cover rounded-4" src="{{URL}}assets/images/blog/360.webp">
                        </div>
                        <div class="description">
                            <p class="text-subtitle text-justify fs-4 line2">{{$blog->description}}</p>
                            <ul class="d-flex gap-3 mt-4">
                                <li>اشتراک گذاری :</li>
                                <li class="fs-1 text-subtitle">
                                    <a>
                                        <i class="fa-brands fa-telegram"></i>
                                    </a>
                                </li>
                                <li class="fs-1 text-subtitle">
                                    <a>
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="fs-1 text-subtitle">
                                    <a>
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="fs-1 text-subtitle">
                                    <a>
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- //! Next/Prev Blog -->
                    <div class="p-shadow p-6 rounded-3 bg-white mt-5">
                        <div class="flex-between gap-4">
                            <div class="d-flex flex-column gap-3">
                                <span class="text-subtitle fs-5">مطالب قدیمی تر</span>
                                <a class="fs-4 text-subtitle" href="">برای یادگیری برنامه نویسی چجوری برنامه ریزی کنیم؟ </a>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <span class="text-subtitle fs-5">مطالب جدید تر</span>
                                <a class="fs-4 text-subtitle" href="">برای یادگیری برنامه نویسی چجوری برنامه ریزی کنیم؟ </a>
                            </div>
                        </div>
                    </div>
                    <!-- //!comment -->
                    <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                        <div
                                class="d-flex justify-content-center align-items-center gap-2 fw-bold">
                            <i class="fas fa-comment text-primary"></i>
                            <span class="text-subtitle">
                                    برای این دوره
                                    <span class="text-primary mx-1">0</span>
                                    کامنت ارسال شده است
                                  </span>
                        </div>
                        <div class="mt-4">
                            <h3>دیدگاهتان را بنویسید</h3>
                            <p class="text-subtitle mt-3">
                                لطفا برای نوشتن نظرخودتون
                                <a class="fw-bold">وارد سیستم شوید </a>
                                اکانت ندارید؟
                                <a class="fw-bold"> ثبت نام کنید </a>
                            </p>
                            <span>دیدگاه*</span>
                            <textarea
                                    class="w-100 border border-1 my-3 border-gray rounded-2 p-4 course-comment-description"
                                    placeholder="تا زمانی که وارد سیستم نشده اید نمیتوانید چیزی بنویسید">
                                  </textarea>
                            <button class="btn-primary">فرستادن دیدگاه</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="position-sticky top-0">
                        <!-- //!category  -->
                        <div class="bg-white p-shadow p-7 rounded-4 overflow-hidden">
                            <div class="flex-start gap-2 text-subtitle fs-4">
                                <span class="title-square">آخرین دوره ها</span>
                            </div>
                            <div class="mt-4">
                                <ul>
                                    @foreach($courses as $course)
                                    <li class="mt-3">
                                        <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}" class="w-100 flex-start gap-2">
                                            <img
                                                    class="course-category-img rounded-2"
                                                    width="75px"
                                                    src="{{URL.$course->poster}}" />
                                            <span class="text-subtitle fs-5"
                                            >{{$course->title}}
                            </span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- //!access -->
                        <div class="bg-white p-shadow p-7 rounded-4 mt-6 overflow-hidden">
                            <div class="flex-start gap-2 text-subtitle fs-4">
                                <span class="title-square">دسترسی سریع</span>
                            </div>
                            <div class="mt-6">
                                <ul>
                                    @foreach($all_categories as $category)
                                    <li class="py-3 border-bottom border-1 border-gray">
                                        <a class="flex-start gap-2 text-subtitle">
                                            <i class="fas fa-chevron-left fs-5"></i>
                                            <span class="fs-4">{{$category->title}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection