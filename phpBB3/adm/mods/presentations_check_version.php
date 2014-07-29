<?php
/**
*
* @package acp
* @version $Id: presentations_check_version.php 2 2010-09-29 02:12:41Z jakk $
* @copyright (c) 2007 StarTrekGuide
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package mod_version_check
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class presentations_check_version
{
	function version()
	{
		global $config, $phpbb_root_path, $phpEx;

		return array(
			'author'	=> 'Jakk',
			'title'		=> 'presentations obligated mod',
			'tag'		=> 'presentations_obligated',
			'version'	=> $config['presentations_obligated_version'],
			'file'		=> array('mundoforeros.com', 'updatecheck', 'presentations_obligated.xml'),
		);
	}
}

?>