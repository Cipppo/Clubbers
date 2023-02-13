<?php


use App\Http\Controllers\ClubRegistrationController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\followedController;
use App\Http\Controllers\followersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\likePostClubberController;
use App\Http\Controllers\postClubberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\postClubController;
use App\Http\Controllers\postController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\TerminatedEventsController;
use App\Models\foto_post_club;
use App\Models\likePostClubber;

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
    return view("Home.home");
})->name('Home.home');



Route::middleware(['auth'])->group(function(){
    Route::get('/home', function(){
        return view('Feed.feed');
})->name("Feed.Home");
});

Route::get('/post/create', [postClubberController::class, 'create'])->name('Post.create');
Route::post('/post/store', [postClubberController::class, 'store'])->name('Post.store');

Route::post('/post/react/like', [likePostClubberController::class, 'store'])->name('Like.store');
Route::get('/post/react/{id}', [likePostClubberController::class, 'getStats'])->name('Like.info');

Route::get('/create-club', [ClubRegistrationController::class, 'create'])->name('Club.create');
Route::post('/create-club', [ClubRegistrationController::class, 'store'])->name('Club.store');

Route::get('/create-user', [Usercontroller::class, 'create'])->name('User.create');
Route::post('/create-user', [Usercontroller::class, 'store'])->name('User.store');

Route::get('/logout', [LoginController::class, 'logOut'])->name('User.logout');
Route::get('/log-user', [LoginController::class, 'create'])->name('User.log');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name(('User.login'));

Route::get('/image/{id}', [ImageController::class, 'get'])->name('Image.get');
Route::get('/images/banners/{eventId}', [ImageController::class, 'getBannerUrl'])->name("Banner.get");

Route::get('/calendar', function(){
    return view('Calendario.calenDARIO');
})->name("Calendario");

Route::get('/calendar/date/{date}', [EventController::class, 'getEventsbyDate'])->name("Calendar.InDate");
Route::get('/calendar/date/event/{date}', [EventController::class, 'isEvent'])->name('Calendar.isThereanEvent');

Route::get('/user/followedNotonGoingEvents', [EventController::class, 'getAuthUserNotOnGoingEvents'])->name('User.getFollowedNotOnGoingEvents');
Route::get('/user/show/{id}', [Usercontroller::class, 'show'])->name('User.show');
Route::get('/user/events/terminated/{id}', [TerminatedEventsController::class, 'getUserTerminatedEvents'])->name('User.terminatedEvents');

Route::get('/event/show/{id}', [EventController::class, 'show'])->name('Event.show');
Route::get('/event/create', [EventController::class, 'create'])->name('Event.create');
Route::post('/event/store', [EventController::class, 'store'])->name("Event.store");

Route::post('/event/partecipate/{eventId}', [EventController::class, 'setPartecipation'])->name('Event.Partecipate');
Route::post('/event/removePartecipation/{eventId}', [EventController::class, 'removePartecipation'])->name("Event.removePartecipation");

Route::get('/post/club/create', [postClubController::class, 'create'])->name("PostClub.create");
Route::post('/post/club/store', [postClubController::class, 'store'])->name("PostClub.store");
Route::get('/post/show/{id}', [postClubberController::class, 'show'])->name("PostClubber.store");
Route::get('/user/post/{id}', [Usercontroller::class, 'getAllPosts'])->name("User.getPost");

Route::get('/users/names', [Usercontroller::class, 'getAllUsersNames'])->name('Users.names');



Route::get('/post/comments/show/{postId}', [commentController::class, 'getPostComments'])->name("Comments.show");
Route::post('/posts/comment/add', [commentController::class, 'store'])->name("Comments.store");

Route::get('/user/profile',[Usercontroller::class, 'show'])->name("User.show");

Route::get('/events/onGoing/{clubName}', [EventController::class, 'getAllOnGoingClubEvents'])->name('Events.onGoing');
Route::get('/events/notOnGoing/{clubName}', [EventController::class, 'getAllNotOnGoingEvents'])->name('Events.notOnGoing');
Route::get('/events/current/onGoing', [EventController::class, 'getAllOnGoingAuthClubEvents'])->name("Events.currentOnGoing");
Route::get('/events/isPartecipating/{idEvento}', [EventController::class, 'isAuthPartecipating'])->name("Event.Partecipating");
Route::post('/event/end/{id}', [EventController::class, 'markAsEnd'])->name("Event.close");

Route::get('/user/following/{id}', [followedController::class, 'amIFollowing'])->name('User.isFollowing');
Route::get('/user/countFollowing/{id}', [followedController::class, 'countFollowed'])->name("User.countFollowed");
Route::get('/user/countFollowers/{id}', [followersController::class, 'countFollowers'])->name("User.coutnFollowers");
Route::post('/user/follow/{id}', [followedController::class, 'startFollowing'])->name('user.follow');
Route::post('/user/unfollow/{id}', [followedController::class, 'removeFollow'])->name('User.unfollow');

Route::get('/user/showFollowers/{id}', [followersController::class, 'getFollowers'])->name("User.followers");


Route::post('/search', [searchController::class, 'search'])->name('Search');

Route::get('/notifications', [notificationController::class, 'show'])->name('Notification.show');


