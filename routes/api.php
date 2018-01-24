<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('employees', 'EmployeesController', ['except' => ['create', 'edit']]);

        Route::resource('contact_companies', 'ContactCompaniesController', ['except' => ['create', 'edit']]);

        Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);

        Route::resource('equipments', 'EquipmentsController', ['except' => ['create', 'edit']]);

        Route::resource('tasks', 'TasksController', ['except' => ['create', 'edit']]);

        Route::resource('statuses', 'StatusesController', ['except' => ['create', 'edit']]);

});
