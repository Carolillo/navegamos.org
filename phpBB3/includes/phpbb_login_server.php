<?php
/**
 * @ignore
 */
define('IN_PHPBB', true);
define('TOKEN', 'fb97d2fe1e134e3171f26497b6c95081');
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

// Load include files.
include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
//include_once($phpbb_root_path . 'includes/functions_profile_fields.' . $phpEx);

// Set up a new user session.
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');

if (!session_id()) {
	session_start();
}

// Testing:
//redirect($phpbb_root_path . '/index.php');

function get_phpbb_user() {
	global $user, $db;

	//Chequeamos si ya se ha creado un user_phpbb_identifier para este usuario y si no existe lo creamos.
	if(!$user->data['user_phpbb_identifier']) {
		$identifier = md5(unique_id());

		// Actualizamos el phpbb_identifier
		$sql = 'UPDATE ' . USERS_TABLE . '
						SET user_phpbb_identifier = \'' . $identifier . '\'
						WHERE user_id = ' . (int) $user->data['user_id'];
		$db->sql_query($sql);
		$user->data['user_phpbb_identifier'] = $identifier;
	}
	return $user->data;
}

$request				= request_var('request', 'username');
$token					= request_var('token', '');
$return_to_page 		= base64_decode(request_var('return_to_page',
		base64_encode("http://navegamos.org/madridnavega.org/phpBB3/includes/phpbb_login_client.{$phpEx}")));
$request_return_to_page = request_var('request_return_to_page',
		base64_encode("http://navegamos.org/madridnavega.org/index.{$phpEx}"));
$result					= array('error' => false);

if($token == TOKEN) {

	switch ($request) {
		case 'phpbb_user' :

			$result['user'] =  get_phpbb_user();
			break;

		case 'user_id' :
			$result['user_id'] = $user->data['user_id'];
			break;

		case 'user_email' :
			$result['user_email'] = $user->data['user_email'];
			break;

		case 'username' :
		default :
			$result['username'] = $user->data['username'];
			break;
	}
}
else {
	$result['error'] = 'El sitio ' . $_SERVER['REQUEST_URI'] . ' no está autorizado para acceder a este servicio.';
}

$response = base64_encode(json_encode($result));
redirect($return_to_page . '?return_to_page=' . $request_return_to_page . '&result=' . $response, false, true);
?>