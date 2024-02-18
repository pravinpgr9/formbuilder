<?php
 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController; 

use App\Http\Controllers\FormController;
use App\Http\Controllers\FormSubmissionController;


// Debugging route
// Route::get('/debug', function () {
//     $forms = FormController::index();
//     dd($forms); // Dump and die
// });


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

// Welcome View Route
Route::get('/', function () {
    return view('welcome');
});

// Route - authentication, Login, registration
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resources([...]), Laravel automatically generates multiple routes to handle typical CRUD (Create, Read, Update, Delete) operations.

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]); 


// Added Route group with middleware to ensure authentication is required for access
Route::middleware(['auth'])->group(function () {

    // Route for displaying all forms
    Route::get('/forms', [FormController::class, 'index'])->name('forms.index');

    // Route to display the creation form
    Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');

    // Route to storw the newly created form
    Route::post('/forms', [FormController::class, 'store'])->name('forms.store');

    // Route for adding fields to a form
    Route::get('/forms/{form}/add-fields', [FormController::class, 'addFields'])->name('forms.add_fields'); 
    Route::post('/forms/{form}/fields', [FormController::class, 'storeFields'])->name('forms.fields.store'); 


    //Show & Submit the Form
    Route::get('/forms/{form}', [FormController::class, 'show'])->name('forms.show');
    
    Route::post('/forms/{form}', [FormSubmissionController::class, 'submit'])->name('submit_form');

    // Added Route to get stats of the form submission
    Route::get('forms/{form}/statistics', [FormController::class, 'showFormStatistics'])->name('forms.statistics');

    //Route to delete 
    Route::delete('forms/{form}', [FormController::class, 'deleteForm'])->name('forms.delete');

    //Route for Editing the Forms
    Route::get('/forms/{form}/edit', [FormController::class, 'edit'])->name('forms.edit');
    Route::put('/forms/{form}', [FormController::class, 'update'])->name('forms.update'); 

});