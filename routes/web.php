<?php

use App\Models\User;
use App\Jobs\tryALog;
use App\Mail\CobaMail;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AjuanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\User\HolderHakciptaController;
use App\Http\Controllers\User\CreatorHakciptaController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\ApplicationTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\AjuanController as UserAjuanController;
use App\Http\Controllers\User\TemplateController as UserTemplateController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\Admin\TemplateController as AdminTemplateController;
use App\Http\Controllers\Admin\Parameter\HolderController as ParameterHolderController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('login', function () {
    //     return view('auth.login');
    // });
    
    // Route::group(['as' => 'auth.'], function (){
    Route::group(['middleware' => 'guest'], function (){
        Route::get('/', [LoginController::class, 'index'])->name('index');

        // forgot password
        Route::group(['controller' => ForgotPasswordController::class], function (){
            Route::get('/forgot-password', 'index')->name('password.request');
            Route::post('/forgot-password', 'handler')->name('password.email');
        });

        // reset password 
        Route::group(['controller' => ResetPasswordController::class], function (){
            Route::post('/reset-password', 'handler')->name('password.update');
            Route::get('/reset-password/{token}', 'index')->name('password.reset');
        });

        Route::group(['as' => 'auth.'], function (){
            Route::group(['prefix' => 'login', 'as' => 'login.', 'controller' => LoginController::class], function (){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'authenticate')->name('store');
            });
            Route::group(['prefix' => 'register', 'as' => 'register.', 'controller' => RegisterController::class], function (){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
            });
        });
    });
    
    Route::group(['middleware' => 'auth'], function (){

        Route::group(['middleware' => ['verified.not']], function (){
            // verify email
            Route::group(['controller' => VerifyEmailController::class], function (){
                Route::get('/email/verify', 'index')->name('verification.notice');
        
                Route::get('/email/verify/{id}/{hash}', 'handler')->middleware(['signed'])->name('verification.verify');
        
                Route::post('/email/verification-notification', 'resend')->middleware(['throttle:6,1'])->name('verification.send');
            });
        });


        Route::group(['as' => 'auth.'], function (){
            Route::post('/logout', function () {
                Auth::logout();
                return redirect()->route('auth.login.index');
            })->name('logout');
        });

        Route::group(['middleware' => ['verified']], function (){    
            Route::group(['as' => 'user.', 'middleware' => [UserRole::getMiddlewareUserRole()]], function (){
                Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    
                // profile
                Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller' => UserProfileController::class], function (){
                    Route::get('/', 'index')->name('index');
                    Route::post('/change-password', 'changePassword')->name('change-password');
                    Route::post('/change-detail', 'changeDetail')->name('change-detail');
                });
                
                // template
                Route::group(['prefix' => 'template', 'as' => 'template.', 'controller' => UserTemplateController::class], function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/download/{templateDocument:id}', 'download')->name('download');
                });
    
    
                
                // ajuan
                Route::group(['prefix' => 'ajuan', 'as' => 'ajuan.', 'controller' => UserAjuanController::class], function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/data', 'data')->name('data');
                    Route::post('/generate', 'generateAdd')->name('generateAdd');
                    Route::put('/{detailHakcipta}', 'store')->name('store');
                    Route::get('/add/{detailHakcipta}', 'create')->name('create');
                    Route::get('/edit/{detailHakcipta}', 'edit')->name('edit');
                    Route::get('/detail/{detailHakcipta}', 'show')->name('show');
                    Route::get('/log/{detailHakcipta}', 'log')->name('log');
                    Route::put('/update/{detailHakcipta}', 'update')->name('update');
                    Route::post('/generate/subjenis/{creationType}', 'generateSubjenis')->name('generateSubjenis');
    
                    // pencipta
                    Route::group(['prefix' => '{detailHakcipta}/pencipta', 'as' => 'pencipta.', 'controller' => CreatorHakciptaController::class], function () {
                        Route::post('/', 'store')->name('store');
                        Route::get('/add/', 'create')->name('create');
                        Route::post('/data/', 'data')->name('data');
                        Route::delete('/{creatorHakcipta}/', 'destroy')->name('destroy');
                        Route::get('/{creatorHakcipta}/edit/', 'edit')->name('edit');
                        Route::put('/{creatorHakcipta}/edit/', 'update')->name('update');
                        Route::post('/generate/district/{province}', 'generateDistrict')->name('generateDistrict');
                        Route::post('/generate/subdistrict/{district}', 'generateSubdistrict')->name('generateSubdistrict');
                    });
    
                    // pemegang
                    Route::group(['prefix' => '{detailHakcipta}/pemegang', 'as' => 'pemegang.', 'controller' => HolderHakciptaController::class], function () {
                        Route::post('/', 'store')->name('store');
                        Route::get('/add/', 'create')->name('create');
                        Route::post('/data/', 'data')->name('data');
                        Route::delete('/{holderHakcipta}/', 'destroy')->name('destroy');
                        Route::get('/{holderHakcipta}/edit/', 'edit')->name('edit');
                        Route::put('/{holderHakcipta}/edit/', 'update')->name('update');
                        Route::post('/generate/district/{province}', 'generateDistrict')->name('generateDistrict');
                        Route::post('/generate/subdistrict/{district}', 'generateSubdistrict')->name('generateSubdistrict');
                    });
                });
            });
    
            Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
                // admin & super admin
                Route::group(['middleware' => [UserRole::getMiddlewareSuperAdminAndAdminRole()]], function (){
                    
                    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

                    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller' => ProfileController::class], function (){
                        Route::get('/', 'index')->name('index');
                        Route::post('/change-password', 'changePassword')->name('change-password');
                    });
                    
                    Route::group(['prefix' => 'ajuan', 'as' => 'ajuan.', 'controller' => AjuanController::class], function (){
                        Route::get('/', 'index')->name('index');
                        Route::post('/data', 'data')->name('data');
                        Route::post('/{detailHakcipta}', 'store')->name('store');
                        Route::put('/{detailHakcipta}', 'finishAjuan')->name('finishAjuan');
                        Route::get('/check/{detailHakcipta}', 'create')->name('create');
                        Route::get('/detail/{detailHakcipta}', 'show')->name('show');
                        Route::post('/generate/subjenis/{creationType}', 'generateSubjenis')->name('generateSubjenis');

                        Route::group(['prefix' => '{detailHakcipta}/pencipta', 'as' => 'pencipta.'], function () {
                            Route::post('/data/', 'dataCreator')->name('data');
                        });

                        Route::group(['prefix' => '{detailHakcipta}/pemegang', 'as' => 'pemegang.'], function () {
                            Route::post('/data/', 'dataHolder')->name('data');
                        });
                    });
                    
                    // template
                    Route::group(['prefix' => 'template', 'as' => 'template.', 'controller' => AdminTemplateController::class], function () {
                        Route::get('/', 'index')->name('index');
                        Route::post('/', 'store')->name('store');
                        Route::get('/add', 'create')->name('create');
                        Route::post('/data', 'data')->name('data');
                        Route::put('/{templateDocument:id}', 'update')->name('update');
                        Route::delete('/{templateDocument:id}', 'destroy')->name('destroy');
                        Route::get('/{templateDocument:id}/edit', 'edit')->name('edit');
                    });
    
                    //application-type
                    Route::group(['prefix' => 'application-type', 'as' => 'application-type.', 'controller' => ApplicationTypeController::class], function () {
                        Route::get('/', 'index')->name('index');
                        Route::post('/', 'store')->name('store');
                        Route::get('/add', 'create')->name('create');
                        Route::post('/data', 'data')->name('data');
                        Route::put('/{applicationType:id}', 'update')->name('update');
                        Route::delete('/{applicationType:id}', 'destroy')->name('destroy');
                        Route::get('/{applicationType:id}/edit', 'edit')->name('edit');
                        Route::post('/restore/{applicationType}', 'restore')->name('restore');
                    });
    
                    // parameter
                    Route::group(['prefix' => 'parameter', 'as' => 'parameter.'], function (){
    
                        // Holder
                        Route::group(['prefix' => 'holder', 'as' => 'holder.', 'controller' => ParameterHolderController::class], function (){
                            Route::get('/', 'index')->name('index');
                            Route::post('/', 'store')->name('store');
                            Route::get('/add', 'create')->name('create');
                            Route::post('/data', 'data')->name('data');
                            Route::put('/{parameterHolder:id}/', 'update')->name('update');
                            Route::delete('/{parameterHolder:id}/', 'destroy')->name('destroy');
                            Route::get('/{parameterHolder:id}/edit/', 'edit')->name('edit');
                            Route::post('/generate/district/{province}', 'generateDistrict')->name('generateDistrict');
                            Route::post('/generate/subdistrict/{district}', 'generateSubdistrict')->name('generateSubdistrict');
                        });
                    });

                    // profile
                    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller' => AdminProfileController::class], function (){
                        Route::get('/', 'index')->name('index');
                        Route::post('/change-password', 'changePassword')->name('change-password');
                        Route::post('/change-detail', 'changeDetail')->name('change-detail');
                    });
                });
                
                // super admin
                Route::group(['middleware' => [UserRole::getMiddlewareSuperAdminRole()]], function (){
                    // manage-admin
                    Route::group(['prefix' => 'manage-admin', 'as' => 'manage-admin.', 'controller' => AdminController::class], function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/add', 'create')->name('create');
                        Route::post('/data', 'data')->name('data');
                        Route::post('/dataCreate', 'dataCreate')->name('dataCreate');
                        Route::post('/add/{user:id}', 'store')->name('store');
                        Route::delete('/{roleUser:id}', 'destroy')->name('destroy');
                    });
                });
            });
        });

    });
// });
