<?php
/**
*
* @package - Presentations obligated mod [English]
* @version $Id: info_acp_presentations.php 7 2010-10-24 04:30:51Z jakk $
* @copyright (c) jakk ( www.ivemfinity.com/ )
* @translator (c) ( You - http://www.yourdomain.com )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_PRESENTATIONS_CAT'            => 'Presentations Mod',
	'ACP_PRESENTATIONS_CONFIG'         => 'Presentation settings',
	'ACP_PRESENTATIONS_CONFIG_SAVED'   => 'Presentation settings updated successfull',
	
	'LOG_PRESENTATIONS_CONFIG'         => '<strong>Updated: presentation mod settings</strong>',	

    'acl_a_presentations_manage'       => array('lang' => 'Can modify the configuration of presentations mod'	, 'cat' => 'misc'),
	'acl_u_presentations_post'         => array('lang' => 'Can be published without first having presented'	, 'cat' => 'misc'),
	'acl_u_presentations_view'         => array('lang' => 'Can read topics without first having presented'	, 'cat' => 'misc'),
));
?>