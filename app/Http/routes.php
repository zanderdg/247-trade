<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
* Sentinel filter
*name
* Checks if the user is logged in
*/
//Route::group(['middleware' => ['web']], function () {
	Route::filter('Sentinel', function()
	{
		if ( ! Sentinel::check()) {
	 		return Redirect::to('administrator/signin')->with('error', 'You must be logged in!');
	 	}
	});
	/**
	 * Model binding into route
	 */
	Route::model('page', 'App\Models\Page');
	Route::model('location', 'App\Models\Location');	
	Route::model('menu_link', 'App\Models\MenuLink');
	Route::model('customer_request', 'App\Models\CustomerRequest');	
	Route::model('slider', 'App\Models\Slider');
	Route::model('faq', 'App\Models\Faq');
	Route::model('testimonial', 'App\Models\Testimonial');
	Route::model('category', 'App\Models\Category');	
	Route::model('subcategory', 'App\Models\SubCategory');	
	Route::model('job', 'App\Models\Job');	
	Route::pattern('slug', '[a-z0-9- _]+');

	Route::group(array('prefix' => 'administrator'), function () {

		# Error pages should be shown without requiring login
		Route::get('404', function () { return View('admin/404'); });
		Route::get('500', function () { return View::make('admin/500'); });

		# Lock screen
		Route::get('lockscreen', function () { return View::make('admin/lockscreen'); });

		# All basic routes defined here
		Route::get('signin', array('as' => 'signin','uses' => 'AuthController@getSignin'));
		Route::post('signin','AuthController@postSignin');
		Route::post('signup',array('as' => 'signup','uses' => 'AuthController@postSignup'));
		Route::post('forgot-password',array('as' => 'forgot-password','uses' => 'AuthController@postForgotPassword'));
		Route::get('login2', function () { return View::make('admin/login2'); });

		# Register2
		Route::get('register2', function () { return View::make('admin/register2'); });
		Route::post('register2',array('as' => 'register2','uses' => 'AuthController@postRegister2'));
		
		# Forgot Password Confirmation
	    Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	    # Logout
		Route::get('logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));

		# Account Activation
	    Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	    # Dashboard / Index
		Route::get('/', array('as' => 'dashboard','uses' => 'AWController@showHome'));
	
		#Roles And Permissions --- 24seven
		Route::group(array('prefix' => 'role&permissionManagement', 'before' => 'Sentinel',), function() {
			Route::get('/', function() {
				return 'role&permissionManagement';
			});

			#Roles --- 24seven
			Route::group(array('prefix' => 'roles'), function() {
				Route::get('/', array('as' => 'roles', 'uses' => 'RolesController@getIndex'));
				Route::get('create', array('as' => 'create/role', 'uses' => 'RolesController@getCreate'));				
				Route::post('create', 'RolesController@postCreate');
				Route::get('{id}/preview', array('as' => 'preview/role', 'uses' => 'RolesController@Preview'));
				Route::get('{id}/edit', array('as' => 'update/role', 'uses' => 'RolesController@getEdit'));
	        	Route::post('{id}/edit', 'RolesController@postEdit');
				Route::get('data', array('as' => 'roles/data', 'uses' => 'RolesController@data'));
			});

			#Permissions --- 24seven
			Route::group(array('prefix' => 'permissions'), function() {
				Route::get('/', array('as' => 'permissions', 'uses' => 'PermissionsController@getIndex'));
				Route::get('create', array('as' => 'create/permission', 'uses' => 'PermissionsController@getCreate'));
				Route::post('create', 'PermissionsController@postCreate');
				Route::get('{id}/preview', array('as' => 'preview/permission', 'uses' => 'PermissionsController@Preview'));
				Route::get('{id}/edit', array('as' => 'update/permission', 'uses' => 'PermissionsController@getEdit'));
	        	Route::post('{id}/edit', 'PermissionsController@postEdit');
				Route::get('data', array('as' => 'permissions/data', 'uses' => 'PermissionsController@data'));
			});
		});

		# User Management --- 24seven
		Route::group(array('prefix' => 'users', 'before' => 'Sentinel' /*'middleware' => 'roles'*/), function () {
		
			# Trades People --- 24seven
			Route::group(array('prefix' => 'tradespeople'), function () {
				Route::get('/', array('as' => 'tradespeople', 'uses' => 'TradespeopleController@getIndex'));
				Route::get('{userId}/edit', array('as' => 'tradespeople/update', 'uses' => 'TradespeopleController@getEdit'));
				Route::post('{userId}/edit', 'TradespeopleController@postEdit');
				Route::get('{userId}/block', array('as' => 'block/tradespeople', 'uses' => 'TradespeopleController@getBlock'));
				Route::get('{userId}/confirm-block', array('as' => 'confirm-block/tradespeople', 'uses' => 'TradespeopleController@getModalBlock'));
				Route::get('{userId}/unblock', array('as' => 'unblock/tradespeople', 'uses' => 'TradespeopleController@getUnblock'));
				Route::get('/data', array('as' => 'tradespeople/data', 'uses' => 'TradespeopleController@data'));
			});

			# Home Owners --- 24seven
			Route::group(array('prefix' => 'homeowner'), function () {
				Route::get('/', array('as' => 'homeowner', 'uses' => 'HomeownerController@getIndex'));
				Route::get('{userId}/edit', array('as' => 'homeowner/update', 'uses' => 'HomeownerController@getEdit'));
				Route::post('{userId}/edit', 'HomeownerController@postEdit');
				Route::get('{userId}/block', array('as' => 'block/homeowner', 'uses' => 'HomeownerController@getBlock'));
				Route::get('{userId}/confirm-block', array('as' => 'confirm-block/homeowner', 'uses' => 'HomeownerController@getModalBlock'));
				Route::get('{userId}/unblock', array('as' => 'unblock/homeowner', 'uses' => 'HomeownerController@getUnblock'));
				Route::get('/data', array('as' => 'homeowner/data', 'uses' => 'HomeownerController@data'));
			});

			Route::get('/', array('as' => 'users', 'uses' => 'UsersController@getIndex'));
	    	Route::get('create', array('as' => 'create/user', 'uses' => 'UsersController@getCreate'));
	        Route::post('create', 'UsersController@postCreate');
	        Route::get('{userId}/edit', array('as' => 'users/update', 'uses' => 'UsersController@getEdit'));
	        Route::post('{userId}/edit', 'UsersController@postEdit');
	    	Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
			Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
			Route::get('{userId}/disable', array('as' => 'disable/user', 'uses' => 'UsersController@getDisable'));
			Route::get('{userId}/confirm-disable', array('as' => 'confirm-disable/user', 'uses' => 'UsersController@getModalDisable'));
			Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
			Route::get('{userId}', array('as' => 'users/show', 'uses' => 'UsersController@show'));

		});
		Route::get('deleted_users', array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

		# Subscribers --- 24seven
		Route::group(array('prefix' => 'subscribers'), function() {
			Route::get('/', array('uses' => 'SubscribersController@getIndex'));
			Route::get('data', array('as' => 'subscribers/data','uses' => 'SubscribersController@data'));
		});	
		
		# Contact_us --- 24seven
		Route::group(array('prefix' => 'contact'), function() {
			Route::get('/', array('uses' => 'ContactController@getIndex'));
			Route::post('create', array('as' => 'create/contact', 'uses' => 'ContactController@postCreate'));
			Route::get('{userId}/preview', array('as' => 'preview/contact', 'uses' => 'ContactController@perview'));
			Route::get('data', array('as' => 'contacts/data','uses' => 'ContactController@data'));
		});		
		
		# API --- 24seven
		Route::group(array('prefix' => 'api'), function () {
			// Route::get('/', array('as' => 'api', 'uses' => 'APIController@index'));
			Route::get('/stripe', array('as' => 'api-stripe', 'uses' => 'APIController@stripe'));
			Route::get('/google-map', array('as' => 'api-google-map', 'uses' => 'APIController@googleMap'));
			Route::get('/twilio', array('as' => 'api-twilio', 'uses' => 'APIController@twilio'));
			// Route::get('{userId}/edit', array('as' => 'tradepeople/update', 'uses' => 'TradespeopleController@getEdit'));
			// Route::post('{userId}/edit', 'TradespeopleController@postEdit');
			// Route::get('{userId}/block', array('as' => 'block/tradepeople', 'uses' => 'TradespeopleController@getBlock'));
			// Route::get('{userId}/confirm-block', array('as' => 'confirm-block/tradepeople', 'uses' => 'TradespeopleController@getModalBlock'));
			// Route::get('{userId}/unblock', array('as' => 'unblock/tradepeople', 'uses' => 'TradespeopleController@getUnblock'));
		});

		# Categories --- 24seven
	    Route::group(array('prefix' => 'category','before' => 'Sentinel', /*'middleware' => 'roles'*/), function () {
	        Route::get('/', array('as' => 'category', 'uses' => 'CategoryController@getIndex'));
	        Route::get('create', array('as' => 'create/category', 'uses' => 'CategoryController@getCreate'));
			Route::post('create', 'CategoryController@postCreate');
			Route::get('{id}/preview', array('as' => 'preview/category', 'uses' => 'CategoryController@Preview'));
	        Route::get('{id}/edit', array('as' => 'update/category', 'uses' => 'CategoryController@getEdit'));
	        Route::post('{id}/edit', 'CategoryController@postEdit');
	        Route::get('{category}/delete', array('as' => 'delete/category', 'uses' => 'CategoryController@getDelete'));
	        Route::get('{category}/confirm-delete', array('as' => 'confirm-delete/category', 'uses' => 'CategoryController@getModalDelete'));
	        Route::get('{category}/restore', array('as' => 'restore/category', 'uses' => 'CategoryController@getRestore'));
			Route::get('data', array('as' => 'data/category', 'uses' => 'CategoryController@data'));
		});

		# Sub-categories --- 24seven
	    Route::group(array('prefix' => 'subcategory','before' => 'Sentinel', /*'middleware' => 'roles'*/), function () {
	        Route::get('/', array('as' => 'subcategory', 'uses' => 'SubCategoryController@getIndex'));
	        Route::get('create', array('as' => 'create/subcategory', 'uses' => 'SubCategoryController@getCreate'));
			Route::post('create', 'SubCategoryController@postCreate');
			Route::get('{id}/preview', array('as' => 'preview/subcategory', 'uses' => 'SubCategoryController@Preview'));
	        Route::get('{id}/edit', array('as' => 'update/subcategory', 'uses' => 'SubCategoryController@getEdit'));
	        Route::post('{id}/edit', 'SubCategoryController@postEdit');
	        Route::get('{subcategory}/delete', array('as' => 'delete/subcategory', 'uses' => 'SubCategoryController@getDelete'));
	        Route::get('{subcategory}/confirm-delete', array('as' => 'confirm-delete/subcategory', 'uses' => 'SubCategoryController@getModalDelete'));
	        Route::get('{subcategory}/restore', array('as' => 'restore/subcategory', 'uses' => 'SubCategoryController@getRestore'));
			Route::get('data', array('as' => 'data/subcategory', 'uses' => 'SubCategoryController@data'));
		});

		// # jobs --- 24seven
	    Route::group(array('prefix' => 'job','before' => 'Sentinel' /*'middleware' => 'roles'*/), function () {
			Route::get('/', array('as' => 'job', 'uses' => 'JobController@getIndex'));
			Route::get('create', array('as' => 'create/job', 'uses' => 'JobController@getCreate'));
			Route::post('create', 'JobController@postCreate');
			Route::get('{id}/preview', array('as' => 'preview/job', 'uses' => 'JobController@Preview'));
			Route::get('{id}/edit', array('as' => 'update/job', 'uses' => 'JobController@getEdit'));
			Route::post('{id}/edit', 'JobController@postEdit');
			Route::get('{job}/delete', array('as' => 'delete/job', 'uses' => 'JobController@getDelete'));
			Route::get('{job}/confirm-delete', array('as' => 'confirm-delete/job', 'uses' => 'JobController@getModalDelete'));
			Route::get('{job}/restore', array('as' => 'restore/job', 'uses' => 'JobController@getRestore'));
			Route::get('data', array('as' => 'data/job', 'uses' => 'JobController@data'));
		});
		
		# jobs --- 24seven
	    Route::group(array('prefix' => 'job','before' => 'Sentinel' /*'middleware' => 'roles'*/), function () {
			Route::get('/', array('as' => 'job', 'uses' => 'JobController@getIndex'));
            // Route::get('create', array('as' => 'create/job', 'uses' => 'JobController@getCreate'));
            // Route::post('create', 'JobController@postCreate');
			Route::get('{id}/preview', array('as' => 'preview/job', 'uses' => 'JobController@Preview'));
            // Route::get('{id}/edit', array('as' => 'update/job', 'uses' => 'JobController@getEdit'));
            // Route::post('{id}/edit', 'JobController@postEdit');
			Route::get('{job}/delete', array('as' => 'delete/job', 'uses' => 'JobController@getDelete'));
			Route::get('{job}/confirm-delete', array('as' => 'confirm-delete/job', 'uses' => 'JobController@getModalDelete'));
            // Route::get('{job}/restore', array('as' => 'restore/job', 'uses' => 'JobController@getRestore'));
			Route::get('data', array('as' => 'data/job', 'uses' => 'JobController@data'));
		});
		
		# Questions --- 24seven
	    Route::group(array('prefix' => 'question', 'before' => 'Sentinel' /*'middleware' => 'roles'*/), function () {
	        Route::get('/', array('as' => 'question', 'uses' => 'QuestionController@getIndex'));
	        Route::get('create', array('as' => 'create/question', 'uses' => 'QuestionController@getCreate'));
			Route::post('create', 'QuestionController@postCreate');

			Route::get('attach-detach', array('as' => 'attachDetach/question', 'uses' => 'QuestionController@attachDetach'));
			Route::post('get-sub-categories', 'QuestionController@subCategories');
			Route::post('get-questions', 'QuestionController@question');
			Route::post('attach', 'QuestionController@syncQue');
			
			Route::get('{id}/preview', array('as' => 'preview/question', 'uses' => 'QuestionController@Preview'));
	        Route::get('{id}/edit', array('as' => 'update/question', 'uses' => 'QuestionController@getEdit'));
	        Route::post('{id}/edit', 'QuestionController@postEdit');
	        Route::get('{question}/delete', array('as' => 'delete/question', 'uses' => 'QuestionController@getDelete'));
	        Route::get('{question}/confirm-delete', array('as' => 'confirm-delete/question', 'uses' => 'QuestionController@getModalDelete'));
	        Route::get('{question}/restore', array('as' => 'restore/question', 'uses' => 'QuestionController@getRestore'));
			Route::get('data', array('as' => 'data/question', 'uses' => 'QuestionController@data'));
		});
		Route::group(array('prefix' => 'faq','before' => 'Sentinel', /*'middleware' => 'roles'*/), function () {
			Route::get('/', array('as' => 'faqs', 'uses' => 'FaqController@getIndex'));
			Route::get('create', array('as' => 'create/faq', 'uses' => 'FaqController@getCreate'));
			Route::post('create', 'FaqController@postCreate');
			Route::get('{id}/preview',  array('as' => 'preview/faq', 'uses' => 'FaqController@Preview'));
			Route::get('{faq}/edit', array('as' => 'update/faq', 'uses' => 'FaqController@getEdit'));
			Route::post('{faq}/edit', 'FaqController@postEdit');
			Route::get('{faq}/delete', array('as' => 'delete/faq', 'uses' => 'FaqController@getDelete'));
			Route::get('{faq}/confirm-delete', array('as' => 'confirm-delete/faq', 'uses' => 'FaqController@getModalDelete'));
			Route::get('{faq}/restore', array('as' => 'restore/faq', 'uses' => 'FaqController@getRestore'));
			Route::get('data', array('as' => 'data/faq', 'uses' => 'FaqController@data'));
		});
		Route::group(array('prefix' => 'page', /*'middleware' => 'roles'*/), function () {
			Route::get('/', array('as' => 'pages', 'uses' => 'PageController@getIndex'));
			Route::get('create', array('as' => 'create/page', 'uses' => 'PageController@getCreate'));
			Route::post('create', 'PageController@postCreate');
			Route::post('preview', 'PageController@postCreatePreview');
			Route::get('{page}/edit', array('as' => 'update/page', 'uses' => 'PageController@getEdit'));
			Route::post('{page}/edit', 'PageController@postEdit');
			Route::get('{page}/delete', array('as' => 'delete/page', 'uses' => 'PageController@getDelete'));
			Route::get('{page}/confirm-delete', array('as' => 'confirm-delete/page', 'uses' => 'PageController@getModalDelete'));
			Route::get('{page}/restore', array('as' => 'restore/page', 'uses' => 'PageController@getRestore'));
			Route::get('data', array('as' => 'data/page', 'uses' => 'PageController@data'));
		});
		Route::group(array('prefix' => 'testimonial','before' => 'Sentinel', /*'middleware' => 'roles'*/), function () {
			Route::get('/', array('as' => 'testimonials', 'uses' => 'TestimonialController@getIndex'));
			Route::get('create', array('as' => 'create/testimonial', 'uses' => 'TestimonialController@getCreate'));
			Route::post('create', 'TestimonialController@postCreate');
			Route::get('{testimonial}/edit', array('as' => 'update/testimonial', 'uses' => 'TestimonialController@getEdit'));
			Route::post('{testimonial}/edit', 'TestimonialController@postEdit');
			Route::get('{testimonial}/delete', array('as' => 'delete/testimonial', 'uses' => 'TestimonialController@getDelete'));
			Route::get('{testimonial}/confirm-delete', array('as' => 'confirm-delete/testimonial', 'uses' => 'TestimonialController@getModalDelete'));
			Route::get('{testimonial}/restore', array('as' => 'restore/testimonial', 'uses' => 'TestimonialController@getRestore'));
			Route::get('data', array('as' => 'data/testimonial', 'uses' => 'TestimonialController@data'));
		});
		Route::group(array('prefix' => 'menu_link','before' => 'Sentinel', /*'middleware' => 'roles'*/), function () {
			Route::get('/', array('as' => 'menu_links', 'uses' => 'MenuLinkController@getIndex'));
			Route::get('create', array('as' => 'create/menu_link', 'uses' => 'MenuLinkController@getCreate'));
			Route::post('create', 'MenuLinkController@postCreate');
			Route::get('{menu_link}/edit', array('as' => 'update/menu_link', 'uses' => 'MenuLinkController@getEdit'));
			Route::post('{menu_link}/edit', 'MenuLinkController@postEdit');
			Route::get('{menu_link}/delete', array('as' => 'delete/menu_link', 'uses' => 'MenuLinkController@getDelete'));
			Route::get('{menu_link}/confirm-delete', array('as' => 'confirm-delete/menu_link', 'uses' => 'MenuLinkController@getModalDelete'));
			Route::get('{menu_link}/restore', array('as' => 'restore/menu_link', 'uses' => 'MenuLinkController@getRestore'));
		});

		Route::get('theme_option', array('as' => 'theme_option','uses' => 'SettingController@getThemeOption'));
		Route::post('theme_option', 'SettingController@postThemeOption');

		Route::get('configuration', array('as' => 'configuration','uses' => 'SettingController@getConfiguration'));
		Route::post('configuration', 'SettingController@postConfiguration');

	    Route::post('crop_demo','AWController@crop_demo');
		Route::get('site_setting', array('as' => 'site_setting','uses' => 'SiteSettingController@getSetting', /*'middleware' => 'roles'*/));
		Route::post('site_setting', 'SiteSettingController@postSetting');

		# datatables
		Route::get('datatables', 'DataTablesController@index');
		Route::get('datatables/data', array('as' => 'admin.datatables.data', 'uses' => 'DataTablesController@data'));

		# Remaining pages will be called from below controller method
		# in real world scenario, you may be required to define all routes manually
		Route::get('{name?}', 'AWController@showView');
	});

	#frontend views
	# Web General Routes
	Route::get('/', 'AWController@homePage')->name('index');
	Route::get('data/categoryID', 'AWController@Wizard');  // ajax calling route.
	Route::get('categories', array('as' => 'categories', 'uses' => 'CategoryController@categories'));
	Route::post('services', array('as' => 's.services', 'uses' => 'CategoryController@SearchServices'));
	Route::get('post-a-job', array('as' => 'postJob', 'uses' => 'JobController@post_job'));
	Route::post('post-a-job', 'JobController@postCreate');
	Route::get('post-job', array('as' => 'beforePostJob', 'uses' => 'JobController@beforePost'));
	Route::post('post-job', 'JobController@postCreate');
	// Live-Leads
	Route::get('/live-leads', array('as' => 'liveleads', 'uses' => 'AWController@liveleads'));		
	Route::post('/live-leads/remove-lead', array('as' => 'remove-lead', 'uses' => 'AWController@removeLead'));
	/*ajax calling route.*/
	Route::get('data/liveleads', 'AWController@leadsData');	
	Route::get('livelead/{id}/preview', array('as' => 'livelead-preview', 'uses' => 'JobController@preview'));
	Route::post('getSubscribe', 'SubscribersController@getSubscribe');

	Route::post('leads', 'AWController@jsonLeads');
	Route::get('checkout/{jobId}', array('as' => 'checkout', 'uses' => 'CheckoutController@checkout'));
	Route::post('store_payment_details', 'CheckoutController@storePaymentDetails');
	
	Route::group(['middleware' => ['guest']], function () {
		# client-login
		Route::get('login', array('as' => 'client-login', 'uses' => 'AWController@clientLogin'));
		Route::post('login', 'AWController@postclientLogin');		
		Route::get('register/verify/{confirmationCode}', array('us' => 'user-verification', 'uses' => 'ProfileController@Emailverified'));
	});

	Route::group(['middleware' => ['auth', 'verify']], function () {
		# Account
		Route::group(array('prefix' => 'account'), function() {
			Route::get('/', array('as' => 'client-dashboard', 'uses' => 'AWController@clientDashboard'));
			Route::post('tradespeople-data', 'AWController@tradespeopleJsonData');
			Route::post('homeowner-data', 'AWController@homeownerJsonData');

			// Route::get('job/create', array('as' => 'job-create', 'uses' => 'JobController@getCreate'));
			// Route::post('job/posting', 'JobController@postCreate');

			# Trade Poeple
			Route::post('job/moveto', array('as' => 'moveTo', 'uses' => 'AWController@moveTo'));
			Route::get('job/{id}/edit', array('as' => 'job-edit', 'uses' => 'JobController@getEdit'));
			Route::get('job/{id}/preview', array('as' => 'job-preview', 'uses' => 'JobController@preview'));
			Route::post('job/delete', array('as' => 'job-delete', 'uses' => 'JobController@destroy'));

			#Profile
			Route::group(['prefix' => 'profile'], function () {
				Route::get('/', array('as' => 'client-profile', 'uses' => 'ProfileController@index'));
				Route::post('update-avatar', 'ProfileController@updateAvatar'); // Ajax Route
				Route::post('getUserData', 'ProfileController@userData'); // Ajax Route
				Route::get('/{id}/edit', array('as' => 'update-profile', 'uses' => 'ProfileController@getEdit'));
				Route::post('/{id}/edit', 'ProfileController@postEdit');
				Route::get('profile-edit', array('as' => 'client-profile-edit', 'uses' => 'AWController@clientEdit'));
				Route::post('profile-edit', 'AWController@postClientEdit');
			});
			
			Route::get('/user-experience', 'AWController@userExperience');

			# Setting
			Route::group(['prefix' => 'setting'], function () {
				Route::get('/', array('as' => 'account_setting', 'uses' => 'AccountController@getIndex'));
				Route::get('service', array('as' => 'edit_service', 'uses' => 'AccountController@getEditService')); 
				Route::post('service/{id}/edit', 'AccountController@postEditService'); // Ajax Route
				// Route::get('workarea', array('as' => 'account_workarea', 'uses' => 'AccountController@getCoordinates'));
				Route::post('workarea/{id}/edit', 'AccountController@postEditWorkArea');
				Route::post('updatePassword', 'AccountController@updatePassword');
				Route::get('deleteAccount', 'AccountController@deleteAccount');
				Route::post('allowed-notifications', 'AccountController@notificationStatus');
			});
		});

		// Homeowner
		Route::post('discard-post', array('as' => 'discardPost', 'uses' => 'JobController@discardPost'));
		
		//Comment & reviews
		Route::group(['prefix' => 'review'], function () {
			Route::get('/create', array('as' => 'create-review', 'uses' => 'ReviewController@create'));
			Route::post('/create', 'ReviewController@store');
		});

		// Only for guest and homeonwer view of tradespeople profile
		Route::group(array('prefix' => 'tradesperson'), function() {
			Route::get('profile/{id}', array('as' => 'guest-profile-view', 'uses' => 'ProfileController@GuestProfileView')); // homeonwer View for review

			// ReviewController
			Route::post('review/{id}/{tradesperson}/{job_id}', array('as' => 'post-review', 'uses' =>'ReviewController@store'));
		});
	});
	Route::post('workarea/getJob', 'JobController@getAllJob'); // ajax calling route.
	
	#Verify Email Account
	Route::post('checkNumber', 'ProfileController@checkNumber');
	Route::post('ihaveAcode', 'ProfileController@ihaveAcode');
	Route::post('number-verifed', 'ProfileController@verifyCode');
	Route::post('resend-code', 'ProfileController@resendCode');

	Route::get('registration', array('as' => 'client-registration', 'uses' => 'AWController@clientRegister'));
	Route::post('registration', 'AWController@postclientRegister');
	Route::get('logout', array('as' => 'client-logout', 'uses' => 'AWController@clientLogout'));
	
	Route::get('user-info', array('us' => 'user-info', 'uses' => 'AWController@user-info'));
	Route::get('subscription', array('as' => 'client-subscription', 'uses' => 'AWController@clientSubscription'));
	
	Route::get('forgot-password', array('as' => 'client-forgot-password', 'uses' => 'AWController@clientForgotPassword'));
	Route::post('forgot-password', 'AWController@postClientForgotPassword');
	Route::get('password-reset/{userId}/{passwordResetCode}', array('as' => 'client-reset-password', 'uses' => 'AWController@getForgotPasswordConfirm'));
	Route::post('password-reset/{userId}/{passwordResetCode}', 'AWController@postForgotPasswordConfirm');

	// Dynamic Route
	Route::get('{name?}', 'AWController@showFrontEndView');