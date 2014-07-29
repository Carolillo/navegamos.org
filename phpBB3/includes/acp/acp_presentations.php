<?php

/**
*
* @package - Presentations obligated mod
* @version $Id: acp_presentations.php 14 2010-10-22 02:22:54Z jakk $
* @copyright (c) jakk ( www.ivemfinity.com/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class acp_presentations
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		
		$user->add_lang('mods/acp_presentations');

		if (!function_exists('mod_version_check'))
		{
			include($phpbb_root_path . 'includes/presentations/functions_version_check.' . $phpEx);
		}
		mod_version_check();		
		
		switch ($mode)
		{
			case 'config':
				//set html template and page title
			    $this->tpl_name = 'acp_presentations';
		        $this->page_title = $user->lang['ACP_PRESENTATIONS_CONFIG_TITLE'];
				// if submit request form variables and update config into database
                if(isset($_POST['submit']))
                {
					set_config('presentations_post_enable', request_var('presentations_post_enable', 0));
					set_config('presentations_view_enable', request_var('presentations_view_enable', 0));
					set_config('presentations_forum', request_var('presentations_forum', 0));
					set_config('presentations_form_enable', request_var('presentations_form_enable', 0));//0.1.0
					add_log('admin', 'LOG_PRESENTATIONS_CONFIG');
					trigger_error($user->lang['ACP_PRESENTATIONS_CONFIG_SAVED'] . adm_back_link($this->u_action));
				}

				// request config variables and send to template html
		        $template->assign_vars(array(
					'PRESENTATIONS_POST_ENABLE' => $config['presentations_post_enable'],
					'PRESENTATIONS_VIEW_ENABLE' => $config['presentations_view_enable'],
					'PRESENTATIONS_FORUM'       => $config['presentations_forum'],
					'PRESENTATIONS_FORM_ENABLE' => $config['presentations_form_enable'], //0.1.0
					'S_VERSIONCHECK'			=> ($this->page_title = 'ACP_PRESENTATIONS_CONFIG_TITLE') ? true : false,
					'U_ACTION'                  => $this->u_action
				));					
            break;			
        }			
	}
}	

?>