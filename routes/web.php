<?php

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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('login');
});

Route::post('/login','rController@login');
Route::post('/signup','rController@signup');


Route::get('/student',function(){
    return view('student');
});
Route::get('/logout',function(){
    session_start();
    session_destroy();
    return view('login');
});

Route::get('/student_view','rController@assignment_view_student');

Route::get('/student_submit/{id}',function($id){


    $assignment=\DB::table('assignment')->where('ass_id',$id)->get();
    return view('student_submit',compact('assignment'));
});

Route::post('/submitted_assignment','rController@submitted_assignment');
Route::get('/assignment_submitted','rController@assignment_submitted');
Route::get('/getFile/{filename}','rController@getFile');
Route::get('/student_view1','rController@assignment_view_student1');



//faculty
Route::get('/faculty',function()
{
    return view('faculty');
});

//view 
Route::get('/f_view','f_controller@view_projects');

//Route::get('/f_uploaddoc','f_controller@view_projects');
Route::post('/download','f_controller@getDownload');
Route::post('/submitted','f_controller@submitted');
Route::post('/update_marks','f_controller@update_marks');
Route::post('/filter_v','f_controller@filter_v');

Route::post('/filter_e','f_controller@filter_e');

Route::get('/f_result','f_controller@evaluate');

Route::post('/f_upload',function(Request $request){

    $post = $request->all();
    $id=$post['f_course'];
    return view('f_upload',compact('id'));
});





//admin

Route::get('/admin',function(){
    return view('admin');
});

Route::get('/add_student',function(){
    return view('add_student');
});

Route::get('/add_faculty',function(){
    return view('add_faculty');
});

//for viewing
Route::get('/view_student','admin_controller@view_student');
Route::get('/view_faculty','admin_controller@view_faculty');

//for adding faculty data
Route::post('/add_f','admin_controller@add_faculty');
//for adding student data
Route::post('/add_s','admin_controller@add_student');

//for filter
Route::post('/filter_student','admin_controller@filter_student');


Route::post('/filter_faculty','admin_controller@filter_faculty');



//to delete
Route::post('/delete_student','admin_controller@delete_student');


Route::post('/delete_faculty','admin_controller@delete_faculty');


//to edit

Route::get('/edit_student',function(){
    return view('edit_student');
});


Route::get('/edit_faculty',function(){
    return view('edit_faculty');
});



Route::post('/edited_student1','admin_controller@edited_student');


Route::post('/edited_faculty1','admin_controller@edited_faculty');

