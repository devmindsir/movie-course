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
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card mt-5 rounded-5 overflow-hidden">
                        <div class="w-100 p-4">
                            <a href="/blog/show/{{$blog->id}}/{{generateSlug($blog->title)}}" class="w-100 d-flex">
                                <img
                                        class="w-100 rounded-3"
                                        src="{{URL.$blog->image}}"/>
                            </a>
                            <h2 class="fs-4 my-4">
                                {{$blog->title}}
                            </h2>
                            <p class="fs-5 text-subtitle ellipsis-2 mb-4">
                                {{$blog->description}}
                            </p>
                            <a href="/blog/show/{{$blog->id}}/{{generateSlug($blog->title)}}"
                               class="py-2 rounded-1 px-4 flex-center border border-1 border-primary text-primary fs-5 fw-bold"
                            >بیشتر بخوانید</a
                            >
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
        </div>    </div>
</main>
@endsection
