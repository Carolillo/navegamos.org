<?php
/**
*
* @package - Presentations obligated mod [English]
* @version $Id: acp_presentations.php 11 2010-10-23 04:37:15Z jakk $
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
    'ACP_PRESENTATIONS_CONFIG_TITLE'         		=> 'Presentation settings',
	'ACP_PRESENTATIONS_CONFIG_SETTINGS'   			=> 'Set presentation settings',
	'ACP_PRESENTATIONS_CONFIG_SETTINGS_EXPLAIN'  	=> 'Here you can enable/disable the Presentations Mod to post or read topics. Also you can select the forum that you want to establish a forum for presentations and also decide whether to show the presentations form.',
	'ACP_PRESENTATIONS_POST_ENABLE' 				=> 'Presentation before posting?',
	'ACP_PRESENTATIONS_POST_ENABLE_EXPLAIN' 		=> 'If you enable this, users should post in the forum of presentations before you can post in another forum.',
	'ACP_PRESENTATIONS_VIEW_ENABLE' 				=> 'Presentation before reading topics?',
	'ACP_PRESENTATIONS_VIEW_ENABLE_EXPLAIN' 		=> 'If you enable this, users should post in the forum of presentations before they can read in other forum topics.',
	'ACP_PRESENTATIONS_FORUM' 						=> 'Presentations Forum',
	'ACP_PRESENTATIONS_FORUM_EXPLAIN' 				=> 'Introduzca el ID del foro que desea establecer como foro de presentaciones',
	'ACP_PRESENTATIONS_FORM_ENABLE'					=> 'Activate de presentations form?',
	'ACP_PRESENTATIONS_FORM_ENABLE_EXPLAIN'			=> 'Enabling this will show a presentations form in the forum has been established, where users will fill with the data they wish',
));

/**
* A copy of Handyman` s MOD version check, to view it on the presentations obligated mod general settings
*/
$lang = array_merge($lang, array(
	'ANNOUNCEMENT_TOPIC'	=> 'Anuncio de lanzamiento',
	'CURRENT_VERSION'		=> 'Versión Actual',
	'DOWNLOAD_LATEST'		=> 'Descargar la última versión',
	'LATEST_VERSION'		=> 'Última versión',
	'NO_INFO'				=> 'La comprobación de la versión no se ha podido efectuar',
	'NOT_UP_TO_DATE'		=> '%s no está actualizado',
	'RELEASE_ANNOUNCEMENT'	=> 'Anuncio de lanzamiento',
	'UP_TO_DATE'			=> '%s está actualizado',
	'VERSION_CHECK'			=> 'Comprobación de la versión del MOD',
));

?>