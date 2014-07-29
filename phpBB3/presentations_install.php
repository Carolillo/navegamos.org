<?php
/**
*
* @package - Presentations obligated mod
* @version $Id: presentations_install.php 17 2010-10-23 01:21:52Z jakk $
* @copyright (c) jakk ( www.ivemfinity.com/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// The name of the mod to be displayed during installation.
$mod_name = 'PRESENTATIONS_OBLIGATED_MOD';

/*
* The name of the config variable which will hold the currently installed version
* You do not need to set this yourself, UMIL will handle setting and updating the version itself.
*/
$version_config_name = 'presentations_obligated_version';

/*
* The language file which will be included when installing
* Language entries that should exist in the language file for UMIL (replace $mod_name with the mod's name you set to $mod_name above)
* $mod_name
* 'INSTALL_' . $mod_name
* 'INSTALL_' . $mod_name . '_CONFIRM'
* 'UPDATE_' . $mod_name
* 'UPDATE_' . $mod_name . '_CONFIRM'
* 'UNINSTALL_' . $mod_name
* 'UNINSTALL_' . $mod_name . '_CONFIRM'
*/
$language_file = 'mods/presentations';

/*
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/
$versions = array(
	// Version 0.0.1-alpha
	'0.0.1-alpha' => array(
		// Now to add some permission settings
		'permission_add' => array(
			array('a_presentations_manage', true),
		),

		// Now to add acp presentations module
		'module_add' => array(
		 		array('acp', 'ACP_CAT_DOT_MODS', 'ACP_PRESENTATIONS_CAT'),
		 		 
					array('acp', 'ACP_PRESENTATIONS_CAT', array(
                                        'module_basename'   => 'presentations',
                                        'modes'             => array('config'),
										'module_auth'		=> 'acl_a_presentations_manage',
                                ),
                        ),
                  
        ),

		// Now to add some config fields
		'config_add' => array(
			array('presentations_enable', false),
			array('presentations_post_enable', false),
			array('presentations_view_enable', false),
			array('presentations_forum', ''),
		),
		'cache_purge' => '',
	),
	// Version 0.0.1-beta
	'0.0.1-beta'	=>	array(
		// Now to add some permission settings
		'permission_add' => array(
			array('u_presentations_post', true),
			array('u_presentations_view', true),
		),	
		'cache_purge' => '',
	),
	// Version 0.1.0
	'0.1.0'		=> array(		
		// Now to add config field
		'config_add' => array(
			array('presentations_form_enable', false),
		),		
		'custom'	=> 'fill_0_1_0',
		'cache_purge' => '',
	),	
);
	
// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

/*
* Here is our custom function that will be called for version 0.1.0
*
* @param string $action The action (install|update|uninstall) will be sent through this.
* @param string $version The version this is being run for will be sent through this.
*/
function fill_0_1_0($action, $version)
{
	global $db, $table_prefix, $umil;

	switch ($action)
	{
		case 'install' :
		case 'update' :
			// Run this when installing/updating
			if ($umil->table_exists($table_prefix . 'config'))
			{
				$sql = 'DELETE FROM ' . $table_prefix . "config
					WHERE config_name = 'presentations_enable'";
				$db->sql_query($sql);
			}
			
			// Method 1 of displaying the command (and Success for the result)
			return 'PRESENTATIONS_UPDATE_SUCCESFUL';
		break;

		case 'uninstall' :
		break;
	}
}

?>