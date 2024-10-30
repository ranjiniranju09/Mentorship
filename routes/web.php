<?php

<<<<<<< HEAD
namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ModuleController;
use Barryvdh\DomPDF\Facade as PDF;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('rahul@forstu.co')  // Change to your email
                ->subject('Test Email');
    });

    return 'Test email sent';
});


Route::match(['get', 'post'], '/mentees/{menteeId}', 'App\Http\Controllers\MenteeController@menteedash')->name('mentees');

Route::match(['get', 'post'], '/login', 'App\Http\Controllers\LoginRegController@login')->name('login');

Route::match(['get', 'post'], '/register1', 'App\Http\Controllers\LoginRegController@register1')->name('register1');
Route::match(['get', 'post'], '/register2', 'App\Http\Controllers\LoginRegController@register2')->name('register2');


Route::match(['get', 'post'], '/mentorregister', 'App\Http\Controllers\LoginRegController@mentorregister')->name('mentorregister');

Route::match(['get', 'post'], '/registermentor', 'App\Http\Controllers\LoginRegController@registermentor')->name('registermentor');

Route::match(['get', 'post'], '/registermentee', 'App\Http\Controllers\LoginRegController@registermentee')->name('registermentee');

Route::match(['get','post'],'/logged','App\Http\Controllers\LoginRegController@show')->name('logged');

// Route::match(['get','post'],'/tickets','App\Http\Controllers\LoginRegController@tickets')->name('tickets');

Route::match(['get','post'],'/session/{mentorId]','App\Http\Controllers\SessionController@session')->name('session');

Route::match(['get','post'],'/mentor/{mentorId}','App\Http\Controllers\MentorController@mentor')->name('mentor');


Route::match(['get','post'],'/sessionstore','App\Http\Controllers\SessionController@sessionstore')->name('sessionstore');

Route::match(['get','post'],'/sessiondelete/{id}','App\Http\Controllers\SessionController@sessiondelete')->name('sessiondelete');

Route::match(['get','post'],'/sessionupdate/{id}','App\Http\Controllers\SessionController@sessionupdate')->name('sessionupdate');

Route::match(['get','post'],'/sessionedit/{id}','App\Http\Controllers\SessionController@sessionedit')->name('sessionedit');

Route::match(['get','post'],'/admin','App\Http\Controllers\AdminController@admin')->name('admin');

Route::match(['get','post'],'/adminstore','App\Http\Controllers\AdminController@adminstore')->name('adminstore');

Route::match(['get','post'],'/mapping','App\Http\Controllers\MappingController@map')->name('mapping');

Route::match(['get','post'],'/mappingstore','App\Http\Controllers\MappingController@mappingstore')->name('mappingstore');

Route::match(['get','post'],'/sessionjoin/{id}','App\Http\Controllers\SessionController@sessionjoin')->name('sessionjoin');

Route::match(['get','post'],'/menteesession','App\Http\Controllers\SessionController@menteesession')->name('menteesession');

Route::match(['get','post'],'/storefeedback/{id}','App\Http\Controllers\SessionController@storefeedback')->name('storefeedback');

Route::match(['get','post'],'/MarkAttendance/{id}','App\Http\Controllers\SessionController@MarkAttendance')->name('MarkAttendance');

Route::match(['get','post'],'/ShowTask/{mentorId}','App\Http\Controllers\TasksController@ShowTask')->name('ShowTask');

Route::match(['get','post'],'/StoreTask/{mentorId}','App\Http\Controllers\TasksController@StoreTask')->name('StoreTask');

//view chat blade
Route::match(['get','post'],'/showchat','App\Http\Controllers\ChatController@showchat')->name('showchat');

// Route::match(['get','post'],'/fetchMessages','App\Http\Controllers\ChatController@fetchMessages')->name('fetchMessages');

// Route::match(['get','post'],'/messages','App\Http\Controllers\ChatController@sendMessage')->name('sendMessage');

Route::post('/send-message',function(\Illuminate\Http\Request $request){
    $message = $request->message;
    $name = $request ->name;
    event(new MessageSent($message,$name));
    return response()->json(['status'=>'success']);
});

// View chat blade
// Route::get('/showchat', [ChatController::class, 'showchat'])->name('showchat');
// Route::get('/fetchMessages', [ChatController::class, 'fetchMessages'])->name('fetchMessages');
// Route::post('/messages', [ChatController::class, 'sendMessage'])->name('sendMessage');

// routes/web.php

// Routes for creating and storing resources (accessible by mentors)
Route::match(['get', 'post'], '/resources/{mentorId}', 'App\Http\Controllers\ResourceController@show')->name('resources');
Route::match(['get', 'post'], '/storeresources/{mentorId}', 'App\Http\Controllers\ResourceController@store')->name('storeresources');

// Route for displaying pending resources (accessible by admins)
Route::get('/pending', 'App\Http\Controllers\ResourceController@pending')->name('pending');

// Route for approving resources (accessible by admins)
Route::post('/approve/{id}', 'App\Http\Controllers\ResourceController@approve')->name('approve');



Route::match(['get','post'],'/viewmenteeresources/{menteeId}','App\Http\Controllers\ResourceController@viewmenteeresources')->name('viewmenteeresources');

// Route::get('/menteeresources/{mentee_id}','App\Http\Controllers\ResourceController@menteeResources')->name('menteeresources');


// Route::match(['get','post'],'/viewjobs/{mentorId}','App\Http\Controllers\JobController@view')->name('viewjobs');

// Route::match(['get','post'],'/storejobs/{mentorId}','App\Http\Controllers\JobController@store')->name('storejobs');

// Route::match(['get','post'],'/jobs/{mentorId}','App\Http\Controllers\JobController@jobs')->name('jobs');

// Route::match(['get','post'],'/adminjobstore','App\Http\Controllers\JobController@adminjobstore')->name('adminjobstore');

// Route::match(['get','post'],'/adminjobs','App\Http\Controllers\JobController@adminjobs')->name('adminjobs');

// Route::match(['get','post'],'/modules/{mentorId}','App\Http\Controllers\ModulesController@modules')->name('modules');

// Route::match(['get','post'],'/chapters','App\Http\Controllers\ModulesController@chapters')->name('chapters');

// Route::match(['get','post'],'/chapterscontent','App\Http\Controllers\ModulesController@chapterscontent')->name('chapterscontent');


Route::match(['get','post'],'/quiz','App\Http\Controllers\ModulesController@quiz')->name('quiz');
// Route::match(['get','post'],'/sidebar','App\Http\Controllers\MentorController@sidebar')->name('sidebar');


// Route::match(['get','post'],'/totalquiz','App\Http\Controllers\MentorController@totalquiz')->name('totalquiz');

//sample
//          ================ Mentee List ================= 
 

Route::match(['get','post'],'/dashboardmentee','App\Http\Controllers\MenteeController@show')->name('dashboardmentee');

Route::match(['get','post'],'/admindashboard','App\Http\Controllers\AdminController@dashboard')->name('admindashboard');

Route::match(['get','post'],'/taskmentee','App\Http\Controllers\MenteeController@task')->name('taskmentee');

Route::match(['get','post'],'/modules','App\Http\Controllers\MenteeController@modules')->name('modules');

Route::match(['get','post'],'/chapters','App\Http\Controllers\MenteeController@chapters')->name('chapters');

Route::match(['get','post'],'/JsIntro','App\Http\Controllers\MenteeController@JsIntro')->name('JsIntro');

Route::match(['get','post'],'/quizJsIntro','App\Http\Controllers\ModulesController@quizJsIntro')->name('quizJsIntro');

Route::match(['get','post'],'/publicresources','App\Http\Controllers\MenteeController@publicresources')->name('publicresources');

Route::match(['get','post'],'/displayresources','App\Http\Controllers\MenteeController@displayresources')->name('displayresources');

Route::match(['get','post'],'/calender','App\Http\Controllers\MenteeController@calender')->name('calender');

Route::match(['get','post'],'/moduleresources','App\Http\Controllers\ModulesController@moduleresources')->name('moduleresources');

Route::match(['get','post'],'/displaymoduleresources','App\Http\Controllers\ModulesController@displaymoduleresources')->name('displaymoduleresources');

Route::match(['get','post'],'/tickets','App\Http\Controllers\MenteeController@tickets')->name('tickets');

Route::match(['get','post'],'/jobs','App\Http\Controllers\MenteeController@opportunities')->name('jobs');

Route::match(['get','post'],'/jobdetails1','App\Http\Controllers\MenteeController@jobdetails1')->name('jobdetails1');

Route::match(['get','post'],'/sessionmentee','App\Http\Controllers\MenteeController@sessionmentee')->name('sessionmentee');

Route::match(['get','post'],'/menteeprofile','App\Http\Controllers\MenteeController@menteeprofile')->name('menteeprofile');


// Route::match(['get','post'],'/mentorsessionadd','App\Http\Controllers\MentorController@mentorsessionadd')->name('mentorsessionadd');


// Route::match(['get','post'],'/mentortaskadd','App\Http\Controllers\MentorController@mentortaskadd')->name('mentortaskadd');


//  ================ Mentor List ================= 


Route::match(['get','post'],'/dashboardmentor','App\Http\Controllers\MentorController@dashboardmentor')->name('dashboardmentor');

Route::match(['get','post'],'/mentorprofile','App\Http\Controllers\MentorController@mentorprofile')->name('mentorprofile');

Route::match(['get','post'],'/mentorjobs','App\Http\Controllers\MentorController@mentorjobs')->name('mentorjobs');


Route::match(['get','post'],'/mentorresourceadd','App\Http\Controllers\MentorController@mentorresourceadd')->name('mentorresourceadd');

Route::match(['get','post'],'/menteemoduleprogress','App\Http\Controllers\MentorController@menteemoduleprogress')->name('menteemoduleprogress');

Route::match(['get','post'],'/menteequizprogress','App\Http\Controllers\MentorController@menteequizprogress')->name('menteequizprogress');

Route::match(['get','post'],'/menteetaskprogress','App\Http\Controllers\MentorController@menteetaskprogress')->name('menteetaskprogress');

Route::match(['get','post'],'/menteesessionprogress','App\Http\Controllers\MentorController@menteesessionprogress')->name('menteesessionprogress');


//  ================  List ================= 

Route::match(['get','post'],'/dashboardadmin','App\Http\Controllers\AdminController@dashboardadmin')->name('dashboardadmin');

Route::match(['get','post'],'/adminmodule','App\Http\Controllers\AdminController@adminmodule')->name('adminmodule');

Route::match(['get','post'],'/opportunity','App\Http\Controllers\AdminController@opportunity')->name('opportunity');

Route::match(['get','post'],'/adminsession','App\Http\Controllers\AdminController@adminsession')->name('adminsession');

Route::match(['get','post'],'/tableview','App\Http\Controllers\AdminController@tableview')->name('tableview');

Route::match(['get','post'],'/adminquizprogress','App\Http\Controllers\AdminController@adminquizprogress')->name('adminquizprogress');

Route::match(['get','post'],'/certificate','App\Http\Controllers\AdminController@showcertificate')->name('showcertificate');

Route::match(['get','post'],'/download','App\Http\Controllers\AdminController@download')->name('download');

Route::match(['get','post'],'/achievement','App\Http\Controllers\AdminController@achievement')->name('achievement');

Route::match(['get','post'],'/adminresource','App\Http\Controllers\AdminController@adminresource')->name('adminresource');
=======
use App\Http\Controllers\Admin\QuizprogressController;
use App\Http\Controllers\Mentor\SessionController;
use App\Http\Controllers\Mentor\TaskController;
use App\Http\Controllers\Mentor\CertificateController;
use App\Http\Controllers\Admin\SessionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Mentee\TicketsController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\Mentor\TaskController as MentorTaskController;
use App\Http\Controllers\Mentee\TaskController as MenteeTaskController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResourceApprovalController;
use App\Http\Controllers\Scholarship\ScholershipController;
//use App\Http\Controllers\Mentee\MenteeModuleController;
use App\Http\Controllers\Mentee\MenteeModuleController;
use App\Http\Controllers\Mentee\OpportunitiesController;
use App\Http\Controllers\Mentee\KnowledgebankController;
use App\Http\Controllers\Mentor\ModuleController;
use App\Http\Controllers\Mentor\OpportunitiesController as MentorOpportunitiesController;
use App\Http\Controllers\Mentor\QuizController;
use App\Http\Controllers\Mentor\OpportunityController;
use App\Http\Controllers\Mentor\SupportController;
use App\Module;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
Route::get('/resources/create', [ResourceController::class, 'create'])->name('resources.create');
Route::post('/resourcesstore', [ResourceController::class, 'store'])->name('resources.store');
Route::get('/resources/{id}', [ResourceController::class, 'show']);
Route::put('/resources/{id}', [ResourceController::class, 'update'])->name('resources.update');
Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');
//Route::resource('resources', ResourceController::class);
Route::get('/approvals', [ResourceApprovalController::class, 'index']);
Route::get('/approvals/create', [ResourceApprovalController::class, 'create']);
Route::post('/approvals', [ResourceApprovalController::class, 'store']);
Route::get('/approvals/{id}', [ResourceApprovalController::class, 'show']);
Route::get('/approvals/{id}/edit', [ResourceApprovalController::class, 'edit']);
Route::put('/approvals/{id}', [ResourceApprovalController::class, 'update']);
Route::delete('/approvals/{id}', [ResourceApprovalController::class, 'destroy']);

Route::get('resource-approvals', [ResourceApprovalController::class, 'index'])->name('resource_approvals.index');
Route::post('resource-approvalss/{id}', [ResourceApprovalController::class, 'approve'])->name('resource_approvals.approve');

Route::get('/menteeshow',[RegisterController::class,'menteeshow'])->name('menteeshow');
Route::post('/registermentee',[RegisterController::class,'registermentee'])->name('registermentee');

Route::get('/mentorshow',[RegisterController::class,'mentorshow'])->name('mentorshow');
Route::post('/registermentor', [RegisterController::class, 'registermentor'])->name('registermentor');



Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
//Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/mentee/dashboard', 'MenteeDashboardController@index')->name('mentee.dashboard');
Route::get('/mentor/dashboard', 'MentorDashboardController@index')->name('mentor.dashboard');

Route::prefix('mentor')->group(function() {
    Route::get('/manage-sessions', [SessionController::class, 'index'])->name('sessions.index');
    // Route::get('/tasks-index', [TaskController::class, 'index'])->name('tasks.index');
   
    Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
    Route::put('/sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');
    Route::get('/sessions/{session}/edit', [SessionController::class, 'edit'])->name('sessions.edit');    
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy'])->name('sessions.destroy');

    Route::get('/sessions/create-recording', [SessionController::class, 'createRecording'])->name('sessions.create-recording');
    Route::post('/sessions/recording', [SessionController::class, 'storeRecording'])->name('sessions.store-recording');
    
    // Route::get('/tasks-index', [MentorTaskController::class, 'index'])->name('tasks.index');

    Route::get('/menteemoduleprogress', [ModuleController::class, 'menteemoduleprogress'])->name('menteemoduleprogress');

    Route::get('/moduleList',[ModuleController::class,'moduleList'])->name('moduleList');
    Route::get('/modulecompletionmail',[ModuleController::class,'modulecompletionmail'])->name('modulecompletionmail');

    //Route::get('/mentor/getChaptersByModule', [MentorController::class, 'getChaptersByModule'])->name('mentor.getChaptersByModule');
    // Route::get('/mentor/showChapterCompletion', [ModuleController::class, 'showChapterCompletionPage'])->name('mentor.showchaptercompletion');
    Route::post('/chapter-mark-completed', [ModuleController::class, 'markChapterCompleted'])->name('chapter.markCompleted');
    // Route::get('/chapter-mark-completed', [ModuleController::class, 'markChapterCompleted'])->name('chapter.markCompleted');
    Route::get('/mentor/markChapterCompletion/{moduleId}', [ModuleController::class, 'showChapterCompletionPage'])->name('mentor.markChapterCompletion');

    Route::get('/quizdetails',[QuizController::class,'quizdetails'])->name('quizdetails');
   
    Route::get('/quizprogress', [QuizController::class, 'getQuizResults'])->name('quizprogress');

    Route::get('/tasksindex',[TaskController::class,'index'])->name('tasks.index');

    Route::post('/tasksstore', [TaskController::class, 'store'])->name('tasks.store');

    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/opportunity', [OpportunityController::class, 'index'])->name('opportunity.index');
    Route::post('/opportunitystore', [OpportunityController::class, 'store'])->name('opportunity.store');

    Route::delete('/opportunity/{id}', [OpportunityController::class, 'destroy'])->name('opportunity.destroy');
    Route::put('/opportunity/{id}', [OpportunityController::class, 'update'])->name('opportunity.update');
    Route::get('/support',[SupportController::class,'index'])->name('support.index');
    Route::get('/mentorsupport/{id}', [SupportController::class, 'supportshow'])->name('mentor.support.show');
    Route::put('/support/{id}', [SupportController::class, 'update'])->name('support.update');

    Route::post('/upload-recording', [SessionController::class, 'uploadRecording'])->name('upload.recording');
    Route::get('/generate-certificate', [CertificateController::class, 'generateCertificate'])->name('generate.certificate');



});

Route::get('/scholarship', [ScholershipController::class, 'show'])->name('scholarship');
Route::get('/scholarshipregister', [ScholershipController::class, 'store'])->name('scholarshipregister');
Route::get('/newlogin', [ScholershipController::class, 'newlogin'])->name('newlogin');


//Route::get('/mentee/dashboard', 'MenteeDashboardController@index')->name('mentee.dashboard');


Route::prefix('mentee')->group(function() {
    Route::get('/tasks-index', [MenteeTaskController::class, 'index'])->name('menteetasks.index');
    Route::post('/tasks/submit', [MenteeTaskController::class, 'submit'])->name('tasks.submit');
    Route::post('/tasks/submitck', [MentorTaskController::class, 'storeCKEditorImages'])->name('tasks.storeCKEditorImages');

    Route::get('/tasks/show/{taskId}', [MenteeTaskController::class, 'show']);

    Route::get('/menteemodule', [MenteeModuleController::class, 'index'])->name('menteemodule.index');

    Route::get('/knowledgebank', [KnowledgebankController::class, 'index'])->name('knowledgebank.index');
    
        
        

    Route::get('/chapterscontent', [MenteeModuleController::class, 'showchapters'])->name('chapterscontent');

    Route::get('/subchaptercontent', [MenteeModuleController::class, 'subchaptercontent'])->name('subchaptercontent');

    Route::get('/viewquiz', [MenteeModuleController::class, 'viewquiz'])->name('viewquiz');
    Route::post('/quiz/submit', [MenteeModuleController::class, 'submitQuiz'])->name('quiz.submit');

    
    Route::get('/menteetickets', [TicketsController::class, 'menteetickets'])->name('mentee.tickets');
    Route::get('/menteetickets/create', [TicketsController::class, 'create'])->name('mentee.tickets.create');
    Route::post('/menteetickets', [TicketsController::class, 'ticketstore'])->name('mentee.tickets.store');
    Route::get('/menteetickets/{id}', [TicketsController::class, 'ticketshow'])->name('mentee.tickets.show');
    Route::put('/mentee/tickets/{id}', [TicketsController::class, 'update'])->name('mentee.tickets.update');


    Route::get('/opportunitiesindex', [OpportunitiesController::class, 'index'])->name('opportunities.index');


    // Route::get('/mentee/calender', [CalenderController::class, 'index'])->name('menteecalender.index');
    Route::get('/calendar', [CalenderController::class, 'showCalendar'])->name('calendar');

    

});

//Route::get('/manage-sessions', 'Mentor/SessionController@index')->name('sessions.index');

Route::match(['post', 'put'], '/sessions/{id}/mark-as-done', 'MentorDashboardController@markAsDone')->name('sessions.mark-as-done');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/adminquizprogress',[QuizprogressController::class,'quizprogress'])->name('adminquizprogress');
    Route::get('/sessionprogress', [SessionsController::class, 'sessionprogress'])->name('sessionprogress');


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Modules
    Route::delete('modules/destroy', 'ModulesController@massDestroy')->name('modules.massDestroy');
    Route::post('modules/parse-csv-import', 'ModulesController@parseCsvImport')->name('modules.parseCsvImport');
    Route::post('modules/process-csv-import', 'ModulesController@processCsvImport')->name('modules.processCsvImport');
    Route::resource('modules', 'ModulesController');

    // Mentors
    Route::delete('mentors/destroy', 'MentorsController@massDestroy')->name('mentors.massDestroy');
    Route::post('mentors/parse-csv-import', 'MentorsController@parseCsvImport')->name('mentors.parseCsvImport');
    Route::post('mentors/process-csv-import', 'MentorsController@processCsvImport')->name('mentors.processCsvImport');
    Route::resource('mentors', 'MentorsController');

    // Mentees
    Route::delete('mentees/destroy', 'MenteesController@massDestroy')->name('mentees.massDestroy');
    Route::post('mentees/parse-csv-import', 'MenteesController@parseCsvImport')->name('mentees.parseCsvImport');
    Route::post('mentees/process-csv-import', 'MenteesController@processCsvImport')->name('mentees.processCsvImport');
    Route::resource('mentees', 'MenteesController');

    // Sessions
    Route::delete('sessions/destroy', 'SessionsController@massDestroy')->name('sessions.massDestroy');
    Route::post('sessions/parse-csv-import', 'SessionsController@parseCsvImport')->name('sessions.parseCsvImport');
    Route::post('sessions/process-csv-import', 'SessionsController@processCsvImport')->name('sessions.processCsvImport');
    Route::resource('sessions', 'SessionsController');

    // Languagespoken
    Route::delete('languagespokens/destroy', 'LanguagespokenController@massDestroy')->name('languagespokens.massDestroy');
    Route::post('languagespokens/parse-csv-import', 'LanguagespokenController@parseCsvImport')->name('languagespokens.parseCsvImport');
    Route::post('languagespokens/process-csv-import', 'LanguagespokenController@processCsvImport')->name('languagespokens.processCsvImport');
    Route::resource('languagespokens', 'LanguagespokenController');

    // Skills
    Route::delete('skills/destroy', 'SkillsController@massDestroy')->name('skills.massDestroy');
    Route::post('skills/parse-csv-import', 'SkillsController@parseCsvImport')->name('skills.parseCsvImport');
    Route::post('skills/process-csv-import', 'SkillsController@processCsvImport')->name('skills.processCsvImport');
    Route::resource('skills', 'SkillsController');

    // Mapping
    Route::delete('mappings/destroy', 'MappingController@massDestroy')->name('mappings.massDestroy');
    Route::post('mappings/parse-csv-import', 'MappingController@parseCsvImport')->name('mappings.parseCsvImport');
    Route::post('mappings/process-csv-import', 'MappingController@processCsvImport')->name('mappings.processCsvImport');
    Route::resource('mappings', 'MappingController');

    // Survey Form
    Route::delete('survey-forms/destroy', 'SurveyFormController@massDestroy')->name('survey-forms.massDestroy');
    Route::post('survey-forms/parse-csv-import', 'SurveyFormController@parseCsvImport')->name('survey-forms.parseCsvImport');
    Route::post('survey-forms/process-csv-import', 'SurveyFormController@processCsvImport')->name('survey-forms.processCsvImport');
    Route::resource('survey-forms', 'SurveyFormController');

    // Guestspeakers
    Route::delete('guestspeakers/destroy', 'GuestspeakersController@massDestroy')->name('guestspeakers.massDestroy');
    Route::post('guestspeakers/parse-csv-import', 'GuestspeakersController@parseCsvImport')->name('guestspeakers.parseCsvImport');
    Route::post('guestspeakers/process-csv-import', 'GuestspeakersController@processCsvImport')->name('guestspeakers.processCsvImport');
    Route::resource('guestspeakers', 'GuestspeakersController');

    // Session Recording
    Route::delete('session-recordings/destroy', 'SessionRecordingController@massDestroy')->name('session-recordings.massDestroy');
    Route::post('session-recordings/media', 'SessionRecordingController@storeMedia')->name('session-recordings.storeMedia');
    Route::post('session-recordings/ckmedia', 'SessionRecordingController@storeCKEditorImages')->name('session-recordings.storeCKEditorImages');
    Route::post('session-recordings/parse-csv-import', 'SessionRecordingController@parseCsvImport')->name('session-recordings.parseCsvImport');
    Route::post('session-recordings/process-csv-import', 'SessionRecordingController@processCsvImport')->name('session-recordings.processCsvImport');
    Route::resource('session-recordings', 'SessionRecordingController');

    // Guest Lectures
    Route::delete('guest-lectures/destroy', 'GuestLecturesController@massDestroy')->name('guest-lectures.massDestroy');
    Route::post('guest-lectures/parse-csv-import', 'GuestLecturesController@parseCsvImport')->name('guest-lectures.parseCsvImport');
    Route::post('guest-lectures/process-csv-import', 'GuestLecturesController@processCsvImport')->name('guest-lectures.processCsvImport');
    Route::resource('guest-lectures', 'GuestLecturesController');

    // One One Attendance
    Route::delete('one-one-attendances/destroy', 'OneOneAttendanceController@massDestroy')->name('one-one-attendances.massDestroy');
    Route::post('one-one-attendances/parse-csv-import', 'OneOneAttendanceController@parseCsvImport')->name('one-one-attendances.parseCsvImport');
    Route::post('one-one-attendances/process-csv-import', 'OneOneAttendanceController@processCsvImport')->name('one-one-attendances.processCsvImport');
    Route::resource('one-one-attendances', 'OneOneAttendanceController');

    // Guest Session Attendance
    Route::delete('guest-session-attendances/destroy', 'GuestSessionAttendanceController@massDestroy')->name('guest-session-attendances.massDestroy');
    Route::post('guest-session-attendances/parse-csv-import', 'GuestSessionAttendanceController@parseCsvImport')->name('guest-session-attendances.parseCsvImport');
    Route::post('guest-session-attendances/process-csv-import', 'GuestSessionAttendanceController@processCsvImport')->name('guest-session-attendances.processCsvImport');
    Route::resource('guest-session-attendances', 'GuestSessionAttendanceController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::post('courses/parse-csv-import', 'CoursesController@parseCsvImport')->name('courses.parseCsvImport');
    Route::post('courses/process-csv-import', 'CoursesController@processCsvImport')->name('courses.processCsvImport');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::post('lessons/parse-csv-import', 'LessonsController@parseCsvImport')->name('lessons.parseCsvImport');
    Route::post('lessons/process-csv-import', 'LessonsController@processCsvImport')->name('lessons.processCsvImport');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::post('tests/parse-csv-import', 'TestsController@parseCsvImport')->name('tests.parseCsvImport');
    Route::post('tests/process-csv-import', 'TestsController@processCsvImport')->name('tests.processCsvImport');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::post('questions/parse-csv-import', 'QuestionsController@parseCsvImport')->name('questions.parseCsvImport');
    Route::post('questions/process-csv-import', 'QuestionsController@processCsvImport')->name('questions.processCsvImport');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::post('question-options/parse-csv-import', 'QuestionOptionsController@parseCsvImport')->name('question-options.parseCsvImport');
    Route::post('question-options/process-csv-import', 'QuestionOptionsController@processCsvImport')->name('question-options.processCsvImport');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::post('test-results/parse-csv-import', 'TestResultsController@parseCsvImport')->name('test-results.parseCsvImport');
    Route::post('test-results/process-csv-import', 'TestResultsController@processCsvImport')->name('test-results.processCsvImport');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::post('test-answers/parse-csv-import', 'TestAnswersController@parseCsvImport')->name('test-answers.parseCsvImport');
    Route::post('test-answers/process-csv-import', 'TestAnswersController@processCsvImport')->name('test-answers.processCsvImport');
    Route::resource('test-answers', 'TestAnswersController');

    // Assign Tasks
    Route::delete('assign-tasks/destroy', 'AssignTasksController@massDestroy')->name('assign-tasks.massDestroy');
    Route::post('assign-tasks/media', 'AssignTasksController@storeMedia')->name('assign-tasks.storeMedia');
    Route::post('assign-tasks/ckmedia', 'AssignTasksController@storeCKEditorImages')->name('assign-tasks.storeCKEditorImages');
    Route::post('assign-tasks/parse-csv-import', 'AssignTasksController@parseCsvImport')->name('assign-tasks.parseCsvImport');
    Route::post('assign-tasks/process-csv-import', 'AssignTasksController@processCsvImport')->name('assign-tasks.processCsvImport');
    Route::resource('assign-tasks', 'AssignTasksController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');


     // Chapters
    Route::delete('chapters/destroy', 'ChaptersController@massDestroy')->name('chapters.massDestroy');
    Route::post('chapters/parse-csv-import', 'ChaptersController@parseCsvImport')->name('chapters.parseCsvImport');
    Route::post('chapters/process-csv-import', 'ChaptersController@processCsvImport')->name('chapters.processCsvImport');
    Route::resource('chapters', 'ChaptersController');

    // Chapter Test
    Route::delete('chapter-tests/destroy', 'ChapterTestController@massDestroy')->name('chapter-tests.massDestroy');
    Route::post('chapter-tests/parse-csv-import', 'ChapterTestController@parseCsvImport')->name('chapter-tests.parseCsvImport');
    Route::post('chapter-tests/process-csv-import', 'ChapterTestController@processCsvImport')->name('chapter-tests.processCsvImport');
    Route::resource('chapter-tests', 'ChapterTestController');

    // Subchapter
    Route::delete('subchapters/destroy', 'SubchapterController@massDestroy')->name('subchapters.massDestroy');
    Route::post('subchapters/media', 'SubchapterController@storeMedia')->name('subchapters.storeMedia');
    Route::post('subchapters/ckmedia', 'SubchapterController@storeCKEditorImages')->name('subchapters.storeCKEditorImages');
    Route::post('subchapters/parse-csv-import', 'SubchapterController@parseCsvImport')->name('subchapters.parseCsvImport');
    Route::post('subchapters/process-csv-import', 'SubchapterController@processCsvImport')->name('subchapters.processCsvImport');
    Route::resource('subchapters', 'SubchapterController');

    // Create Progress Table
    Route::delete('create-progress-tables/destroy', 'CreateProgressTableController@massDestroy')->name('create-progress-tables.massDestroy');
    Route::post('create-progress-tables/parse-csv-import', 'CreateProgressTableController@parseCsvImport')->name('create-progress-tables.parseCsvImport');
    Route::post('create-progress-tables/process-csv-import', 'CreateProgressTableController@processCsvImport')->name('create-progress-tables.processCsvImport');
    Route::resource('create-progress-tables', 'CreateProgressTableController');

 // Moduleresourcebank
    Route::delete('/destroy', 'ModuleresourcebankController@massDestroy')->name('moduleresourcebanks.massDestroy');
    Route::post('moduleresourcebanks/media', 'ModuleresourcebankController@storeMedia')->name('moduleresourcebanks.storeMedia');
    Route::post('moduleresourcebanks/ckmedia', 'ModuleresourcebankController@storeCKEditorImages')->name('moduleresourcebanks.storeCKEditorImages');
    Route::post('moduleresourcebanks/parse-csv-import', 'ModuleresourcebankController@parseCsvImport')->name('moduleresourcebanks.parseCsvImport');
    Route::post('moduleresourcebanks/process-csv-import', 'ModuleresourcebankController@processCsvImport')->name('moduleresourcebanks.processCsvImport');
    Route::resource('moduleresourcebanks', 'ModuleresourcebankController');

// Opportunities
    Route::delete('opportunities/destroy', 'OpportunitiesController@massDestroy')->name('opportunities.massDestroy');
    Route::post('opportunities/parse-csv-import', 'OpportunitiesController@parseCsvImport')->name('opportunities.parseCsvImport');
    Route::post('opportunities/process-csv-import', 'OpportunitiesController@processCsvImport')->name('opportunities.processCsvImport');
    Route::resource('opportunities', 'OpportunitiesController');

      // Ticketcategory
    Route::delete('ticketcategories/destroy', 'TicketcategoryController@massDestroy')->name('ticketcategories.massDestroy');
    Route::post('ticketcategories/parse-csv-import', 'TicketcategoryController@parseCsvImport')->name('ticketcategories.parseCsvImport');
    Route::post('ticketcategories/process-csv-import', 'TicketcategoryController@processCsvImport')->name('ticketcategories.processCsvImport');
    Route::resource('ticketcategories', 'TicketcategoryController');

    // Ticket Description
    Route::delete('ticket-descriptions/destroy', 'TicketDescriptionController@massDestroy')->name('ticket-descriptions.massDestroy');
    Route::post('ticket-descriptions/media', 'TicketDescriptionController@storeMedia')->name('ticket-descriptions.storeMedia');
    Route::post('ticket-descriptions/ckmedia', 'TicketDescriptionController@storeCKEditorImages')->name('ticket-descriptions.storeCKEditorImages');
    Route::post('ticket-descriptions/parse-csv-import', 'TicketDescriptionController@parseCsvImport')->name('ticket-descriptions.parseCsvImport');
    Route::post('ticket-descriptions/process-csv-import', 'TicketDescriptionController@processCsvImport')->name('ticket-descriptions.processCsvImport');
    Route::resource('ticket-descriptions', 'TicketDescriptionController');

    // Ticket Response
    Route::delete('ticket-responses/destroy', 'TicketResponseController@massDestroy')->name('ticket-responses.massDestroy');
    Route::post('ticket-responses/media', 'TicketResponseController@storeMedia')->name('ticket-responses.storeMedia');
    Route::post('ticket-responses/ckmedia', 'TicketResponseController@storeCKEditorImages')->name('ticket-responses.storeCKEditorImages');
    Route::post('ticket-responses/parse-csv-import', 'TicketResponseController@parseCsvImport')->name('ticket-responses.parseCsvImport');
    Route::post('ticket-responses/process-csv-import', 'TicketResponseController@processCsvImport')->name('ticket-responses.processCsvImport');
    Route::resource('ticket-responses', 'TicketResponseController');


    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');



});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

/*

Route::group(['prefix' => 'mentor', 'middleware' => ['auth', 'mentor']], function () {
    Route::get('/dashboard', 'MentorDashboardController@index')->name('mentor.dashboard');
});

Route::group(['prefix' => 'mentee', 'middleware' => ['auth', 'mentee']], function () {
    Route::get('/dashboard', 'MenteeDashboardController@index')->name('mentee.dashboard');
});*/

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Modules
    Route::delete('modules/destroy', 'ModulesController@massDestroy')->name('modules.massDestroy');
    Route::resource('modules', 'ModulesController');

    // Mentors
    Route::delete('mentors/destroy', 'MentorsController@massDestroy')->name('mentors.massDestroy');
    Route::resource('mentors', 'MentorsController');

    // Mentees
    Route::delete('mentees/destroy', 'MenteesController@massDestroy')->name('mentees.massDestroy');
    Route::resource('mentees', 'MenteesController');

    // Sessions
    Route::delete('sessions/destroy', 'SessionsController@massDestroy')->name('sessions.massDestroy');
    Route::resource('sessions', 'SessionsController');

    // Languagespoken
    Route::delete('languagespokens/destroy', 'LanguagespokenController@massDestroy')->name('languagespokens.massDestroy');
    Route::resource('languagespokens', 'LanguagespokenController');

    // Skills
    Route::delete('skills/destroy', 'SkillsController@massDestroy')->name('skills.massDestroy');
    Route::resource('skills', 'SkillsController');

    // Mapping
    Route::delete('mappings/destroy', 'MappingController@massDestroy')->name('mappings.massDestroy');
    Route::resource('mappings', 'MappingController');

    // Survey Form
    Route::delete('survey-forms/destroy', 'SurveyFormController@massDestroy')->name('survey-forms.massDestroy');
    Route::resource('survey-forms', 'SurveyFormController');

    // Guestspeakers
    Route::delete('guestspeakers/destroy', 'GuestspeakersController@massDestroy')->name('guestspeakers.massDestroy');
    Route::resource('guestspeakers', 'GuestspeakersController');

    // Session Recording
    Route::delete('session-recordings/destroy', 'SessionRecordingController@massDestroy')->name('session-recordings.massDestroy');
    Route::post('session-recordings/media', 'SessionRecordingController@storeMedia')->name('session-recordings.storeMedia');
    Route::post('session-recordings/ckmedia', 'SessionRecordingController@storeCKEditorImages')->name('session-recordings.storeCKEditorImages');
    Route::resource('session-recordings', 'SessionRecordingController');

    // Guest Lectures
    Route::delete('guest-lectures/destroy', 'GuestLecturesController@massDestroy')->name('guest-lectures.massDestroy');
    Route::resource('guest-lectures', 'GuestLecturesController');

    // One One Attendance
    Route::delete('one-one-attendances/destroy', 'OneOneAttendanceController@massDestroy')->name('one-one-attendances.massDestroy');
    Route::resource('one-one-attendances', 'OneOneAttendanceController');

    // Guest Session Attendance
    Route::delete('guest-session-attendances/destroy', 'GuestSessionAttendanceController@massDestroy')->name('guest-session-attendances.massDestroy');
    Route::resource('guest-session-attendances', 'GuestSessionAttendanceController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Assign Tasks
    Route::delete('assign-tasks/destroy', 'AssignTasksController@massDestroy')->name('assign-tasks.massDestroy');
    Route::post('assign-tasks/media', 'AssignTasksController@storeMedia')->name('assign-tasks.storeMedia');
    Route::post('assign-tasks/ckmedia', 'AssignTasksController@storeCKEditorImages')->name('assign-tasks.storeCKEditorImages');
    Route::resource('assign-tasks', 'AssignTasksController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
>>>>>>> 0c87cc8 (mentor2)
