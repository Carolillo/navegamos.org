<?php
/**
*
* @package - Presentations obligated mod [Spanish [es]]
* @version $Id: presentations.php 13 2010-10-23 16:03:24Z jakk $
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
    'PRESENTATIONS_NO_POST'         => 'No puede publicar en este foro hasta que lo haga en el Foro de presentaciones',
	'PRESENTATIONS_NO_READ' 		=> 'No puede leer temas en este foro hasta que se haya presentado',
	'PRESENTATIONS_FORUM' 		    => 'Click %1$sAquí%2$s para presentarse',

	//version 0.1.0	
	'USR_NAME'					=> 'Nombre:',
	'USR_CITY'					=> 'Ciudad:',
	'USR_COUNTRY'				=> 'País:',
	'USR_VIRTUES'				=> 'Virtudes:',
	'USR_DEFECTS'				=> 'Defectos:',
	'USR_BDATE'					=> 'Fecha de Nacimiento:',
	'USR_HOBBIES'				=> 'Aficciones:',
	'USR_HEAD_MSG'				=> 'Más información',
	
	'PRESENTATIONS_UPDATE_SUCCESFUL' => 'Configuración actualizada correctamente',
));
?>