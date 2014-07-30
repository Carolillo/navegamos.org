<?php
/**
 * Ejemplo de página html con control de sesiones phpBB3
 * Se obtienen todos los datos del usuario (username, avatar, user_type, user_group, session_id, etc)
 * Pudiendo emplearlos en la página, como mostrar el avatar, el username, color en función del user_group, etc)
 * Permite iniciar sesión, cerrarla y registrarse
 */


/**
 * Primeramente definimos la constante que autorizará la inclusión de archivos de phpBB3
 */
define('IN_PHPBB', true);

/**
 * Establecemos en una variable el path relativo al de instalación de phpBB3
 * y la extensión que hemos dado a las páginas PHP (esta se puede configurar en apache para ocultar el lenguaje de programación)
 */
$phpbb_root_path = (defined('PHPBB_ROOT_PATH'))
						? PHPBB_ROOT_PATH
						: '../phpBB3/'; // Sustituir por el que corresponda a esta página
$phpEx = substr(strrchr(__FILE__, '.'), 1);

/**
 * A continuación importamos constantes, variables, funciones y clases generales, y creamos algún objeto
 */
include_once $phpbb_root_path . 'common.' . $phpEx;

/**
 * Seleccionamos los errores que se mostrarán en pantalla (descomentar para depuración)
 */
//error_reporting(E_ALL);
//ini_set('display_errors','On');

/**
 * Finalmente en el objeto $user iniciamos (o creamos si no existe) sesión
 * Autorizamos y establecemos lenguaje, estilo, formato de fecha, zona horaria, etc.
 */
$user->session_begin();
$auth->acl($user->data);
$user->setup('common');

/**
 * Ahora disponemos del objeto $user y el array $config
 * podemos explorar sus valores descomentando los bloques siguientes
 * particularmente importante es el array data de $user ($user->data)
 */
/*
echo '<pre>';
var_dump($user);
echo '</pre>';
exit;
*/
/*
echo '<pre>';
var_dump($config);
echo '</pre>';
exit;
*/

/**
 * Vamos a obtener el avatar (Solo en caso de usuario registrado, no Anonymous, no Bot, no Inactivo)
 */
$avatar_tag = '';

if($user->data['is_registered']) {
	$max_width		= 90; // Establecemos ancho máximo.
	$max_height 	= 90; // Establecemos alto máximo.
	$default_img	= 'pirata.gif'; // Seleccionar la imagen correcta
	$type			= $user->data['user_avatar_type'];

	if($type == 0) {
		$link		= $default_img;
		$image_info = getimagesize($phpbb_root_path .  'images/avatares/' . $link) ;
		$width		= $image_info[0];
		$height		= $image_info[1];
	}
	else {
		$link			= $user->data['user_avatar'];
		$width			= $user->data['user_avatar_width'];
		$height			= $user->data['user_avatar_height'];
	}

	if($width > $max_width || $height > $max_height) {
		$x		= $max_width / $width;
		$y		= $max_height / $height;
		$xy		= min($x, $y);
		$width	= $width * $xy;
		$height	= $height * $xy;
	}

	$avatar_dims	= 'width="'.$width.'" height="'.$height.'" ';

	switch ($type) {
		case '0' : // Avatar por defecto
			$avatar_path	= $phpbb_root_path .  'images/avatares/' . $default_img;
			break;
		case '1' : // Subido por el usuario
			$avatar_path	= $phpbb_root_path . 'download/file.' . $phpEx . '?avatar=' . $link;
			break;
		case '2' : // Enlace de internet
			$avatar_path	= $link;
			break;
		case '3' : // Avatar de la galería de phpBB3
			$avatar_path	= $phpbb_root_path . 'images/avatars/gallery/' . $link;
			break;
		default :
			$avatar_path	= $phpbb_root_path . 'images/avatares/pirata.gif';
			break;
	}

	// Y esta es la etiqueta HTML de la imagen para insertar en la página
	$avatar_tag = '<img src="' . $avatar_path
				. '" width="' . $width
				. '" height="' . $height
				. '" alt="Avatar de ' . $user->data['username'] . '" />';
}

/**
 * Vamos a obtener el nombre de usuario con el color correspondiente a su grupo
 */
$username_tag = '<span color="#' . $user->data['user_colour'] . '">' . $user->data['username'] . '</span>';

/**
 * Enlace sencillo a la página de login de phpBB3
 */
 $login_url		= append_sid($phpbb_root_path . 'ucp.' . $phpEx . '?mode=login');
 $to_login_tag	= '<a href="' . $login_url . '" target="_self" title="Acceso de usuarios">Iniciar sesión</a>';
 
 /**
  * Cerrar sesión
  */
 $logout_url		= append_sid($phpbb_root_path . 'ucp.' . $phpEx . '?mode=login');
 $to_logout_tag	= '<a href="' . $logout_url . '" target="_self" title="Cerrar mi sesión de usuario">Cerrar sesión</a>';
 
 /**
  * Generar el HTML
  */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="es" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="es" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="es" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='es'>
	<!--<![endif]-->
	<head>
		<meta charset='utf-8' />
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
		<title>Navegamos.org</title>	
		
		<link rel="shortcut icon" href="../favicon.ico" />
		<link rel="apple-touch-icon" href="../images/favicon.png" />
		
		<link rel="stylesheet" href="../css/maximage.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="../css/styles.css" type="text/css" media="screen" charset="utf-8" />
		
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<!--[if IE 6]>
			<style type="text/css" media="screen">
				.gradient {display:none;}
			</style>
		<![endif]-->
	</head>
	<body>

		<!-- Social Links -->
		<nav class="social-nav">
			<ul>
				<li><a href="https://www.facebook.com/navegamos.org"><img src="../images/icon-facebook.png" /></a></li>
				<li><a href="#"><img src="../images/icon-twitter.png" /></a></li>
				<li><a href="https://plus.google.com/u/0/communities/105189046868031526641"><img src="../images/icon-google.png" /></a></li>
				
			</ul>
		</nav>

		<div style="width: 100%; position:absolute; top: 0px; left: 10px">
			<div style="width:150px; margin: 10px auto">
<?php
if($user->data['is_registered']) {
	echo $avatar_tag . '<br />' . $username_tag . '<br />' . $to_logout_tag;
}
else {
	echo $to_login_tag;
}
?>
			</div>
		</div>

		<!-- Switch to full screen -->
		<button class="full-screen" onclick="$(document).toggleFullScreen()"></button>

		<!-- Site Logo -->
		<div id="logo">Navegamos.org</div>

		<!-- Main Navigation -->
		<nav class="main-nav">
			<ul>
				<li><a href="#home" class="active">Inicio</a></li>
				<li><a href="#about">Sobre nosotros</a></li>
				<li><a href="#contact">Contacto</a></li>
				<li><a href="#blog">Bit&aacute;coras</a></li>
				<li><a href="#foro">Foro</a></li>
			</ul>
		</nav>

		<!-- Slider Controls -->
		<a href="" id="arrow_left"><img src="../images/arrow-left.png" alt="Slide Left" /></a>
		<a href="" id="arrow_right"><img src="../images/arrow-right.png" alt="Slide Right" /></a>

		<!-- Home Page -->
		<section class="content show" id="home">
			<h1>Bienvenidos</h1>
			<h5>Nuevo sitio para navegantes</h5>
			<p>Recuperamos la filosofia de MadridNavega.org y creamos un nuevo grupo de amantes de la navegaci&oacute;n. Muy pronto tendremos preparada la nu&eacute;va p&aacute;gina con todos los contenidos para los amantes de la vela crucero</p>
			<p><a href="#about">Mas informaci&oacute;n &#187;</a></p>
		</section>

		<!-- About Page -->
		<section class="content hide" id="about">
			<h1>Sobre nosotros</h1>
			<h5>Nuestra forma de ser</h5>
			<p>Navegar, aprender y disfrutar del mar. Estas son las principales premisas que conforman nuestra forma de ser y el motivo de nuestra existencia. Siempre compartiendo los gastos del alquiler, comidas, amarres, combustible y desplazamiento a los puertos de embarque</p>
			<p><a href="#home">Normas y reglas</a></p>
		</section>

		<!-- Contact Page -->
		<section class="content hide" id="contact">
			<h1>Contacto</h1>
			<h5>Mas informaci&oacute;n en</h5>
			<p>Email: <a href="#">info@navegamos.org</a><br />
			<a href="#">Siguenos en Twitter</a>
			</p>
		</section>
		
		<!-- Blog Page -->
		<section class="content hide" id="blog">
			<h1>Bit&aacute;coras</h1>
			<h5>Res&uacute;menes de nuestras salidas</h5>
			<p> En nuestras bitacoras relfejamos el espiritu del grupo, contando en primera persona los momentos y vivencias de nuestras salidas del grupo, para dar a conocer a todo el mundo nuestra pasion por el mar.</p>
			<p><a href="http://bitacoras.navegamos.org">bitacoras.navegamos.org</a><br />
			</p>
		</section>
		
		<!-- Foro Page -->
		<section class="content hide" id="foro">
			<h1>Foro de navegantes</h1>
			<h5>Nuestro espacio para compartir</h5>
			<p>El foro es nuestro principal medio de comunicacion, en el podras encontrar informacion interesante y sobre todo proponer nuevas salidas para navegar juntos.</p>
			<p><a href="http://foro.navegamos.org">foro.navegamos.org</a><br />
			</p>
		</section>
		
		<!-- Background Slides -->
		<div id="maximage">
			<div>
				<img src="../images/backgrounds/bg-img-1.jpg" alt="" />
				<img class="gradient" src="../images/backgrounds/gradient.png" alt="" />
			</div>
			<div>
				<img src="../images/backgrounds/bg-img-2.jpg" alt="" />
				<img class="gradient" src="../images/backgrounds/gradient.png" alt="" />
			</div>
			<div>
				<img src="../images/backgrounds/bg-img-3.jpg" alt="" />
				<img class="gradient" src="../images/backgrounds/gradient.png" alt="" />
			</div>
			<div>
				<img src="../images/backgrounds/bg-img-4.jpg" alt="" />
				<img class="gradient" src="../images/backgrounds/gradient.png" alt="" />
			</div>
			<div>
				<img src="../images/backgrounds/bg-img-5.jpg" alt="" />
				<img class="gradient" src="../images/backgrounds/gradient.png" alt="" />
			</div>
		</div>
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>
		<script src="../js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.fullscreen.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.ba-hashchange.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/main.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(function(){
				$('#maximage').maximage({
					cycleOptions: {
						fx: 'fade',
						speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
						timeout: 5000,
						prev: '#arrow_left',
						next: '#arrow_right',
						pause: 0,
						before: function(last,current){
							if(!$.browser.msie){
								// Start HTML5 video when you arrive
								if($(current).find('video').length > 0) $(current).find('video')[0].play();
							}
						},
						after: function(last,current){
							if(!$.browser.msie){
								// Pauses HTML5 video when you leave it
								if($(last).find('video').length > 0) $(last).find('video')[0].pause();
							}
						}
					},
					onFirstImageLoaded: function(){
						jQuery('#cycle-loader').hide();
						jQuery('#maximage').fadeIn('fast');
					}
				});
	
				// Helper function to Fill and Center the HTML5 Video
				jQuery('video,object').maximage('maxcover');
	
			});
		</script>
  </body>
</html>
</body>
</html>