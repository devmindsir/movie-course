@extends('pages.layouts.master')
@section('content')
    <main>
        <div class="container my-9">
            <div class="p-shadow bg-white py-3 px-4 rounded-3">
                <div class="row">
                    <div class="col-5 d-flex gap-4 align-items-center">
                        <img
                                class="border border-2 object-fit-cover border-gray rounded-4 overflow-hidden"
                                width="200px"
                                height="200px"
                                src="{{URL.$teacher->image_src}}"/>
                        <div class="d-flex flex-column gap-3">
                            <h1 class="title-structuring fs-3">{{$teacher->family}}</h1>
                            <div class="flex-start gap-2">
                                <i class="fas fa-code text-primary"></i>
                                <span class="fw-bold fs-4">{{$teacher->special}}</span>
                            </div>
                            <div class="flex-start gap-2">
                                <i class="fas fa-code text-primary"></i>
                                <div class="fs-4 flex-start gap-3">
                                    <span>تاریخ عضویت:</span>
                                    <span class="text-subtitle">{{$teacher->create_at}}</span>
                                </div>
                            </div>
                            <div class="flex-start gap-2">
                                <i class="fas fa-code text-primary"></i>
                                <div class="fs-4 flex-start gap-3">
                                    <span>تعداد بازدید دوره ها:</span>
                                    <span class="text-subtitle">{{$views}}</span>
                                </div>
                            </div>
                            <div class="flex-start gap-2">
                                <i class="fas fa-code text-primary"></i>
                                <div class="fs-4 flex-start gap-3">
                                    <span>تعداد دوره ها:</span>
                                    <span class="text-subtitle">{{$counts}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <h2 class="title-structuring">درباره مدرس :</h2>
                        <p class="text-subtitle mt-5 line2 text-justify width-18 fs-4">
                            {{$teacher->introduction}}
                        </p>
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
                                        <a href="/teacher/show/{{$course->teacher_id}}/{{generateSlug($teacher->family)}}">{{$teacher->family}}</a>
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
