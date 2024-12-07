@php
    use App\Models\Blog;
    use App\Models\Courses;
    use App\Models\Options;

    $options=Options::getOptions();
    $blogs=Blog::lastBlogs();
    $courses=Courses::lastCourses();

@endphp

<footer class="mt-9 container-fluid">
    <div class="w-100 container bg-secondary p-4 rounded-3">
        <div class="row p-3 justify-content-center row-gap-4 row-gap-lg-0">
            <div class="col-lg-4 col-12">
                <h3 class="footer-title">درباره ما</h3>
                <p class="mt-7 fs-5 text-subtitle footer-description">
                    {{$options['aboutus']}}
                </p>
            </div>
            <div class="col-lg-4 col-12 col-sm-6">
                <h3 class="footer-title">آخرین مطالب</h3>
                <ul class="mt-7">
                    @foreach($blogs as $blog)
                    <li class="text-subtitle fs-4 mt-5">
                        <a href="#">{{$blog->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-12 col-sm-6">
                <h3 class="footer-title">دسترسی سریع به دوره ها</h3>
                <ul class="mt-7">
                    @foreach($courses as $course)
                    <li class="text-subtitle fs-4 mt-5">
                        <a href="#">{{$course->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-8 bg-secondary w-100 flex-center py-4">
        کلیه حقوق برای آکادمی آموزش برنامه نویسی توسعه دهندگان ذهن محفوظ است.
    </div>
</footer>

<!--  TOAST-->
@if(toast('message'))
    <section id="toast-section" class="position-fixed" style="top: 2rem; left: 2rem; z-index: 9999;">
        <div id="toast-container" class="toast-container">
            <div id="toast" class="toast-elm mb-1 text-white flex-center px-4 py-3 gap-3 rounded-2
            {{ toast('status') === 'success' ? 'bg-success' : 'bg-danger' }}">
                <div class="toast-bar"></div>
                <i class="{{toast('status') === 'success' ? 'fas fa-check' : 'fas fa-times' }}"></i>
                <span id="toast-message">{{toast('message')}}</span>
            </div>
        </div>
    </section>
@endif
@stack('Thubnails')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL}}assets/js/jquery/jquery.min.js"></script>
<script src="{{URL}}assets/js/menu.js"></script>
<script src="{{URL}}assets/js/navbar.js"></script>
<script src="{{URL}}assets/js/toast.js"></script>

@stack('script')

</body>
</html>
