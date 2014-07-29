<?php
/**
*
* @package - Presentations obligated mod [English]
* @version $Id: presentations.php 12 2010-10-24 05:11:32Z jakk $
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
	'PRESENTATIONS_OBLIGATED_MOD'   => 'Presentations obligated mod',
    'PRESENTATIONS_NO_POST'         => 'You can not post to this forum, until you have presented',
	'PRESENTATIONS_NO_READ' 		=> 'Can not read topics in this forum, until you have presented',
	'PRESENTATIONS_FORUM' 		    => 'Click %1$shere%2$s to presented',

	//version 0.1.0	
	'USR_NAME'					=> 'Name:',
	'USR_CITY'					=> 'City:',
	'USR_COUNTRY'				=> 'Country:',
	'USR_VIRTUES'				=> 'Virtues:',
	'USR_DEFECTS'				=> 'Defects:',
	'USR_BDATE'					=> 'Date of Birth:',
	'USR_HOBBIES'				=> 'Hobbies:',
	'USR_HEAD_MSG'				=> 'More information',
	
	'PRESENTATIONS_UPDATE_SUCCESFUL' => 'Configuration updated successfully',
));
?>