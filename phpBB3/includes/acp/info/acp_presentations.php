<?php
/**
*
* @package - Presentations obligated mod
* @version $Id: acp_presentations.php 1 2010-09-23 13:01:23Z jakk $
* @copyright (c) jakk ( www.ivemfinity.com/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_presentations_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_presentations',
			'title'		=> 'ACP_PRESENTATIONS_CAT',
			'version'	=> '0.0.1',
			'modes'		=> array(
				'config'		=> array('title' => 'ACP_PRESENTATIONS_CONFIG', 'auth' => 'acl_a_presentations_manage', 'cat' => array('ACP_DOT_MODS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}