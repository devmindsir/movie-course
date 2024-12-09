<?php


//!USE
use App\Http\controllers\CheckoutController;
use App\Http\controllers\DoneController;
use App\Http\controllers\ForgetController;
use App\Http\controllers\IndexController;
use App\Http\controllers\CourseController;
use App\Http\controllers\LoginController;
use App\Http\controllers\OTPController;
use App\Http\controllers\PayController;
use App\Http\controllers\PostController;
use App\Http\controllers\ProductController;
use App\Http\controllers\RegisterController;
use App\Http\controllers\TeacherController;
use App\Http\controllers\CourseCategoryController;
use App\Http\controllers\BlogController;
use App\Http\controllers\BlogCategoryController;
use App\Http\controllers\AuthorController;
use App\Http\controllers\CartController;
use App\Http\controllers\TestController;


//!ROOT
$router->get('/', [IndexController::class, 'index']);

//!Course
$router->get('/course/show/{id}/{slug}', [CourseController::class, 'show']);

//!Teacher
$router->get('/teacher/show/{id}/{slug}', [TeacherController::class, 'show']);

//!Course_Category
$router->get('/course-category/index/{id}/{slug}', [CourseCategoryController::class, 'index']);

//!BLOG
$router->get('/blog/show/{id}/{slug}', [BlogController::class, 'show']);

//!Blog-Category
$router->get('/blog-category/index/{id}/{slug}', [BlogCategoryController::class, 'index']);

//!Author
$router->get('/author/show/{id}/{slug}', [AuthorController::class, 'show']);

//!Product
$router->get('/product/show/{id}/{slug}', [ProductController::class, 'show']);

//!CART
$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart', [CartController::class, 'store']);
$router->post('/cart/delete', [CartController::class, 'delete']);

//!POST
$router->get('/post', [PostController::class, 'index'])->auth('login');
$router->post('/post', [PostController::class, 'create'])->auth('login');

//!REGISTER
$router->get('/register', [RegisterController::class, 'index'])->auth('guest');
$router->post('/register', [RegisterController::class, 'store'])->auth('guest');

//!OTP
$router->get('/otp', [OTPController::class, 'index'])->auth('guest');
$router->post('/otp', [OTPController::class, 'store'])->auth('guest');

//!LOGIN
$router->get('/login', [LoginController::class, 'index'])->auth('guest');
$router->post('/login', [LoginController::class, 'store'])->auth('guest');

//!FORGET
$router->get('/forget', [ForgetController::class, 'index'])->auth('guest');
$router->post('/forget', [ForgetController::class, 'create'])->auth('guest');


//!LOGOUT
//$router->delete('/login', [LoginController::class, 'destroy'])->auth('login');

//!Checkout
$router->get('/checkout', [CheckoutController::class, 'index'])->auth('login');
$router->post('/checkout', [CheckoutController::class, 'create'])->auth('login');

//!PAY
$router->post('/pay', [PayController::class, 'pay'])->auth('login');
$router->post('/pay/callback', [PayController::class, 'callback'])->auth('login');

//!done
$router->get('/done/show/{id}', [DoneController::class, 'show'])->auth('login');


//!Test
$router->get('/test', [TestController::class, 'index']);

