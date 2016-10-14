<?php

/*
|--------------------------------------------------------------------------
| Front-end Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [
	'uses' => 'HomeController@index',
]);


Route::get('/blog', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);

Route::get('/post/{post}', [
	'uses' => 'HomeController@showSinglePost',
	'as' => 'post.show'
]);

Route::get('/category/{category}', [
	'uses' => 'HomeController@showPostsWithCategory',
	'as' => 'category.show'
]);

Route::get('/tag/{tag}', [
	'uses' => 'HomeController@showTaggedPosts',
	'as' => 'tag.show'
]);

/**
 * Search
 */
Route::get('/search', 'SearchController@index');

/*
|--------------------------------------------------------------------------
| Static Pages Routes
|--------------------------------------------------------------------------
*/
Route::get('/contact', [
	'uses' => 'PagesController@showContactUsForm',
	'as' => 'contact'
]);
Route::get('/about', [
	'uses' => 'PagesController@showAboutUsPage',
	'as' => 'about',
]);
Route::get('/privacy', [
	'uses' => 'PagesController@showPrivacyPage',
	'as' => 'privacy'
]);
Route::get('/copyright', [
	'uses' => 'PagesController@showCopyrightPage',
	'as' => 'copyright'
]);

/**
 * User's password reset token
 */
Route::group(['middleware' => 'guest'], function() {
    Route::get('welcome/{token}', 'WelcomeController@index');
    Route::post('welcome/save-password', 'WelcomeController@savePassword');
});


//Route::get('rss', 'RssFeedController@index');


Route::get('sitemap', 'SitemapController@index');
Route::get('/sitemap/posts', [
	'uses' => 'SitemapController@posts',
	'as' => 'sitemap.posts'
]);
Route::get('/sitemap/categories', [
	'uses' => 'SitemapController@categories',
	'as' => 'sitemap.categories'
]);

/**
 * Contact Messages
 */
Route::post('/submit', 'Admin\MessagesController@storeUserShoutout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:access-dashboard'], 'namespace' => 'Admin'], function() {

	/*
	|--------------------------------------------------------------------------
	| Dashboard Route
	| Authorization Level: Author, Editor, Admin
	|--------------------------------------------------------------------------
	*/
	Route::get('/dashboard', [
		'uses' => 'DashboardController@index',
		'as' => 'admin.dashboard'
	]);

	/*
	|--------------------------------------------------------------------------
	| Post Routes
	| Authorization Level: Author, Editor, Admin
	|--------------------------------------------------------------------------
	*/
	Route::get('/posts', [
		'uses' => 'PostsController@index',
		'as' => 'admin.posts'
	]);

	Route::get('/{user}/my_posts', [
		'uses' => 'PostsController@userPosts',
		'as' => 'admin.posts.user'
	]);

	Route::get('/posts/create', [
		'uses' => 'PostsController@create',
		'as' => 'admin.posts.create'
	]);

	Route::post('/posts/store', [
		'uses' => 'PostsController@store',
		'as' => 'admin.posts.store'
	]);

	Route::get('/posts/destroy/{post}', [
		'uses' => 'PostsController@destroy',
		'as' => 'admin.posts.destroy'
	]);

	Route::get('/posts/edit/{post}', [
		'uses' => 'PostsController@edit',
		'as' => 'admin.posts.edit'
	]);

	Route::post('/posts/update/{post}', [
		'uses' => 'PostsController@update',
		'as' => 'admin.posts.update'
	]);

	/*
	|--------------------------------------------------------------------------
	| Categories Routes
	| Authorization Level: Editor, Admin
	|--------------------------------------------------------------------------
	*/
	Route::get('/categories', [
		'uses' => 'CategoriesController@index',
		'as' => 'admin.categories'
	]);

	Route::get('/categories/create', [
		'uses' => 'CategoriesController@create',
		'as' => 'admin.categories.create'
	]);

	Route::post('/categories/store', [
		'uses' => 'CategoriesController@store',
		'as' => 'admin.categories.store'
	]);

	Route::get('/categories/posts/{category}', [
		'uses' => 'CategoriesController@show',
		'as' => 'admin.categories.show'
	]);

	Route::get('/categories/edit/{category}', [
		'uses' => 'CategoriesController@edit',
		'as' => 'admin.categories.edit'
	]);

	Route::post('/categories/update/{category}', [
		'uses' => 'CategoriesController@update',
		'as' => 'admin.categories.update'
	]);

	Route::get('/categories/destroy/{category}', [
		'uses' => 'CategoriesController@destroy',
		'as' => 'admin.categories.destroy'
	]);

	/*
	|--------------------------------------------------------------------------
	| User Profile Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/user/{user}', [
		'uses' => 'ProfileController@index',
		'as' => 'admin.user.profile'
	]);

	Route::get('/user/edit/{user}', [
		'uses' => 'ProfileController@edit',
		'as' => 'admin.user.edit'
	]);

	Route::post('/user/update/{user}', [
		'uses' => 'ProfileController@update',
		'as' => 'admin.user.update'
	]);

	Route::get('/user/changepwd/{user}', [
		'uses' => 'ProfileController@changepwd',
		'as' => 'admin.user.changepwd'
	]);

	Route::post('/user/updatepwd/{user}', [
		'uses' => 'ProfileController@updatepwd',
		'as' => 'admin.user.updatepwd'
	]);

	Route::get('/user/{user}/avatar', [
		'uses' => 'ProfileController@getUpdateAvatar',
		'as' => 'admin.user.avatar'
	]);

	Route::post('/user/{user}/upload', [
		'uses' => 'ProfileController@postUpdateAvatar',
		'as' => 'admin.user.avatarupload'
	]);


	/*
	|--------------------------------------------------------------------------
	| User Administration Routes
	| Authorization Level: Admin
	|--------------------------------------------------------------------------
	*/
	Route::get('/users', [
		'uses' => 'UsersController@show',
		'as' => 'admin.users'
	]);

	Route::get('/users/add', [
		'uses' => 'UsersController@showUserRegistrationForm',
		'as' => 'admin.users.add'
	]);

	Route::post('/users/register', [
		'uses' => 'UsersController@registerUser',
		'as' => 'admin.users.register'
	]);

	Route::post('/users/changeroles', [
		'uses' => 'UsersController@updateUserRoles',
		'as' => 'admin.users.assign'
	]);

	/**
	 * Mailbox
	 */
	Route::get('/mailbox/inbox',[
		'uses' => 'MailboxController@inbox',
		'as' => 'admin.mailbox'
	]);

	Route::get('/mailbox/{message}', [
		'uses' => 'MailboxController@showMessage',
		'as' => 'admin.mailbox.mail'
	]);

	Route::get('/mailbox/destroy/{message}', [
		'uses' => 'MailboxController@destroy',
		'as' => 'admin.mailbox.destroy'
	]);


	/**
	 * Settings
	 */
	Route::get('/settings/index', [
		'uses' => 'SettingsController@index',
		'as' => 'admin.settings.index'
	]);

	Route::get('/settings/edit', [
		'uses' => 'SettingsController@showSettingsEditForm',
		'as' => 'admin.settings.edit'
	]);

	Route::post('/settings/update/{setting}', [
		'uses' => 'SettingsController@update',
		'as' => 'admin.settings.update'
	]);

});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
