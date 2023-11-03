<?php 
ini_set('session.gc_probability', 100);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 7200);


session_start();
ob_start();

	// función para validar nombres
	function acepta($t) {
		$carAceptados = "abcçdefghijklmnñopqrstuvwxyzABCÇDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789@.-_+|";
		$validacion = true;
		for ($i = 0; $i < strlen($t); $i++){
			$c = substr( $t, $i, 1 );
			if ( strstr( $carAceptados, $c ) == false ) {
				$validacion = false;
			}
		}
		
		if ($validacion){	  
			return $t;
		 } else {
			return "";
		}
	}
	
	// lista de usuarios y contraseñas:
	$usuarios = [
		'omar@staffmedia.com',
		'claudia.ballester@montibello.com'
	];
	
	$claves = [
		'$2y$10$0dpmd4o7JeEiRp1zFzqAWuQCVQoQGotmd54ba.290/6ykC72nB0f2',
		'$2y$10$k.N9CYF8F7sLUqpjryE9f.jEgy8ikx0qpiGxwmg.abg3ZGS2cOHGW'
	]; 
	/* 
		Para generar claves codificadas y mostrarlas utilizamos la siguiente sentencia:
		
		echo password_hash ( '1234' , PASSWORD_DEFAULT);
	*/
	
	// lista de idiomas
	$idiomas = [
		'en'=>'Inglés',
		'es'=>'Español',
		'pt'=>'Portugués',
		'pl'=>'Polaco',
		'zh'=>'Chino simplificado',
		'el'=>'Griego',
		'ar'=>'Árabe',
		'tr'=>'Turco',
		'da'=>'Danés',
		'sv'=>'Sueco',
		'fr'=>'Francés'
	];
	$textos = [
		'en'=>'',
		'es'=>'',
		'pt'=>'',
		'pl'=>'',
		'zh'=>'',
		'el'=>'',
		'ar'=>'',
		'tr'=>'',
		'da'=>'',
		'sv'=>'',
		'fr'=>''
	];
	
?>
<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
		
		
		<style>
			.bi::before  {
				line-height:1.25 !important;
			}
			
			/* REGISTRO */
			html,
			body {
			  height: 100%;
			}

			.content-signin {
				height: 100%;
				display: flex;
				align-items: center;
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #f5f5f5;
			}

			.form-signin {
				width: 100%;
				max-width: 330px;
				padding: 15px;
				margin: auto;
			}
			.form-signin .checkbox {
				font-weight: 400;
			}
			.form-signin .form-control {
				position: relative;
				box-sizing: border-box;
				height: auto;
				padding: 10px;
				font-size: 16px;
			}
			.form-signin .form-control:focus {
				z-index: 2;
			}
			.form-signin input[type="email"] {
				margin-bottom: -1px;
				border-bottom-right-radius: 0;
				border-bottom-left-radius: 0;
			}
			.form-signin input[type="password"] {
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}

		</style>
		 <script src="https://cdn.tiny.cloud/1/y66mkigbq6p6627gz3n5apyh6m0f5v56ru8k19ud5h2w29c8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<title>Editor HTML de instrucciones</title>
	</head>
	<body>
<?php 

if ( !isset($_COOKIE["mnt_ins_acc"]) and !isset($_SESSION["mnt_ins_acc"]) ) 
{ // no hay sesión de acceso
	if ( isset($_POST['inputEmail']) and isset($_POST['inputPassword']) )
	{ // hay datos a validar
	
		$usuario = acepta( $_POST["inputEmail"] );
		$clave = $_POST["inputPassword"];
		
		if ( in_array($usuario,$usuarios) )
		{ // existe el usuario en el array $usuarios
			
			$posicion = array_search($usuario,$usuarios); // consulto la posición del usuario en el array $usuarios
			
			if ( password_verify($clave,$claves[$posicion]) ) 
			{ // también coincide la contraseña
				if ( isset($_POST["inputRemember"]) )
				{ // creo una cookie si el usuario quiere ser recordado
					setcookie("mnt_ins_acc","sí",time()+31536000);
				} 
				else 
				{ // creo una sesión si el usuario no quiere ser recordado
					$_SESSION["mnt_ins_acc"] = "Sí";
				}
				
				header("Location:editor.php"); // redirigo a la página
			} 
			else 
			{ // no coindice la contraseña
			
				header("Location:editor.php?error"); // redirigo a la página con error
			
			}
			
		} else {
			
			header("Location:editor.php?error"); // redirigo a la página con error
			
		}
	} 
	else 
	{ // aún no hay datos a validar y mostramos el formulario de acceso
		?>
		<div class="content-signin">
			<main class="form-signin text-center">
				<form method="post" action="editor.php">
					<p class="fs-1">
						<i class="bi bi-pencil-square"></i>
					</p>
					<h1 class="h3 mb-3 fw-normal">
						Acceso al editor
					</h1>
			<?php 
				if ( isset($_GET['error']) )
				{ // existe un aviso de error
					?>
					<div class="alert alert-danger " role="alert">
						<i class="bi bi-x-square-fill"></i> Error de acceso
					</div>
					<?php
				}
				if ( isset($_GET['correcto']) )
				{ // existe un aviso de cierre de sesión
					?>
					<div class="alert alert-success " role="alert">
						<i class="bi bi-check-square-fill"></i>	Sesión cerrada correctamente
					</div>
					<?php
				}
			?>
					<p>
						<label for="inputEmail" class="visually-hidden">Dirección de Email </label>
						<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Dirección de Email" required autofocus>
						<label for="inputPassword" class="visually-hidden">Contraseña</label>
						<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
					</p>
					<p class="checkbox mb-3">
						<label>
							<input type="checkbox" id="inputRemember" name="inputRemember" value="1"> Recuérdame
						</label>
					</p>
					<p>
						<button class="w-100 btn btn-lg btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Acceder</button>
					</p>
					<p class="mt-5 mb-3 text-muted">
						&copy; 2021
					</p>
				</form>
			</main>	
		</div>
		<?php
	}
} 
elseif ( isset($_GET['salir']) ) 
{ // hay que cerrar la sesión
	if ( isset($_COOKIE["mnt_ins_acc"]) ) {
		unset($_COOKIE["mnt_ins_acc"]);
		setcookie("mnt_ins_acc", "", time()-1);
	} elseif ( isset($_SESSION["mnt_ins_acc"]) ) {
		unset($_SESSION["mnt_ins_acc"]);
	} 

	header("Location:editor.php?correcto");

}
else
{ // sí hay sesión de acceso
?>	

		<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<div class="container-lg">
				<a class="navbar-brand" href="index.php" target="_blank">Instrucciones Montibello</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cabecera" aria-controls="cabecera" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse " id="cabecera">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link- btn btn-outline-secondary btn-sm" href="editor.php?salir"><i class="bi bi-box-arrow-right"></i> Salir</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<main class="container-lg">
			<h1>Editor</h1>
			<div class="alert alert-secondary" role="alert">
				Utiliza el estilo <code>Codi</code> para que salga del <span style="color:#f0f;">color de resalte</span>
			</div>
	<?php
				  
	if( isset($_POST['s']) )
	{ // existen datos a actualizar
		
		$control = []; // aarray de control vacío
		
		foreach ($idiomas as $id=>$idioma) 
		{ // recorro el array de idiomas para escribir TXTs
	
			$data=$_POST['texto-'.$id]; // recojo el texto del formulario
			
			$fp = fopen('../data-'.$id.'.txt', 'w'); // abro el archivo de texto en modo sobreescritura
			
			if ( fwrite($fp, $data) !== false )
			{ // los datos se han actualizado correctamente
			
				// no hago nada
				
			} 
			else
			{ // los datos no se han actualizado
			
				array_push( $control, $idioma); // alaceno en el array de control el idioma que da error
				
			}
		}
	
		if ( count($control) > 0 )
		{ // los datos no se han actualizado y muestro el mensaje de error
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="bi bi-x-square-fill"></i> Error de guardado en:<br>
				<strong>
				<?php
					echo implode(', ', $control); // listo los idiomas que han dado error
				?>
				</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>			
		<?php
		} 
		else 
		{ // los datos se han actualizado correctamente y muestro el mensaje de confirmación
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-square-fill"></i> Datos guardados
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>	
		<?php		
		}
		
		fclose($fp); // cierro el archivo
	
	}
	foreach ($idiomas as $id=>$idioma) 
	{ // recorro el array de idiomas para leer TXTs
		$fp = fopen('../data-'.$id.'.txt', 'r'); // abro el archivo de texto en modo lectura para windows
		$textos[$id] = fread($fp, filesize('../data-'.$id.'.txt')); // leo del archivo hasta el final de su tamaño
		fclose($fp); // cierro el archivo
	}
	?>
			<form method="post" action="editor.php">
				<input type="hidden" name="s" value="1">
				
				<ul class="nav nav-tabs" id="myTab" role="tablist">
		<?php
			foreach ($idiomas as $id=>$idioma) 
			{ // recorro el array de idiomas para generar TABs
		?>
					<li class="nav-item" role="presentation">
						<a class="nav-link <?php echo ($id=='es')?'active':'';?>" id="<?php echo $id;?>" data-bs-toggle="tab" href="#idioma-<?php echo $id;?>" role="tab" aria-controls="idioma-<?php echo $id;?>" aria-selected="<?php echo ($id=='es')?'true':'false';?>"><?php echo $idioma;?></a>
					</li>
		<?php 
			}
		?>
				</ul>
				<div class="tab-content" id="myTabContent">
		<?php
			foreach ($idiomas as $id=>$idioma) 
			{ // recorro el array de idiomas para generar PANEs
		?>
					<div class="tab-pane fade <?php echo ($id=='es')?'show active':'';?>" id="idioma-<?php echo $id;?>" role="tabpanel" aria-labelledby="<?php echo $id;?>">
						<label for="texto-<?php echo $id;?>" class="form-label">Contenido</label>
						<textarea class="form-control" id="texto-<?php echo $id;?>" name="texto-<?php echo $id;?>" aria-describedby="textoHelp-<?php echo $id;?>" style="height:70vh;"><?php
							echo $textos[$id]; // vuelco el contenido
						?></textarea>
						<div id="textoHelp-<?php echo $id;?>" class="form-text">Código HTML.</div>
					
					</div>
		<?php 
			}
		?>
				</div>
				
				
				<div class="mb-3"></div>
				
				<button type="submit" class="btn btn-primary mb-5"><i class="bi bi-save2-fill"></i> Guardar</button>
			</form>
						
		</main>			
<?php 
} // fin con sesión de acceso
?>

		<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		
		 <script>
			tinymce.init({
				selector: 'textarea',
				plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table code',
				toolbar_mode: 'floating',
				toolbar: ['undo redo |  styleselect | bold italic underline strikethrough subscript superscript removeformat ','formatselect | h1 h2 h3 h4 h5 h6 | alignleft aligncenter alignjustify alignright alignnone | bullist numlist indent outdent | link table code'],
				height: '660',
				language: 'ca',
				entity_encoding : 'raw',
				formats: {
					// Changes the default format for the code button to produce a span with a class
					code: { inline: 'span', classes: 'color-montibello' }
				},
				content_style: ".color-montibello{color:#f0f;}"
			});
		</script>
		
	</body>
</html>
<?php ob_end_flush(); ?>
