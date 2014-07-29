<?php
/**
*
* @package - Presentations obligated mod [Spanish [es]]
* @version $Id: acp_presentations.php 11 2010-10-23 03:37:15Z jakk $
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
    'ACP_PRESENTATIONS_CONFIG_TITLE'         		=> 'Configuración de presentaciones',
	'ACP_PRESENTATIONS_CONFIG_SETTINGS'   			=> 'Configurar presentaciones',
	'ACP_PRESENTATIONS_CONFIG_SETTINGS_EXPLAIN'  	=> 'Aquí puede activar/desactivar el mod de presentaciones al publicar o leer temas. Tambien puede selecionar el foro que desea establecer como foro de presentaciones y además decidir si mostrar el formulario de presentaciones.',
	'ACP_PRESENTATIONS_POST_ENABLE' 				=> '¿Presentación antes de publicar?',
	'ACP_PRESENTATIONS_POST_ENABLE_EXPLAIN' 		=> 'Si activa esto los usuarios deberán publicar en el foro de presentaciones antes de poder publicar en otro foro.',
	'ACP_PRESENTATIONS_VIEW_ENABLE' 				=> '¿Presentación antes de leer temas?',
	'ACP_PRESENTATIONS_VIEW_ENABLE_EXPLAIN' 		=> 'Si activa esto los usuarios deberán publicar en el foro de presentaciones antes de poder leer temas en otro foro.',
	'ACP_PRESENTATIONS_FORUM' 						=> 'Foro de presentaciones',
	'ACP_PRESENTATIONS_FORUM_EXPLAIN' 				=> 'Introduzca el ID del foro que desea establecer como foro de presentaciones',
	'ACP_PRESENTATIONS_FORM_ENABLE'					=> '¿Activar formulario de presentaciones?',
	'ACP_PRESENTATIONS_FORM_ENABLE_EXPLAIN'			=> 'Activando esto se mostrará un formulario en el foro de presentaciones que los usuarios deberán rellenar con los datos que deseen',
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