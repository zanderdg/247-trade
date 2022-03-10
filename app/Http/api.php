<?php 

/**
 * 
 * Route for Rest API only.
 * 
 */

Route::group(['prefix' => 'api'], function() {

    Route::get('/testing', function() { return response()->json('welcome - 24seven API server', 200); });
    
    Route::post('/deleteJob', 'AWController@deleteJob'); 
    Route::post('/removeLead','AWController@API_removeLead');
    Route::get('/getRoles', 'AWController@getRoles'); 
    Route::get('/myNotificationStatus', 'AWController@myNotificationStatus');
    Route::post('/notifyMe', 'AWController@notifyMe');
    Route::post('/login', 'AWController@API_login');
    Route::post('/decativeAccount', 'AWController@decativeAccount');
    Route::post('/deleteAccount', 'AWController@deleteAccount');   
    Route::post('/resetPassword', 'AWController@resetPassword');    
    Route::get('/getUserProfile', 'AWController@getUserProfile'); 
    Route::post('/postAJob', 'AWController@postAJob');  
    Route::post('/editProfile', 'AWController@editProfile');
    Route::post('/verifyNumber', 'AWController@verifyAccountFromTwilio');
    Route::post('/register', 'AWController@API_register');
    Route::post('/sendNewCode', 'AWController@sendNewCodeFromTwilio');
    Route::post('/forget-password', 'AWController@API_ForgotPassword');
    Route::get('/myLeads', 'AWController@myLeads'); 
    Route::get('/myJobs', 'AWController@myJobs'); 
    Route::get('/categories', 'AWController@categories'); 
    Route::get('/getSubcatByCatId', 'AWController@getSubcatByCatId'); 
    Route::get('/getJobsBySubcatId', 'AWController@getJobsBySubcatId'); 
    Route::get('/getRecentJobs', 'AWController@getRecentJobs'); 
    Route::post('/updateWorkAreaSettings', 'AWController@updateWorkAreaSettings');
    Route::post('/editWorkArea', 'AWController@editWorkArea');
    Route::post('/editService', 'AWController@editService'); 
    Route::post('/contactForm', 'AWController@contactForm');   
    Route::get('/getCoordinatesByUserId', 'AWController@getCoordinatesByUserId');
    Route::post('/editLeadStatus', 'AWController@editLeadStatus');
    Route::get('/myAllLeads','AWController@myAllLeads');
    Route::post('/updateNotificationToken','AWController@updateTokenNotification');

    // twilio
    Route::post('/pay','CheckoutController@mobileCheckout');
    Route::get('/success','CheckoutController@successMobile');
});



