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
                            src="{{URL.$author->image_src}}" />
                    <div class="d-flex flex-column gap-3">
                        <h1 class="title-structuring fs-3">{{$author->family}}</h1>
                        <div class="flex-start gap-2">
                            <i class="fas fa-code text-primary"></i>
                            <div class="fs-4 flex-start gap-3">
                                <span>تاریخ عضویت:</span>
                                <span class="text-subtitle">{{to_jalali($author->create_at)}}</span>
                            </div>
                        </div>
                        <div class="flex-start gap-2">
                            <i class="fas fa-code text-primary"></i>
                            <div class="fs-4 flex-start gap-3">
                                <span>تعداد بازدید مقالات :</span>
                                <span class="text-subtitle">{{$views}}</span>
                            </div>
                        </div>
                        <div class="flex-start gap-2">
                            <i class="fas fa-code text-primary"></i>
                            <div class="fs-4 flex-start gap-3">
                                <span>تعداد مقالات:</span>
                                <span class="text-subtitle">{{$counts}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <h2 class="title-structuring">درباره نویسنده :</h2>
                    <p class="text-subtitle mt-5 line2 text-justify width-18 fs-4">{{$author->introduction}}
                        </p>
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
        </div>
    </div>
</main>
@endsection
