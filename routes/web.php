<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;




   Route::get('/','HomeController@index')->name('selection');



Route::group(['namespace' => 'Auth'], function () {

Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

Route::post('login','LoginController@login')->name('login');

// Route::get('/logout/{type}', 'LoginController@logout')->name('logout');


});























Route::group(
    [
      'prefix' => LaravelLocalization::setLocale(),
     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::view('add_parent','livewire.show_Form')->name('form');
Route::view('Teacher','livewire.Teacher.show_Form')->name('formm');


    Route::group(['namespace'=>'Grade'],function(){
        Route::get('grade','GradeController@index')->name('Grade');
        Route::post('stor','GradeController@store')->name('Grades.store');
        Route::post('updat','GradeController@update')->name('Grades.update');
        Route::post('destro','GradeController@destroy')->name('Grades.destroy');

    });
    Route::group(['namespace'=>'classroom'],function(){
        Route::get('class','ClassroomController@index')->name('class');
        Route::post('store','ClassroomController@store')->name('Classrooms.store');
        Route::post('destroy','ClassroomController@destroy')->name('Classrooms.destroy');
        Route::post('update','ClassroomController@update')->name('Classrooms.update');
        Route::post('Filter_Classes','ClassroomController@Filter_Classes')->name('Filter_Classes');
        Route::post('delete_all','ClassroomController@delete_all')->name('delete_all');

});
Route::group(['namespace'=>'section'],function(){
    Route::get('section','SectionController@index')->name('section');
    Route::post('section/store','SectionController@store')->name('Sections.store');
    Route::get('classes/{id}','SectionController@getclasses')->name('classes');
    Route::post('section/update','SectionController@update')->name('Sections.update');
    Route::post('section/destroy','SectionController@destroy')->name('Sections.destroy');
});
Route::group(['namespace'=>'studan'],function(){
    Route::resource('studant','studantso');
    Route::get('/Get_classrooms/{id}', 'studantso@Get_classrooms');
    Route::get('/Get_Sections/{id}', 'studantso@Get_Sections');
    Route::post('/updatel/{id}', 'studantso@update')->name('up');
    Route::get('/destroy/{id}', 'studantso@destroy')->name('de');
    Route::post('/Upload_attachment', 'studantso@Upload_attachment')->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}', 'studantso@Download_attachment')->name('Download_attachment');
    Route::post('Delete_attachment', 'studantso@Delete_attachment')->name('Delete_attachment');
    Route::post('Delete_attachment', 'studantso@Delete_attachment')->name('Delete_attachment');
    Route::resource('Promotion', 'Promotions');
    Route::post('Promotion/{id}', 'Promotions@destroy')->name('destroy_p');
    Route::resource('Graduated ', 'GraduatedController');





});

   Route::group(['namespace'=>'fee'],function(){
   Route::resource('fee','feeController');
   Route::resource('Fees_Invoices', 'FeesInvoicesController');
   });
Route::get('dashborad','HomeController@dashboard')->name('dashborad');

Route::group(['namespace'=>'Attendance'],function(){
Route::resource('Attendance','AttendanceController');
});
   Route::group(['namespace'=>'subject'],function(){
    Route::resource('subject','SubjectController');
    });

    Route::group(['namespace'=>'exam'],function(){
        Route::resource('Exam','ExamController');
        });

        Route::group(['namespace'=>'quizze'],function(){
            Route::resource('Quizzes','QuizzeController');
            });

            Route::group(['namespace'=>'Zoom'],function(){
                Route::resource('online_classes','OnlineClasseController');
                Route::get('/indirect', 'OnlineClasseController@indirectCreate')->name('indirect.create');
                Route::post('/indirect', 'OnlineClasseController@storeIndirect')->name('indirect.store');
                });

                Route::group(['namespace'=>'Library'],function(){
                    Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
                    Route::resource('library', 'LibraryController');
                });
});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
