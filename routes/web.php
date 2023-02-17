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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/state', 'Controller@getState')->name('state');

Route::prefix('admin')->group(function() {
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::post('/updateProfile', 'AdminController@updateProfile')->name('admin.updateProfile');
    Route::get('/state', 'AdminController@getState')->name('admin.state');
   
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/home', 'AdminController@index')->name('admin.home');

    /**franchise related routes */
    Route::get('/addFranchisee', 'AdminController@addFranchisee')->name('admin.addFranchisee');
    Route::post('/addFranchisee', 'AdminController@store')->name('admin.postAddFranchisee');
    Route::get('/viewFranchiseeList', 'AdminController@viewFranchiseeList')->name('admin.viewFranchiseeList');
    Route::get('/editFranchise/{id}', 'AdminController@editFranchise')->name('admin.editFranchise');
    Route::post('/editFranchise', 'AdminController@updateFranchise')->name('admin.updateFranchise');
    Route::get('/blockUnblock/{id}', 'AdminController@blockUnblock')->name('admin.blockUnblock');
    Route::get('/viewFranchise/{id}', 'AdminController@viewFranchise')->name('admin.viewFranchise');
    

    /**outlet related admin routes */
    
    Route::get('/viewOutletList', 'AdminController@viewOutletList')->name('admin.viewOutletList');
    Route::get('/addOutlet', 'AdminController@addOutlet')->name('admin.addOutlet');
    Route::post('/addOutlet', 'AdminController@storeOutlet')->name('admin.postAddOutlet');
    Route::get('/editOutlet/{id}', 'AdminController@editOutlet')->name('admin.editOutlet');
    Route::post('/editOutlet', 'AdminController@updateOutlet')->name('admin.updateOutlet');
    Route::get('/outletBlockUnblock/{id}', 'AdminController@outletBlockUnblock')->name('admin.outletBlockUnblock');
    Route::get('/viewOutlet/{id}', 'AdminController@viewOutlet')->name('admin.viewOutlet');
    

    /**treatment related routes */
    Route::get('/viewTreatmentCategoryList', 'AdminController@viewTreatmentCategoryList')->name('admin.viewTreatmentCategoryList');
    Route::get('/addCategory', 'AdminController@addCategory')->name('admin.addCategory');
    Route::post('/addCategory', 'AdminController@storCategory')->name('admin.postddCategory');
    Route::get('/editCategory/{id}', 'AdminController@editCategory')->name('admin.editCategory');
    Route::post('/editCategory', 'AdminController@updateCategory')->name('admin.updateCategory');
    Route::get('/treatmentCategoryBlockUnblock/{id}', 'AdminController@treatmentCategoryBlockUnblock')->name('admin.treatmentCategoryBlockUnblock');



    Route::get('/viewTreatmentProductList', 'AdminController@viewTreatmentProductList')->name('admin.viewTreatmentProductList');
    Route::get('/addTreatmentProduct', 'AdminController@addTreatmentProduct')->name('admin.addTreatmentProduct');
    Route::post('/addTreatmentProduct', 'AdminController@storeTreatmentProduct')->name('admin.PostAddTreatmentProduct');
    Route::get('/editTreatmentProduct/{id}', 'AdminController@editTreatmentProduct')->name('admin.editTreatmentProduct');
    Route::post('/editTreatmentProduct', 'AdminController@updateTreatmentProduct')->name('admin.updateTreatmentProduct');
    Route::get('/treatmentBlockUnblock/{id}', 'AdminController@treatmentBlockUnblock')->name('admin.treatmentBlockUnblock');
    Route::get('/viewTreatmentProduct/{id}', 'AdminController@viewTreatmentProduct')->name('admin.viewTreatmentProduct');

});



Route::prefix('franchise')->group(function() {

    Route::get('/dashboard', 'FranchiseController@getDashboard')->name('franchise.dashboard');
    Route::get('/viewTherapistList', 'TherapistController@index')->name('franchise.viewTherapistList');

    Route::get('/addTherapistForm', 'TherapistController@showForm')->name('franchise.addTherapistForm');
    Route::post('/addTherapistForm', 'TherapistController@store')->name('franchise.PostAddTherapistForm');
    Route::get('/editTherapistForm/{id}', 'TherapistController@edit')->name('franchise.editTherapistForm');
    Route::get('/updateTherapistForm/{id}', 'TherapistController@edit')->name('franchise.editTherapistForm');
    Route::get('/updateTherapist/{id}', 'TherapistController@update')->name('franchise.updateTherapist');

    //appointment related routes
    Route::get('/viewAppointmentList', 'AppointmentController@index')->name('franchise.viewAppointmentList');
    Route::get('/addAppointmentForm', 'AppointmentController@showForm')->name('franchise.addAppointmentForm');
    Route::post('/addAppointmentForm', 'AppointmentController@store')->name('franchise.PostAddAppointment');
    Route::get('/editAppointmentForm/{id}', 'AppointmentController@edit')->name('franchise.editAppointmentForm');
    Route::post('/updateAppointmentForm', 'AppointmentController@update')->name('franchise.updateAppointmentForm');
   
    Route::get('/getids', 'AppointmentController@getCustomerOrBookingId')->name('franchise.getids');

    //patient related Routes

    Route::get('/viewPatientList', 'PatientController@index')->name('viewPatientList');


    

});
