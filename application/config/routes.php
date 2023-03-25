<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/*
| -------------------------------------------------------------------------
| Routes of the Controllers
| -------------------------------------------------------------------------
| @package TMM
| @author  André Neves
| @version 1.0 
| @since 2023-03-19
| @description This file contains the routes of the controllers.
*/

/*
| -------------------------------------------------------------------------
| Auth controller
| -------------------------------------------------------------------------
| @description This controller is responsible for authentication and login
| of users.
 */
$route['login']['get'] = 'auth';
$route['login']['post'] = 'auth/login';
$route['logout']['get'] = 'auth/logout';

/*
| -------------------------------------------------------------------------
| Collaborator controller
| -------------------------------------------------------------------------
| @description This controller is responsible for the CRUD of collaborators.
 */
$route['collaborators']['get'] = 'collaborator';
$route['collaborators/create']['get'] = 'collaborator/create';
$route['collaborators/create']['post'] = 'collaborator/createCollaborator';
$route['collaborators/edit/(:num)']['get'] = 'collaborator/edit/$1';
$route['collaborators/edit/(:num)']['post'] = 'collaborator/edit/$1';
$route['collaborators/update/(:num)']['post'] = 'collaborator/update/$1';

/*
| -------------------------------------------------------------------------
| Product controller
| -------------------------------------------------------------------------
| @description This controller is responsible for the CRUD of products.
 */
$route['products']['get'] = 'product';
$route['products/create']['get'] = 'product/create';
$route['products/create']['post'] = 'product/create';
$route['products/edit/(:num)']['get'] = 'product/edit/$1';
$route['products/edit/(:num)']['post'] = 'product/edit/$1';
$route['products/update/(:num)']['post'] = 'product/update/$1';

/*
| -------------------------------------------------------------------------
| Purchase controller
| -------------------------------------------------------------------------
| @description This controller is responsible for the CRUD of purchases.
 */
$route['purchases']['get'] = 'purchase';
$route['purchases/create']['get'] = 'purchase/create';
$route['purchases/create']['post'] = 'purchase/create';
$route['purchases/edit/(:num)']['get'] = 'purchase/edit/$1';
$route['purchases/edit/(:num)']['post'] = 'purchase/edit/$1';
$route['purchases/update/(:num)']['post'] = 'purchase/update/$1';
$route['purchases/delete/(:num)']['get'] = 'purchase/deletePurchase/$1';
