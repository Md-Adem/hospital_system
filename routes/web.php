<?php

use App\Models\NewsBar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\NewsBarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\NationalitiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// this means that if the user is guest direct him to login page
// if the user is not a guset skip the login page
Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(['middleware' => ['auth']], function () {

    // =========================== Dashboard ===========================
    route::get('/home', [HomeController::class, 'index'])->name('home');
    route::get('/index', [HomeController::class, 'index']);
    route::get('/accordion', [HomeController::class, 'accordion']);
    route::get('/alerts', [HomeController::class, 'alerts']);
    route::get('/avatar', [HomeController::class, 'avatar']);
    route::get('/background', [HomeController::class, 'background']);
    route::get('/badge', [HomeController::class, 'badge']);
    route::get('/blog', [HomeController::class, 'blog']);
    route::get('/border', [HomeController::class, 'border']);
    route::get('/breadcrumbs', [HomeController::class, 'breadcrumbs']);
    route::get('/buttons', [HomeController::class, 'buttons']);
    route::get('/calendar', [HomeController::class, 'calendar']);
    route::get('/cards', [HomeController::class, 'cards']);
    route::get('/carousel', [HomeController::class, 'carousel']);
    route::get('/chartchartjs', [HomeController::class, 'chartchartjs']);
    route::get('/chartechart', [HomeController::class, 'chartechart']);
    route::get('/chartflot', [HomeController::class, 'chartflot']);
    route::get('/chartmorris', [HomeController::class, 'chartmorris']);
    route::get('/chartsparkpeity', [HomeController::class, 'chartsparkpeity']);
    route::get('/chat', [HomeController::class, 'chat']);
    route::get('/collapse', [HomeController::class, 'collapse']);
    route::get('/contacts', [HomeController::class, 'contacts']);
    route::get('/counters', [HomeController::class, 'counters']);
    route::get('/cryptobuysell', [HomeController::class, 'cryptobuysell']);
    route::get('/cryptocurrencyexchange', [HomeController::class, 'cryptocurrencyexchange']);
    route::get('/cryptodashbaord', [HomeController::class, 'cryptodashbaord']);
    route::get('/cryptomarket', [HomeController::class, 'cryptomarket']);
    route::get('/cryptotranscations', [HomeController::class, 'cryptotranscations']);
    route::get('/cryptowallet', [HomeController::class, 'cryptowallet']);
    route::get('/dangermessage', [HomeController::class, 'dangermessage']);
    route::get('/darggablecard', [HomeController::class, 'darggablecard']);
    route::get('/display', [HomeController::class, 'display']);
    route::get('/dropdown', [HomeController::class, 'dropdown']);
    route::get('/ecommerceaccount', [HomeController::class, 'ecommerceaccount']);
    route::get('/ecommercecart', [HomeController::class, 'ecommercecart']);
    route::get('/ecommercecheckout', [HomeController::class, 'ecommercecheckout']);
    route::get('/ecommercedashboard', [HomeController::class, 'ecommercedashboard']);
    route::get('/ecommerceorders', [HomeController::class, 'ecommerceorders']);
    route::get('/ecommerceproductdetails', [HomeController::class, 'ecommerceproductdetails']);
    route::get('/ecommerceproducts', [HomeController::class, 'ecommerceproducts']);
    route::get('/empty', [HomeController::class, 'empty']);
    route::get('/extras', [HomeController::class, 'extras']);
    route::get('/faq', [HomeController::class, 'faq']);
    route::get('/flex', [HomeController::class, 'flex']);
    route::get('/forgot', [HomeController::class, 'forgot']);
    route::get('/formadvanced', [HomeController::class, 'formadvanced']);
    route::get('/formeditor', [HomeController::class, 'formeditor']);
    route::get('/formelements', [HomeController::class, 'formelements']);
    route::get('/formlayouts', [HomeController::class, 'formlayouts']);
    route::get('/formvalidation', [HomeController::class, 'formvalidation']);
    route::get('/formwizards', [HomeController::class, 'formwizards']);
    route::get('/gallery', [HomeController::class, 'gallery']);
    route::get('/height', [HomeController::class, 'height']);
    route::get('/icons01', [HomeController::class, 'icons01']);
    route::get('/icons02', [HomeController::class, 'icons02']);
    route::get('/icons03', [HomeController::class, 'icons03']);
    route::get('/icons04', [HomeController::class, 'icons04']);
    route::get('/icons05', [HomeController::class, 'icons05']);
    route::get('/icons06', [HomeController::class, 'icons06']);
    route::get('/icons07', [HomeController::class, 'icons07']);
    route::get('/icons08', [HomeController::class, 'icons08']);
    route::get('/icons09', [HomeController::class, 'icons09']);
    route::get('/icons10', [HomeController::class, 'icons10']);
    route::get('/icons11', [HomeController::class, 'icons11']);
    route::get('/invoice', [HomeController::class, 'invoice']);
    route::get('/listgroup', [HomeController::class, 'listgroup']);
    route::get('/lockscreen', [HomeController::class, 'lockscreen']);
    route::get('/mailinbox', [HomeController::class, 'mailinbox']);
    route::get('/mapmapel', [HomeController::class, 'mapmapel']);
    route::get('/mapvector', [HomeController::class, 'mapvector']);
    route::get('/margin', [HomeController::class, 'margin']);
    route::get('/mediaobject', [HomeController::class, 'mediaobject']);
    route::get('/modals', [HomeController::class, 'modals']);
    route::get('/navigation', [HomeController::class, 'navigation']);
    route::get('/padding', [HomeController::class, 'padding']);
    route::get('/pagination', [HomeController::class, 'pagination']);
    route::get('/popover', [HomeController::class, 'popover']);
    route::get('/position', [HomeController::class, 'position']);
    route::get('/pricing', [HomeController::class, 'pricing']);
    route::get('/profile', [HomeController::class, 'profile']);
    route::get('/progress', [HomeController::class, 'progress']);
    route::get('/rating', [HomeController::class, 'rating']);
    route::get('/reset', [HomeController::class, 'reset']);
    route::get('/search', [HomeController::class, 'search']);
    route::get('/signin', [HomeController::class, 'signin']);
    route::get('/signup', [HomeController::class, 'signup']);
    route::get('/spinners', [HomeController::class, 'spinners']);
    route::get('/successmessage', [HomeController::class, 'successmessage']);
    route::get('/sweetalert', [HomeController::class, 'sweetalert']);
    route::get('/tablebasic', [HomeController::class, 'tablebasic']);
    route::get('/tabledata', [HomeController::class, 'tabledata']);
    route::get('/tags', [HomeController::class, 'tags']);
    route::get('/thumbnails', [HomeController::class, 'thumbnails']);
    route::get('/timeline', [HomeController::class, 'timeline']);
    route::get('/toast', [HomeController::class, 'toast']);
    route::get('/tooltip', [HomeController::class, 'tooltip']);
    route::get('/typography', [HomeController::class, 'typography']);
    route::get('/underconstruction', [HomeController::class, 'underconstruction']);
    route::get('/userlist', [HomeController::class, 'userlist']);
    route::get('/viewmail', [HomeController::class, 'viewmail']);
    route::get('/warningmessage', [HomeController::class, 'warningmessage']);
    route::get('/widgets', [HomeController::class, 'widgets']);
    route::get('/width', [HomeController::class, 'width']);
    route::get('/error404', [HomeController::class, 'error404']);
    route::get('/error500', [HomeController::class, 'error500']);
});

Route::group(['middleware' => ['auth']], function () {

    // =========================== Dashboard ===========================

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // =========================== Sections ===========================

    Route::resource('sections', SectionsController::class);


    // =========================== Users & Roles & Profile ===========================

    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('profile', ProfileController::class);


    // =========================== Nationalities ===========================

    Route::resource('nationalities', NationalitiesController::class);


    // =========================== NewsBars ===========================

    Route::resource('newsBar', NewsBarController::class);


    // =========================== Doctors ===========================

    Route::resource('doctors', DoctorsController::class);


    // =========================== DoctorSearch ===========================

    Route::get('DoctorSearch', function () {
        $NewsBars = NewsBar::all();
        return view('doctors.DoctorSearch', compact('NewsBars'));
    });


    // =========================== Appointments ===========================

    Route::resource('appointments', AppointmentsController::class);


    // =========================== Employees ===========================

    Route::resource('employees', EmployeesController::class);
});
