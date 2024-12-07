@extends('pages.layouts.master',[
    'pageTitle'=>$course->title
])
@section('content')

    <main>
        <div class="container course-details">
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
                                <a href="/course-category/index/{{$category->id}}/{{generateSlug($category->title)}}">{{$category->title}}</a>
                                <i class="fas fa-chevron-left mx-2 fs-5"></i>
                            </li>
                            <li class="fs-4 text-subtitle breadcrumb-item">
                                <a href="#">{{$course->title}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- //!Prev Course Video-->
                <div class="col-12 mt-6">
                    <div class="w-100 bg-white p-shadow p-4 rounded-4">
                        <div
                                class="row flex-column-reverse row-gap-5 row-gap-lg-0 flex-lg-row">
                            <div class="col-lg-6 col-12 d-flex flex-column">
                                <a class="course-tag max-content">آموزش
                                    {{$category->title}}
                                </a>
                                <a class="mt-2 fs-2 fw-bold">{{$course->title}}</a>
                                <p
                                        class="course-introduction text-subtitle fs-4 mt-4 line2 text-justify">
                                    {{$course->introduction}}
                                </p>
                                <div>
                                    <ul class="d-flex gap-3">
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
                            <div class="col-lg-6 col-12 flex-center">
                                <video
                                        class="course-video mw-100 rounded-4 overflow-hidden p-shadow object-fit-cover"
                                        poster="{{URL.$intro->poster}}"
                                        controls
                                        src="{{$intro->video}}"></video>
                            </div>
                        </div>
                    </div>
                </div>

                <!--! details Course -->
                <div class="col-12 mt-6">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div
                                            class="bg-white p-shadow p-4 d-flex align-items-center gap-4 rounded-2">
                                        <div>
                                            <i
                                                    class="fas fa-graduation-cap fs-big text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <span class="fs-4 fw-bold mb-2">وضعیت دوره: </span>
                                            <span class="fs-5">{{$course->course_status}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div
                                            class="bg-white p-shadow p-4 d-flex align-items-center gap-4 rounded-2">
                                        <div>
                                            <i
                                                    class="fas fa-graduation-cap fs-big text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <span class="fs-4 fw-bold mb-2"> مدت زمان دوره:  </span>
                                            <span class="fs-5">
                                            {{$course->course_time}}
                                            دقیقه</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div
                                            class="bg-white p-shadow p-4 d-flex align-items-center gap-4 rounded-2">
                                        <div>
                                            <i
                                                    class="fas fa-graduation-cap fs-big text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <span class="fs-4 fw-bold mb-2">  آخرین بروزرسانی:  </span>
                                            <span class="fs-5">
                                            {{to_jalali_relative($course->update_at)}}
</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div
                                            class="bg-white p-shadow p-4 d-flex align-items-center gap-4 rounded-2">
                                        <div>
                                            <i
                                                    class="fas fa-graduation-cap fs-big text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <span class="fs-4 fw-bold mb-2">روش پشتیبانی : </span>
                                            <span class="fs-5">
                                            {{$course->support}}
 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div
                                            class="bg-white p-shadow p-4 d-flex align-items-center gap-4 rounded-2">
                                        <div>
                                            <i
                                                    class="fas fa-graduation-cap fs-big text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <span class="fs-4 fw-bold mb-2">پیش نیاز دوره : </span>
                                            <span class="fs-5">{{$course->pishniaz}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div
                                            class="bg-white p-shadow p-4 d-flex align-items-center gap-4 rounded-2">
                                        <div>
                                            <i
                                                    class="fas fa-graduation-cap fs-big text-primary"></i>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <span class="fs-4 fw-bold mb-2">نوع مشاهده : </span>
                                            <span class="fs-5"> {{$course->view_type}} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //!progress Section -->
                            <div class="row mt-4">
                                <div class="w-100 py-6 rounded-4 px-4 bg-secondary">
                                    <div class="fs-4 fw-bold mb-3 text-subtitle">
                                        <i class="fas fa-chart-bar"></i>
                                        <span
                                        >درصد پیشرفت دوره :
                        <span class="fw-bold">{{$course->progress}}
                            %</span>
                      </span>
                                    </div>
                                    <div
                                            class="progress"
                                            role="progressbar"
                                            aria-label="Animated striped example"
                                            aria-valuenow="{{$course->progress}}"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        <div
                                                class="progress-bar progress-bar-striped progress-bar-animated"
                                                style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- //!Description -->
                            <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                                <h1 class="title-structuring title-header">
                                    {{$course->title}}
                                </h1>
                                <div class="w-100 my-5">
                                    <img
                                            class="mw-100 rounded-3"
                                            src="{{URL}}assets/images/course/fontend.webp"/>
                                </div>
                                <h2 class="title-structuring title-header mb-4">
                                    در این دوره چی یاد میگیریم؟
                                </h2>
                                <p class="fs-4 text-subtitle line2 text-justify">
                                    {{$course->description}}
                                </p>
                            </div>

                            <!--! //Video -->
                            <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                                <div class="d-flex gap-3">
                    <span
                            class="border border-1 border-primary text-primary flex-center fs-5 py-3 px-2 rounded-2"
                    >برای دانلود یا تماشای ویدیوها ابتدا دوره را خریداری کنید!
                    </span>
                                    <span
                                            class="border border-1 border-primary text-primary flex-center fs-5 py-3 px-2 rounded-2">
                      قبلا خریداری کرده اید؟ وارد حساب کاربری خود شوید
                    </span>
                                </div>
                                <div class="mt-6">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach($videos as $video)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button
                                                            class="accordion-button fs-3 fw-bold"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapse{{$i}}"
                                                            aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapse{{$i}}">
                                                        {{$video->title}}
                                                    </button>
                                                </h2>
                                                <div
                                                        id="panelsStayOpen-collapse{{$i}}"
                                                        class="accordion-collapse collapse show">
                                                    <div class="accordion-body">
                                                        <ul class="py-4 d-flex flex-column gap-6">
                                                            @php
                                                            $num=1;
                                                            @endphp
                                                            @foreach($video->childs as $child)
                                                            <li class="flex-between w-100 ">
                                                                <div class="flex-start gap-3 text-subtitle">
                                  <span
                                          class="course-video--number flex-center fs-5 border border-1 border-gray rounded-circle p-1">
                                    {{$num}}
                                  </span>
                                                                    <i class="fa-brands fa-youtube"></i>

                                                                    <a href="{{$child->video}}" class="fs-4"
                                                                    >
                                                                       {{$child->title}}
                                                                    </a
                                                                    >
                                                                </div>
                                                                <div class="text-subtitle">
                                                                    <i class="fas fa-lock"></i>
                                                                </div>
                                                            </li>
                                                                @php
                                                            $num++;
                                                        @endphp
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- //!Teacher -->
                            <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                                <div class="flex-between">
                                    <div class="flex-start gap-3">
                                        <div
                                                class="course-teacher-img rounded-circle overflow-hidden">
                                            <img
                                                    class="w-100 h-100"
                                                    src="{{URL.$teacher->image_src}}"/>
                                        </div>
                                        <div class="d-flex flex-column text-subtitle">
                                            <a class="fw-bold">{{$teacher->family}}</a>
                                            <span class="fs-5">{{$teacher->special}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a
                                                href="#"
                                                class="border border-1 border-primary rounded-3 flex-center py-1 px-6 text-primary"
                                        >مدرس</a
                                        >
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fs-4 line2 text-subtitle text-justify ellipsis-3">
                                        {{$teacher->introduction}}                                    </p>
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
                                <!-- //!Add To Basket -->
                                <form action="{{URL}}cart" method="POST">
                                    <input type="hidden" name="product_id" value="{{$course->id}}">
                                    <input type="hidden" name="product_type" value="course">

                                    <div class="bg-white p-shadow p-7 rounded-4">
                                    <button
                                            class="bg-primary py-3 w-100 rounded-3 text-white gap-2 fw-bold flex-center">
                                        <i class="fas fa-graduation-cap"></i>
                                        <span>افزودن به سبد خرید</span>
                                    </button>
                                </div>
                                </form>
                                <!-- //!CourseInfo -->
                                <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                                    <div
                                            class="border border-1 border-primary w-100 p-3 rounded-2 flex-center gap-2">
                                        <i class="fas fa-user-graduate text-title fs-2"></i>
                                        <span class="text-subtitle">تعداد دانشجو :</span>
                                        <span
                                                class="p-2 bg-secondary rounded-2 flex-center fs-5 text-subtitle"
                                        >
                                        {{$course->students}}
                                    </span
                                    >
                                    </div>
                                    <div class="flex-between mt-4">
                                        <div class="flex-start gap-3 fs-5 text-subtitle">
                                            <i class="fas fa-comment"></i>
                                            <span>
                          <span>0</span>
                          دیدگاه
                        </span>
                                        </div>
                                        <div class="bg-title course-line"></div>
                                        <div class="flex-start gap-3 fs-5 text-subtitle">
                                            <i class="fas fa-comment"></i>
                                            <span>
                          <span>
                              {{$course->views}}
                          </span>
                          بازدید
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- //!Short Link -->
                                <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                                    <div class="flex-start gap-2 text-subtitle fs-4">
                                        <i class="fas fa-link"></i>
                                        <span>لینک کوتاه</span>
                                    </div>
                                    <div
                                            class="mt-4 border border-1 border-gray rounded-2 flex-center text-subtitle fs-5 py-2">
                                        <span> {{$course->shortlink}} </span>
                                    </div>
                                </div>
                                <!-- //!category  -->
                                <div class="bg-white p-shadow p-7 rounded-4 mt-6">
                                    <div class="flex-start gap-2 text-subtitle fs-4">
                                        <i class="fas fa-video"></i>
                                        <span> دوره های مرتبط </span>
                                    </div>
                                    <div class="mt-4">
                                        <ul>
                                            @foreach($course_Categories as $row)
                                            <li class="mt-3">
                                                <a href="/course/show/{{$row->id}}/{{generateSlug($row->title)}}" class="w-100 flex-start gap-2">
                                                    <img
                                                            class="course-category-img rounded-2"
                                                            width="75px"
                                                            src="{{URL.$row->poster}}"/>
                                                    <span class="text-subtitle fs-5"
                                                    >
                                                        {{$row->title}}
                            </span>
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
        </div>
    </main>

@endsection