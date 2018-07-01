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

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('');
Route::get('/admin/user', 'UserController@index')->name('');
Route::get('/admin/user/add', 'UserController@add')->name('');
Route::get('/admin/user/view/{id}', 'UserController@view')->name('');
Route::post('/admin/user/registration', 'UserController@registration')->name('');
Route::get('/admin/income/category', 'IncomeCategoryController@index')->name('');
Route::get('/admin/income/category/add', 'IncomeCategoryController@add')->name('');
Route::get('/admin/income/category/edit/{id}', 'IncomeCategoryController@edit')->name('');
Route::get('/admin/income/category/view/{id}', 'IncomeCategoryController@view')->name('');
Route::post('/admin/income/category/insert', 'IncomeCategoryController@insert')->name('');
Route::post('/admin/income/category/update', 'IncomeCategoryController@update')->name('');
Route::post('/admin/income/category/softdelete', 'IncomeCategoryController@softdelete')->name('');
Route::get('/admin/income', 'IncomeController@index')->name('');
Route::get('/admin/income/add', 'IncomeController@add')->name('');
Route::get('/admin/income/edit/{id}', 'IncomeController@edit')->name('');
Route::get('/admin/income/view/{id}', 'IncomeController@view')->name('');
Route::post('/admin/income/insert', 'IncomeController@insert')->name('');
Route::post('/admin/income/update', 'IncomeController@update')->name('');
Route::post('/admin/income/softdelete', 'IncomeController@softdelete')->name('');
Route::get('/admin/expense/category', 'ExpenseCategoryController@index')->name('');
Route::get('/admin/expense/category/add', 'ExpenseCategoryController@add')->name('');
Route::get('/admin/expense/category/view/{id}', 'ExpenseCategoryController@view')->name('');
Route::get('/admin/expense/category/edit/{id}', 'ExpenseCategoryController@edit')->name('');
Route::post('/admin/expense/category/insert', 'ExpenseCategoryController@insert')->name('');
Route::post('/admin/expense/category/update', 'ExpenseCategoryController@update')->name('');
Route::post('/admin/expense/category/softdelete', 'ExpenseCategoryController@softdelete')->name('');
Route::post('/admin/expense/softdelete', 'ExpenseController@softdelete')->name('');
Route::get('/admin/expense', 'ExpenseController@index')->name('');
Route::get('/admin/expense/add', 'ExpenseController@add')->name('');
Route::get('/admin/expense/edit/{id}', 'ExpenseController@edit')->name('');
Route::get('/admin/expense/view/{id}', 'ExpenseController@view')->name('');
Route::post('/admin/expense/insert', 'ExpenseController@insert')->name('');
Route::post('/admin/expense/update', 'ExpenseController@update')->name('');
Route::get('/admin/summary', 'SummaryController@index')->name('');
Route::get('/admin/summary/archive', 'SummaryController@archive')->name('');
Route::get('/admin/summary/search/{from}/{to}', 'SummaryController@search')->name('');
Route::get('/admin/report', 'ReportController@index')->name('');
Route::get('/admin/loaner', 'LoanerController@index')->name('');
Route::get('/admin/loaner/add', 'LoanerController@add')->name('');
Route::get('/admin/loaner/edit/{id}', 'LoanerController@edit')->name('');
Route::get('/admin/loaner/details/{id}', 'LoanerController@details')->name('');
Route::post('/admin/loaner/insert', 'LoanerController@insert')->name('');
Route::post('/admin/loaner/update', 'LoanerController@update')->name('');
Route::get('/admin/loan', 'LoanController@index')->name('');
Route::get('/admin/loan/received', 'LoanController@received')->name('');
Route::get('/admin/loan/received/view/{id}', 'LoanController@received_view')->name('');
Route::get('/admin/loan/received/edit/{id}', 'LoanController@received_edit')->name('');
Route::get('/admin/loan/paid', 'LoanController@paid')->name('');
Route::get('/admin/loan/given', 'LoanController@given')->name('');
Route::get('/admin/loan/payment', 'LoanController@payment')->name('');
Route::post('/admin/loan/received/insert', 'LoanController@insert_received')->name('');
Route::post('/admin/loan/received/update', 'LoanController@update_received')->name('');
Route::post('/admin/loan/paid/insert', 'LoanController@insert_paid')->name('');
Route::post('/admin/loan/given/insert', 'LoanController@insert_given')->name('');
Route::post('/admin/loan/payment/insert', 'LoanController@insert_payment')->name('');

Route::get('/admin/manage/', 'ManageController@index')->name('');
Route::get('/admin/recycle/income/{id}', 'RecycleController@income')->name('');
