<?php
// routes for portfilio
Route::get('/',function(){
    return Route::controller("home","index");
});
// al majazer project
Route::get('/almajazer',function(){
    return Route::controller("home","almajazer");
});
// vpv project
Route::get('/vpv',function(){
    return Route::controller("home","vpv");
});
// shop-almajazer project
Route::get('/shop-almajazer',function(){
    return Route::controller("home","shop");
});
//====================================================== end of portfolio pages =======================================================================================
//====================================================== start of login =======================================================================================
// login page
Route::get('/login',function(){
    return Route::controller("user","loginpage");
});
Route::post('/login',function(){
    return Route::controller("user","login");
});
Route::post('/signup',function(){
    return Route::controller("user","addUser");
});
// logout rout
Route::get('/logout',function(){
    return Route::controller("user","logout");
});
//====================================================== end of login =======================================================================================
//====================================================== start of admin =======================================================================================
// admin dashboard
Route::get('/dashboard',function(){
    return Route::controller("admin","dashboard");
});
//====================================================== end of admin =======================================================================================
//====================================================== start of project =======================================================================================
// routes for projects
Route::get('/projects',function(){
    return Route::controller("admin","projects");
});
// creating a new project
Route::post('/projects',function(){
    return Route::controller("admin","newProject");
});
// deleting a project
Route::get('/projects/delete/{id}',function($id){
    return Route::controller("admin","deleteProject");
});
// single project page
Route::get('/projects/{id}',function($id){
    return Route::controller("admin","singleProject");
});
// route to create a new task
Route::post('/projects/add',function(){
    return Route::controller("admin","newTask");
});
// Updating a task when finished
Route::post('/projects/task-finished',function(){
    return Route::controller("admin","taskfinihed");
});
// route to update a task
Route::get('/projects/edit-task/{id}',function($id){
    return Route::controller("admin","editTask");
});
// route to update a task
Route::post('/projects/update-task',function(){
    return Route::controller("admin","updatingTask1");
});
// route to delete a task
Route::get('/projects/delete-task/{id}/{projectid}',function($id, $projectid){
    return Route::controller("admin","deleteTask");
});
//====================================================== end of project =======================================================================================
//====================================================== start of revenue =======================================================================================
// route to get the revenue
Route::get('/revenue',function(){
    return Route::controller("revenue","revenue");
});
// deleting a revenue
Route::get('/revenue/delete/{id}',function($id){
    return Route::controller("revenue","deleteRevnue");
});