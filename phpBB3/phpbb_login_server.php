<?php
/**
 * @ignore
 */
define('IN_PHPBB', true);
define('TOKEN', 'fb97d2fe1e134e3171f26497b6c95081');
//$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

// Load include files.
include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);

// Set up a new user session.
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');

$query					= request_var('query', '');
$query					= json_decode(base64_decode($query), true);
$return_to_page 		= empty($query['return_to_page'])
			? "http://navegamos.org/madridnavega.org/phpBB3/phpbb_login_client."  . $phpEx
			: $query['return_to_page'];
$request_return_to_page	= empty($query['request_return_to_page'])
			? "http://navegamos.org/madridnavega.org/index." . $phpEx
			: $query['request_return_to_page'];
$result					= array('error'				=> false,
								'return_to_page'	=> $request_return_to_page);

if($query['token'] == TOKEN) {

	switch ($query['request']) {
		case 'phpbb_user' :

			if(!$user->data['user_phpbb_identifier']) {
				$identifier = md5(unique_id());
			
				// Actualizamos el phpbb_identifier
				$sql = 'UPDATE ' . USERS_TABLE . '
						SET user_phpbb_identifier = \'' . $identifier . '\'
						WHERE user_id = ' . (int) $user->data['user_id'];
				$db->sql_query($sql);
				$user->data['user_phpbb_identifier'] = $identifier;
			}

			$result['user'] = array('user_phpbb_identifier'	=> $user->data['user_phpbb_identifier'],
									'user_id'				=> $user->data['user_id'],
									'username'				=> $user->data['username'],
									'user_password'			=> $user->data['user_password'],
									'user_passchg'			=> $user->data['user_passchg'],
									'user_email'			=> $user->data['user_email'],
									'group_id'				=> $user->data['group_id'],
									'user_type'				=> $user->data['user_type'],
									'user_regdate'			=> $user->data['user_regdate'],
									'user_birthday'			=> $user->data['user_birthday'],
									'user_lang'				=> $user->data['user_lang'],
									'user_timezone'			=> $user->data['user_timezone'],
									'user_dateformat'		=> $user->data['user_dateformat']);
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

//print_r($result);
//exit;

$response = base64_encode(json_encode($result));
redirect($return_to_page . '?result=' . $response, false, true);
?>