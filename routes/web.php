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
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/users', 'UserController@allusers');

Route::group(
[
    'prefix' => 'languages',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'LanguagesController@index')
         ->name('languages.language.index');

    Route::get('/create','LanguagesController@create')
         ->name('languages.language.create');

    Route::get('/show/{language}','LanguagesController@show')
         ->name('languages.language.show')
         ->where('id', '[0-9]+');

    Route::get('/{language}/edit','LanguagesController@edit')
         ->name('languages.language.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'LanguagesController@store')
         ->name('languages.language.store');

    Route::put('language/{language}', 'LanguagesController@update')
         ->name('languages.language.update')
         ->where('id', '[0-9]+');

    Route::delete('/language/{language}','LanguagesController@destroy')
         ->name('languages.language.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'currencies',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'CurrenciesController@index')
         ->name('currencies.currency.index')->middleware('auth');

    Route::get('/create','CurrenciesController@create')
         ->name('currencies.currency.create');

    Route::get('/show/{currency}','CurrenciesController@show')
         ->name('currencies.currency.show')
         ->where('id', '[0-9]+');

    Route::get('/{currency}/edit','CurrenciesController@edit')
         ->name('currencies.currency.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CurrenciesController@store')
         ->name('currencies.currency.store');

    Route::put('currency/{currency}', 'CurrenciesController@update')
         ->name('currencies.currency.update')
         ->where('id', '[0-9]+');

    Route::delete('/currency/{currency}','CurrenciesController@destroy')
         ->name('currencies.currency.destroy')
         ->where('id', '[0-9]+');

});


Route::group(
[
    'prefix' => 'delivery_request_items',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DeliveryRequestItemsController@index')
         ->name('delivery_request_items.delivery_request_items.index');

    Route::get('/create','DeliveryRequestItemsController@create')
         ->name('delivery_request_items.delivery_request_items.create');

    Route::get('/show/{deliveryRequestItems}','DeliveryRequestItemsController@show')
         ->name('delivery_request_items.delivery_request_items.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliveryRequestItems}/edit','DeliveryRequestItemsController@edit')
         ->name('delivery_request_items.delivery_request_items.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DeliveryRequestItemsController@store')
         ->name('delivery_request_items.delivery_request_items.store');

    Route::put('delivery_request_items/{deliveryRequestItems}', 'DeliveryRequestItemsController@update')
         ->name('delivery_request_items.delivery_request_items.update')
         ->where('id', '[0-9]+');

    Route::delete('/delivery_request_items/{deliveryRequestItems}','DeliveryRequestItemsController@destroy')
         ->name('delivery_request_items.delivery_request_items.destroy')
         ->where('id', '[0-9]+');

});



Route::group(
[
    'prefix' => 'sender_categories',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderCategoriesController@index')
         ->name('sender_categories.sender_category.index');

    Route::get('/create','SenderCategoriesController@create')
         ->name('sender_categories.sender_category.create');

    Route::get('/show/{senderCategory}','SenderCategoriesController@show')
         ->name('sender_categories.sender_category.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderCategory}/edit','SenderCategoriesController@edit')
         ->name('sender_categories.sender_category.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderCategoriesController@store')
         ->name('sender_categories.sender_category.store');

    Route::put('sender_category/{senderCategory}', 'SenderCategoriesController@update')
         ->name('sender_categories.sender_category.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_category/{senderCategory}','SenderCategoriesController@destroy')
         ->name('sender_categories.sender_category.destroy')
         ->where('id', '[0-9]+');

});



Route::group(
[
    'prefix' => 'sender_items',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderItemsController@index')
         ->name('sender_items.sender_items.index');

    Route::get('/create','SenderItemsController@create')
         ->name('sender_items.sender_items.create');

    Route::get('/show/{senderItems}','SenderItemsController@show')
         ->name('sender_items.sender_items.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderItems}/edit','SenderItemsController@edit')
         ->name('sender_items.sender_items.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderItemsController@store')
         ->name('sender_items.sender_items.store');

    Route::put('sender_items/{senderItems}', 'SenderItemsController@update')
         ->name('sender_items.sender_items.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_items/{senderItems}','SenderItemsController@destroy')
         ->name('sender_items.sender_items.destroy')
         ->where('id', '[0-9]+');

});


Route::group(
[
    'prefix' => 'sender_companies',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderCompaniesController@index')
         ->name('sender_companies.sender_companies.index');

    Route::get('/create','SenderCompaniesController@create')
         ->name('sender_companies.sender_companies.create');

    Route::get('/show/{senderCompanies}','SenderCompaniesController@show')
         ->name('sender_companies.sender_companies.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderCompanies}/edit','SenderCompaniesController@edit')
         ->name('sender_companies.sender_companies.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderCompaniesController@store')
         ->name('sender_companies.sender_companies.store');

    Route::put('sender_companies/{senderCompanies}', 'SenderCompaniesController@update')
         ->name('sender_companies.sender_companies.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_companies/{senderCompanies}','SenderCompaniesController@destroy')
         ->name('sender_companies.sender_companies.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'delivery_agents',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DeliveryAgentsController@index')
         ->name('delivery_agents.delivery_agents.index');

    Route::get('/create','DeliveryAgentsController@create')
         ->name('delivery_agents.delivery_agents.create');

    Route::get('/show/{deliveryAgents}','DeliveryAgentsController@show')
         ->name('delivery_agents.delivery_agents.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliveryAgents}/edit','DeliveryAgentsController@edit')
         ->name('delivery_agents.delivery_agents.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DeliveryAgentsController@store')
         ->name('delivery_agents.delivery_agents.store');

    Route::put('delivery_agents/{deliveryAgents}', 'DeliveryAgentsController@update')
         ->name('delivery_agents.delivery_agents.update')
         ->where('id', '[0-9]+');

    Route::delete('/delivery_agents/{deliveryAgents}','DeliveryAgentsController@destroy')
         ->name('delivery_agents.delivery_agents.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'delivery_companies',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DeliveryCompaniesController@index')
         ->name('delivery_companies.delivery_companies.index');

    Route::get('/create','DeliveryCompaniesController@create')
         ->name('delivery_companies.delivery_companies.create');

    Route::get('/show/{deliveryCompanies}','DeliveryCompaniesController@show')
         ->name('delivery_companies.delivery_companies.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliveryCompanies}/edit','DeliveryCompaniesController@edit')
         ->name('delivery_companies.delivery_companies.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DeliveryCompaniesController@store')
         ->name('delivery_companies.delivery_companies.store');

    Route::put('delivery_companies/{deliveryCompanies}', 'DeliveryCompaniesController@update')
         ->name('delivery_companies.delivery_companies.update')
         ->where('id', '[0-9]+');

    Route::delete('/delivery_companies/{deliveryCompanies}','DeliveryCompaniesController@destroy')
         ->name('delivery_companies.delivery_companies.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'delivery_deposits',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DeliveryDepositsController@index')
         ->name('delivery_deposits.delivery_deposits.index');

    Route::get('/create','DeliveryDepositsController@create')
         ->name('delivery_deposits.delivery_deposits.create');

    Route::get('/show/{deliveryDeposits}','DeliveryDepositsController@show')
         ->name('delivery_deposits.delivery_deposits.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliveryDeposits}/edit','DeliveryDepositsController@edit')
         ->name('delivery_deposits.delivery_deposits.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DeliveryDepositsController@store')
         ->name('delivery_deposits.delivery_deposits.store');

    Route::put('delivery_deposits/{deliveryDeposits}', 'DeliveryDepositsController@update')
         ->name('delivery_deposits.delivery_deposits.update')
         ->where('id', '[0-9]+');

    Route::delete('/delivery_deposits/{deliveryDeposits}','DeliveryDepositsController@destroy')
         ->name('delivery_deposits.delivery_deposits.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'delivery_requests',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DeliveryRequestsController@index')
         ->name('delivery_requests.delivery_requests.index');

    Route::get('/create','DeliveryRequestsController@create')
         ->name('delivery_requests.delivery_requests.create');

    Route::get('/show/{deliveryRequests}','DeliveryRequestsController@show')
         ->name('delivery_requests.delivery_requests.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliveryRequests}/edit','DeliveryRequestsController@edit')
         ->name('delivery_requests.delivery_requests.edit')
         ->where('id', '[0-9]+');
     Route::get('/{deliveryRequests}/print','DeliveryRequestsController@print')
          ->name('delivery_requests.delivery_requests.print')
          ->where('id', '[0-9]+');

    Route::post('/', 'DeliveryRequestsController@store')
         ->name('delivery_requests.delivery_requests.store');

    Route::put('delivery_requests/{deliveryRequests}', 'DeliveryRequestsController@update')
         ->name('delivery_requests.delivery_requests.update')
         ->where('id', '[0-9]+');

    Route::patch('delivery_requests/{deliveryRequests}', 'DeliveryRequestsController@setstatus')
        ->name('delivery_requests.delivery_requests.setstatus')
        ->where('id', '[0-9]+');

    Route::delete('/delivery_requests/{deliveryRequests}','DeliveryRequestsController@destroy')
         ->name('delivery_requests.delivery_requests.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'sender_sites',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderSitesController@index')
         ->name('sender_sites.sender_sites.index');

    Route::get('/create','SenderSitesController@create')
         ->name('sender_sites.sender_sites.create');

    Route::get('/show/{senderSites}','SenderSitesController@show')
         ->name('sender_sites.sender_sites.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderSites}/edit','SenderSitesController@edit')
         ->name('sender_sites.sender_sites.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderSitesController@store')
         ->name('sender_sites.sender_sites.store');

    Route::put('sender_sites/{senderSites}', 'SenderSitesController@update')
         ->name('sender_sites.sender_sites.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_sites/{senderSites}','SenderSitesController@destroy')
         ->name('sender_sites.sender_sites.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'sender_clients',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderClientsController@index')
         ->name('sender_clients.sender_clients.index');

    Route::get('/create','SenderClientsController@create')
         ->name('sender_clients.sender_clients.create');

    Route::get('/show/{senderClients}','SenderClientsController@show')
         ->name('sender_clients.sender_clients.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderClients}/edit','SenderClientsController@edit')
         ->name('sender_clients.sender_clients.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderClientsController@store')
         ->name('sender_clients.sender_clients.store');

    Route::put('sender_clients/{senderClients}', 'SenderClientsController@update')
         ->name('sender_clients.sender_clients.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_clients/{senderClients}','SenderClientsController@destroy')
         ->name('sender_clients.sender_clients.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'sender_client_addresses',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderClientAddressesController@index')
         ->name('sender_client_addresses.sender_client_addresses.index');

    Route::get('/create','SenderClientAddressesController@create')
         ->name('sender_client_addresses.sender_client_addresses.create');

    Route::get('/show/{senderClientAddresses}','SenderClientAddressesController@show')
         ->name('sender_client_addresses.sender_client_addresses.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderClientAddresses}/edit','SenderClientAddressesController@edit')
         ->name('sender_client_addresses.sender_client_addresses.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderClientAddressesController@store')
         ->name('sender_client_addresses.sender_client_addresses.store');

    Route::put('sender_client_addresses/{senderClientAddresses}', 'SenderClientAddressesController@update')
         ->name('sender_client_addresses.sender_client_addresses.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_client_addresses/{senderClientAddresses}','SenderClientAddressesController@destroy')
         ->name('sender_client_addresses.sender_client_addresses.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'delivery_users',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DeliveryUsersController@index')
         ->name('delivery_users.delivery_users.index');

    Route::get('/create','DeliveryUsersController@create')
         ->name('delivery_users.delivery_users.create');

    Route::get('/show/{deliveryUsers}','DeliveryUsersController@show')
         ->name('delivery_users.delivery_users.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliveryUsers}/edit','DeliveryUsersController@edit')
         ->name('delivery_users.delivery_users.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DeliveryUsersController@store')
         ->name('delivery_users.delivery_users.store');

    Route::put('delivery_users/{deliveryUsers}', 'DeliveryUsersController@update')
         ->name('delivery_users.delivery_users.update')
         ->where('id', '[0-9]+');

    Route::delete('/delivery_users/{deliveryUsers}','DeliveryUsersController@destroy')
         ->name('delivery_users.delivery_users.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'sender_deliveries',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderDeliveriesController@index')
         ->name('sender_deliveries.sender_deliveries.index');

    Route::get('/create','SenderDeliveriesController@create')
         ->name('sender_deliveries.sender_deliveries.create');

    Route::get('/show/{senderDeliveries}','SenderDeliveriesController@show')
         ->name('sender_deliveries.sender_deliveries.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderDeliveries}/edit','SenderDeliveriesController@edit')
         ->name('sender_deliveries.sender_deliveries.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderDeliveriesController@store')
         ->name('sender_deliveries.sender_deliveries.store');

    Route::put('sender_deliveries/{senderDeliveries}', 'SenderDeliveriesController@update')
         ->name('sender_deliveries.sender_deliveries.update')
         ->where('id', '[0-9]+');

    Route::patch('sender_deliveries/{senderDeliveries}', 'SenderDeliveriesController@updatestatus')
         ->name('sender_deliveries.sender_deliveries.updatestatus')
         ->where('id', '[0-9]+');

    Route::delete('/sender_deliveries/{senderDeliveries}','SenderDeliveriesController@destroy')
         ->name('sender_deliveries.sender_deliveries.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'sender_users',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'SenderUsersController@index')
         ->name('sender_users.sender_users.index');

    Route::get('/create','SenderUsersController@create')
         ->name('sender_users.sender_users.create');

    Route::get('/show/{senderUsers}','SenderUsersController@show')
         ->name('sender_users.sender_users.show')
         ->where('id', '[0-9]+');

    Route::get('/{senderUsers}/edit','SenderUsersController@edit')
         ->name('sender_users.sender_users.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SenderUsersController@store')
         ->name('sender_users.sender_users.store');

    Route::put('sender_users/{senderUsers}', 'SenderUsersController@update')
         ->name('sender_users.sender_users.update')
         ->where('id', '[0-9]+');

    Route::delete('/sender_users/{senderUsers}','SenderUsersController@destroy')
         ->name('sender_users.sender_users.destroy')
         ->where('id', '[0-9]+');

});


/*Utilisateur*/

Route::get('utilisateurs/ajouter_admin_ajax', function () {
    return view('utilisateurs/ajouter_admin_ajax');
});
Route::get('utilisateurs/modifier_admin_ajax{id}', function ($id) {
    return view('utilisateurs/modifier_admin_ajax');
});
Route::get('utilisateurs/afficher_admin_ajax{id}', function ($id) {
    return view('utilisateurs/afficher_admin_ajax');
});

/* Role & Permission Users*/
Route::get('/permission_objects', 'PermissionObjectController@manage')->name('permission_objects');


/* Settings */
Route::name('settings.')->prefix('settings')->group(function () {
    Route::get('manage', 'SettingsController@index')->name('manage');
    Route::post('manage', 'SettingsController@update')->name('update');

    // Roles
    Route::get('roles', 'SettingsController@roles')->name('roles');
    Route::post('roles_add', 'SettingsController@roles_add')->name('roles_add');
    Route::get('roles_edit/{id}', 'SettingsController@roles_edit')->name('roles_edit');
    Route::post('roles_edit/{id}', 'SettingsController@roles_update')->name('roles_update');
    //Objects
    Route::get('objects', 'SettingsController@objects')->name('objects');
    Route::post('objects_add', 'SettingsController@objects_add')->name('objects_add');
    Route::get('objects_edit/{id}', 'SettingsController@objects_edit')->name('objects_edit');
    //Permissions
    Route::post('permissions_add/{object_id}', 'SettingsController@permissions_add')->name('permissions_add');


});

Route::group(
[
    'prefix' => 'statuses',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'StatusesController@index')
         ->name('statuses.statuses.index');

    Route::get('/create','StatusesController@create')
         ->name('statuses.statuses.create');

    Route::get('/show/{statuses}','StatusesController@show')
         ->name('statuses.statuses.show')
         ->where('id', '[0-9]+');

    Route::get('/{statuses}/edit','StatusesController@edit')
         ->name('statuses.statuses.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'StatusesController@store')
         ->name('statuses.statuses.store');
               
    Route::put('statuses/{statuses}', 'StatusesController@update')
         ->name('statuses.statuses.update')
         ->where('id', '[0-9]+');

    Route::delete('/statuses/{statuses}','StatusesController@destroy')
         ->name('statuses.statuses.destroy')
         ->where('id', '[0-9]+');

});
