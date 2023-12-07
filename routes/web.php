<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::user()) {
        return view('containers.login');
    } elseif (Auth::user()) {
        $user = Auth::user();
        if ((int) $user->role_id == 1) {
            return redirect(route('client.dashboard'));
        } else {
            return redirect(route('admin.dashboard'));
        }
    }
});

Route::controller(PagesController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::middleware('auth')->group(function () {
        Route::get('/support', 'support')->name('client.support');
        Route::get('/client', 'client')->name('client.dashboard');
        Route::get('/client/tests', 'tests')->name('client.tests');
        Route::get('/test-results/{id}', 'test_results')->name(
            'client.test-results'
        );
        Route::get('/competetion-results/{id}', 'competetion_results')->name(
            'client.competetion-results'
        );
        Route::get('/test-details/{id}', 'test_details')->name(
            'client.test-details'
        );
        Route::get('/literature', 'literature')->name('client.literature');
        Route::get('/test/{id}', 'test')->name('client.test');
        Route::get('/statistic', 'statistic')->name('client.statistic');
        Route::get('/learning/{id}', 'learning_material')->name(
            'client.learning_material'
        );
    });
});
Route::post('/test/start-again', [UserController::class, 'startAgain'])->name(
    'test.start.again'
);
Route::post('/competetion/start-again/{id}', [UserController::class, 'startAgainCompetetion'])->name(
    'competetion.start.again'
);

Route::post('/literature/change/{id}', [
    UserController::class,
    'changeLiterature',
]);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.post');

/**************************** Admin ****************************/

Route::middleware(AdminMiddleware::class)->group(function () {
    /********************** Admin Pages ********************/

    Route::controller(AdminPagesController::class)->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/dashboard', 'admin_dashboard')->name(
                'admin.dashboard'
            );
            Route::get('/users', 'users')->name('admin.users');
            Route::post('/users/findById', 'findUserById')->name('admin.users.findUserById');
            Route::post('/users/findByName', 'findUserByName')->name('admin.users.findUserByName');
            Route::get('/messages', 'messages')->name('admin.messages');
            Route::get('/tests/create', 'tests_create')->name(
                'admin.tests.create'
            );
            Route::get('/tests/create_auto', 'tests_create_auto')->name(
                'admin.tests.create-auto'
            );
            Route::get('/tests', 'tests')->name('admin.tests');
            Route::get('/test/edit/{id}', 'edit_test')->name('admin.test.edit');
            Route::get('/tests_constructor/{id}', 'tests_constructor')->name(
                'admin.tests.constructor'
            );
            Route::get(
                '/competetion_constructor',
                'competetion_constructor'
            )->name('admin.competetion.constructor');
            Route::post(
                '/competetion_constructor',
                'competetion_constructor_auto_create'
            )->name('admin.competetion.constructor.auto_create');

            Route::get('/positions', 'positions')->name('admin.positions');
            Route::get('/reposts', 'reposts')->name('admin.reposts');
            Route::get('/literature', 'literature')->name('admin.literature');
            Route::get('/edit_literature/{id}', 'editLiterature')->name(
                'admin.edit-literature'
            );
            Route::get('/roles', 'adminRoles')->middleware("superAdmin")->name('admin.edit-literature');
        });
    });

    /********************** Admin Pages ********************/

    /********************** Admin Functionality ******************/

    Route::controller(AdminController::class)->group(function () {
        Route::post('/users/create', 'createUser')->name('admin.create-user');
        Route::patch('/users/edit', 'editUser')->name('admin.edit-user');
        Route::post('/literature/create', 'createLiterature')->name(
            'admin.create-literature'
        );
        Route::post('/test/load', 'loadTest')->name('admin.load-test');
        Route::post('/users/load', 'loadUser')->name('admin.load-user');
        Route::post('/update_literature/{id}', 'updateLiterature')->name(
            'admin.update-literature'
        );
        Route::post('/appoint-competetion', 'appointCompetetion')->name(
            'admin.appoint-competetion'
        );
        Route::post('/add-constructor-date', 'addConstructorDate')->name(
            'admin.add-constructor-date'
        );
        Route::get('/test/delete/{id}', 'deleteTest')->name(
            'admin.delete-test'
        );
        Route::get('/download-reposts', 'downloadReposts')->name(
            'admin.download-reposts'
        );
        Route::get('/deleteLiterature/{id}', 'deleteLiterature')->name(
            'admin.delete-literature'
        );
        Route::put('/change-role/{id}', 'ChangeRole')->name(
            'admin.change-role'
        );
        Route::get('/change_pass/{id}', 'ChangePass')->name(
            'admin.change-pass'
        );
        Route::post('/position/load', 'loadPosition')->name(
            'admin.load-position'
        );
        Route::get('/delete-competetion-tests/{id}', 'deleteCompetetionTests');
        Route::get('/delete-common-tests/{id}', 'deleteCommonTests');
        Route::post('/downloadRepostAgain', 'downloadRepostAgain')->name(
            'admin.download-repost-again'
        );
    });
});

/********************** Admin Functionality ******************/
