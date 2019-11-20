<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = "ClientController";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin-login'] 		= "AdminController";
$route['after-login'] 		= "AdminController/login";
$route['dashboard'] 		= "AdminController/dashboard";
$route['profile-setting'] 	= "AdminController/settings";
$route['change-password']	= "AdminController/change_password";
$route['update-setting'] 	= "AdminController/Update_Profile";
$route['all-projects'] 		= 'ProjectsController';
$route['all-buildings'] 	= 'BuildingController';
$route['save-buildings']	= 'BuildingController/save_buildings';
$route['save-flats']		= 'BuildingController/save_flats';
$route['get-builByp']		= 'BuildingController/getBuildings';
$route['booking-details']	= 'AdminController/BookingDetails';

$route['edit-project/(:any)'] 	= 'ProjectsController/Edit';
$route['add-building'] 	= 'BuildingController/show';
$route['edit-building/(:any)'] 	= 'BuildingController/Edit';
$route['add-flats'] 	= 'BuildingController/add_flats';
$route['edit-flat/(:num)'] 	= 'BuildingController/edit_flats';
$route['all-flats'] 	= 'BuildingController/all_flats';
$route['cp-sm'] 		= 'AdminController/cp_sm';
$route['add-cp-sm'] 	= 'AdminController/add_cp_sm';
$route['edit-cp-sm/(:num)'] 	= 'AdminController/edit_cp_sm';
$route['update-status']			= 	'BuildingController/UpdateStatus';
$route['common-save/(:any)']	=	'CommonController/SaveData';

$route['logout']			= 'AdminController/logout';

$route['all_delete']			= 'CommonController/AllDelete';
$route['all_status']			= 'CommonController/ChangeAllStatus';
$route['export']			    = 'AdminController/Export';
$route['project-layout']		= 'ProjectsController/ProjectLayout';
$route['add-layout']			= 'ProjectsController/AddLayout';
$route['edit-layout/(:num)']			= 'ProjectsController/EditLayout';
$route['save-layout']			= 'ProjectsController/SaveLayout';
// Client Route
$route['get-builByproj/(:any)']		=   'ClientController/getBuildings';
$route['get-flatsByb/(:any)']		= 	'ClientController/getFlats';
$route['get-allflats']			=	'ClientController/getallflats';
$route['user-details']	 		=   'ClientController/UserDetails';
$route['otp-check']				=	'ClientController/CheckOtp';
$route['flat-booking/(:num)']	=	'ClientController/FlatBooking';
$route['get-booked-details']	=   'ClientController/FlatBookedDetails';
$route['success']				=	'Status';
$route['failure']				=	'Status';
$route['cancel-booking']		= 	'ClientController/CancelBooking';
$route['update-blockedflat']	=	'ClientController/UpdateBlockedFlat';
$route['check-availability']	= 	'ClientController/ShowAvailability';