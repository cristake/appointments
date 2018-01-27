<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    
    Route::resource('employees', 'Admin\EmployeesController');
    Route::post('employees_mass_destroy', ['uses' => 'Admin\EmployeesController@massDestroy', 'as' => 'employees.mass_destroy']);
    Route::post('employees_restore/{id}', ['uses' => 'Admin\EmployeesController@restore', 'as' => 'employees.restore']);
    Route::delete('employees_perma_del/{id}', ['uses' => 'Admin\EmployeesController@perma_del', 'as' => 'employees.perma_del']);

    Route::resource('departments', 'Admin\DepartmentsController');
    Route::post('departments_mass_destroy', ['uses' => 'Admin\DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);
    Route::post('departments_restore/{id}', ['uses' => 'Admin\DepartmentsController@restore', 'as' => 'departments.restore']);
    Route::delete('departments_perma_del/{id}', ['uses' => 'Admin\DepartmentsController@perma_del', 'as' => 'departments.perma_del']);

    
    Route::resource('contact_companies', 'Admin\ContactCompaniesController');
    Route::post('contact_companies_mass_destroy', ['uses' => 'Admin\ContactCompaniesController@massDestroy', 'as' => 'contact_companies.mass_destroy']);
    
    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);
    
    Route::resource('user_actions', 'Admin\UserActionsController');
    
    Route::resource('equipments', 'Admin\EquipmentsController');
    Route::post('equipments_mass_destroy', ['uses' => 'Admin\EquipmentsController@massDestroy', 'as' => 'equipments.mass_destroy']);
    Route::post('equipments_restore/{id}', ['uses' => 'Admin\EquipmentsController@restore', 'as' => 'equipments.restore']);
    Route::delete('equipments_perma_del/{id}', ['uses' => 'Admin\EquipmentsController@perma_del', 'as' => 'equipments.perma_del']);
    
    Route::resource('tasks', 'Admin\TasksController');
    Route::post('tasks_mass_destroy', ['uses' => 'Admin\TasksController@massDestroy', 'as' => 'tasks.mass_destroy']);
    Route::post('tasks_restore/{id}', ['uses' => 'Admin\TasksController@restore', 'as' => 'tasks.restore']);
    Route::delete('tasks_perma_del/{id}', ['uses' => 'Admin\TasksController@perma_del', 'as' => 'tasks.perma_del']);
    
    Route::resource('statuses', 'Admin\StatusesController');
    Route::post('statuses_mass_destroy', ['uses' => 'Admin\StatusesController@massDestroy', 'as' => 'statuses.mass_destroy']);
    Route::post('statuses_restore/{id}', ['uses' => 'Admin\StatusesController@restore', 'as' => 'statuses.restore']);
    Route::delete('statuses_perma_del/{id}', ['uses' => 'Admin\StatusesController@perma_del', 'as' => 'statuses.perma_del']);



 
});
