@extends('pages.layouts.master',[
    'pageTitle'=>$category->title
])

@section('content')
<main>
    <div class="container my-9">
        <div class="p-shadow bg-white py-3 px-4 rounded-3">
            <div>
                <div
                        class="border position-relative border-1 border-silver gap-7 max-content flex-between rounded-2 py-2 px-3">
                    <span class="fs-5">مرتب سازی بر اساس پیش فرض </span>
                    <i class="fas fa-chevron-down fs-5"></i>
                    <ul
                            style="top: 110%; right: 0"
                            class="d-none position-absolute bg-white p-shadow w-100 p-3 z-3 rounded-bottom-4 border-4 border-bottom border-success">
                        <li class="fs-5 mt-3">مرتب سازی پیش فرض</li>
                        <li class="fs-5 mt-3">بر اساس محبوبیت</li>
                        <li class="fs-5 mt-3">بر اساس بیشترین امتیاز</li>
                        <li class="fs-5 mt-3">جدیدترین دوره ها</li>
                        <li class="fs-5 mt-3">مرتب سازی بر اسا گران ترین</li>
                        <li class="fs-5 mt-3">مرتب سازی براساس ارزان ترین</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card mt-5 rounded-5 overflow-hidden">
                        <div class="w-100">
                            <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}" class="w-100">
                                <img
                                        class="w-100"
                                        src="{{URL.$course->poster}}"/>
                            </a>
                        </div>
                        <div class="w-100 py-4 px-5">
                            <h2 class="mb-3">
                                <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}"
                                   class="fw-bold fs-4">
                                    {{$course->title}}
                                </a>
                            </h2>
                            <div class="flex-between">
                                <div class="text-subtitle fs-4">
                                    <i class="fas fa-chalkboard-user"></i>
                                    <a href="/teacher/show/{{$course->teacher_id}}/{{generateSlug($course->family)}}">{{$course->family}}</a>
                                </div>
                                <div>
                                    <img src="{{URL}}assets/images/star/star.svg"/>
                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                    <img src="{{URL}}assets/images/star/star_fill.svg"/>
                                </div>
                            </div>

                            <div class="mt-4 text-subtitle flex-start gap-2">
                                <i class="fas fa-user fs-4"></i>
                                <span class="fs-5">{{$course->students}}</span>
                            </div>

                            <div class="fs-4 mt-4 text-subtitle fw-bold">
                                <span>تخفیف :</span>
                                <span
                                >{{$course->discount}}
                            <span class="text-primary">درصد</span>
                          </span>
                            </div>

                            <div class="fs-4 mt-2 text-subtitle fw-bold">
                                <span>هزینه دوره :</span>
                                <span
                                >

                                                {{number_format($course->price*(1-$course->discount/100))}}
                            <span class="text-primary">تومان</span>
                          </span>
                            </div>
                        </div>
                        <div
                                class="w-100  border-top border-1 border-gray">
                            <a href="/course/show/{{$course->id}}/{{generateSlug($course->title)}}"
                               class="w-100 px-4 py-3 flex-center gap-3 fs-4">
                                <span>مشاهده اطلاعات</span>
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @php
            $currentPage=isset($_GET['page'])?$_GET['page']:1;
        @endphp
        <div class="pagination container flex-center mt-8">
            <ul class="pagination-list">
                @if($currentPage>1)
                    <li class="pagination-item">
                        <a href="?page={{$currentPage-1}}">
                            <i class="fas fa-right-long"></i>
                        </a>
                    </li>
                @endif
                @if($pages>1)
                    @for($i=1;$i<=$pages;$i++)
                        <li class="pagination-item {{$i==$currentPage ? 'active' : ''}}">
                            <a href="?page={{$i}}">{{$i}}</a>
                        </li>
                    @endfor
                @endif
                @if($currentPage<$pages)
                    <li class="pagination-item">
                        <a href="?page={{$currentPage+1}}">
                            <i class="fas fa-left-long"></i>
                        </a>

                    </li>
                @endif
            </ul>
        </div>
    </div>
</main>
@endsection
