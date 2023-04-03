<?php

use App\Models\teacherss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        $ids = teacherss::findorFail()->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $count_students= \App\Models\studant::where('section_id')->count();

        return view('livewire.Teacher.dashboard.dashboard',compact('count_students'));
    });

});
