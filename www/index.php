<?php
// lista de idiomas
$idiomas = [
    'en' => 'English',
    'es' => 'Español',
    'pt' => 'Português',
    'pl' => 'Polski',
    'zh' => '简体中文',
    'el' => 'ελληνικά',
    'ar' => 'العربية',
    'tr' => 'Türkçe',
    'da' => 'Dansk',
    'sv' => 'Svenska',
    'fr' => 'Français',
	'gr' => 'Greigo'
];
/*
$titulo = [
''    =>'Instrucciones Blonde Glow Mask',
'en'=>'Blonde Glow Mask Instructions',
'es'=>'Instrucciones Blonde Glow Mask',
'pt'=>'Instruções Blonde Glow Mask',
'pl'=>'Instrukcje Blonde Glow Mask',
'zh'=>'Blonde Glow Mask 说明',
'el'=>'Οδηγίες Blonde Glow Mask',
'ar'=>'تعليمات Blonde Glow Mask',
'tr'=>'Blonde Glow Mask Talimatları',
'da'=>'Blonde Glow Mask instruktioner',
'sv'=>'Blonde Glow Mask Instruktioner',
'fr'=>'Instructions Blonde Glow Mask'
];
 */
$titulo = [
    '' => 'Blonde Glow Mask',
    'en' => 'Blonde Glow Mask',
    'es' => 'Blonde Glow Mask',
    'pt' => 'Blonde Glow Mask',
    'pl' => 'Blonde Glow Mask',
    'zh' => 'Blonde Glow Mask',
    'el' => 'Blonde Glow Mask',
    'ar' => 'Blonde Glow Mask',
    'tr' => 'Blonde Glow Mask',
    'da' => 'Blonde Glow Mask',
    'sv' => 'Blonde Glow Mask',
    'fr' => 'Blonde Glow Mask',
];
$productos = [
    'en' => [
		'INTENSIFIER - Base for fine to medium hair',
        'INTENSIFIER - Base for fine to medium hair',
        'INTENSIFIER - Base for medium to coarse hair',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'es' => [
		'INTENSIFIER - Base para cabellos de finos a medios',
        'INTENSIFIER - Base para cabellos de finos a medios',
        'INTENSIFIER - Base para cabellos de medios a gruesos',
        'RECHARGE - Concentrado fortalecedor',
        'RECHARGE - Concentrado de color',
        'RECHARGE - Concentrado alisador',
    ],
    'fr' => [
		'INTENSIFIER - Base pour cheveux fins à moyens',
        'INTENSIFIER - Base pour cheveux fins à moyens',
        'INTENSIFIER - Base pour cheveux moyens à épais',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'gr' => [
		'INTENSIFIER - Base pour cheveux fins à moyens',
        'INTENSIFIER - Base pour cheveux fins à moyens',
        'INTENSIFIER - Base pour cheveux moyens à épais',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'pl' => [
		'INTENSIFIER – Baza do włosów cienkich i średnich',
        'INTENSIFIER – Baza do włosów cienkich i średnich',
        'INTENSIFIER – Baza do włosów średnich i grubych',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'da' => [
		'INTENSIFIER – Baza do włosów cienkich i średnich',
        'INTENSIFIER – Baza do włosów cienkich i średnich',
        'INTENSIFIER – Baza do włosów średnich i grubych',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'ar' => [
		'INTENSIFIER - أساس للشعر الرقيق إلى المتوسط',
        'INTENSIFIER - أساس للشعر الرقيق إلى المتوسط',
        'INTENSIFIER - أساس للشعر المتوسط إلى الخشن',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'pt' => [
		'INTENSIFIER – Base para cabelos finos a médios',
        'INTENSIFIER – Base para cabelos finos a médios',
        'INTENSIFIER – Base para cabelos médios a grossos',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'sv' => [
		'INTENSIFIER - Bas för fint till medelgrovt/-tjockt hår',
        'INTENSIFIER - Bas för fint till medelgrovt/-tjockt hår',
        'INTENSIFIER - Bas för medelgrovt/-tjockt till grovt/tjockt hår',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'tr' => [
		'INTENSIFIER - İnce ve orta kalınlıkta saçlar için baz',
        'INTENSIFIER - İnce ve orta kalınlıkta saçlar için baz',
        'INTENSIFIER - Orta ve kalın saçlar için baz',
        'RECHARGE - Strengthening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
    'zh' => [
		'INTENSIFIER - 适用于细发至中等硬度发质',
        'INTENSIFIER - 适用于细发至中等硬度发质',
        'INTENSIFIER - 适用于中等硬度至粗硬发质',
        'RECHARGE - Strenghtening Concentrate',
        'RECHARGE - Colour Concentrate',
        'RECHARGE - Smoothing Concentrate',
    ],
];



// lista de idiomas se sentido de lectura inverso
$rtl = [
    'ar',
];

if (isset($_GET['l']) and array_key_exists($_GET['l'], $idiomas)) { // tenemos información de idiomas
    $lang = $_GET['l'];
} else { // aún no tenemos información de idiomas
    $lang = '';
}

if (isset($_GET['p']) and array_key_exists($_GET['p'], $idiomas)) { // tenemos información de idiomas
    $prd = $_GET['p'];
	$prd_actualizado = $ntval($prd) - 1;
} else { // aún no tenemos información de idiomas
    $prd = '';
}
// Obtener el valor de "l" desde la URL o usar "en" como valor por defecto
$idioma = isset($_GET['l']) ? $_GET['l'] : 'en';

// Verificar si el idioma seleccionado existe en el array de productos
if (array_key_exists($idioma, $productos)) {
    $productos_idioma = $productos[$idioma];
} else {
    // Si el idioma no existe, utilizar "en" como idioma por defecto
    $idioma = 'en';
    $productos_idioma = $productos['en'];
}
?>
<!doctype html>
<html lang="<?php echo ($lang != '') ? $lang : 'es'; ?>" <?php echo ($lang != '' and in_array($lang, $rtl)) ? 'dir="rtl"' : ''; ?> >
<meta name="viewport" content="width=device-width, initial-scale=1">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
<?php if (in_array($lang, $rtl)) {?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
<?php } else {?>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php }?>

		<link rel="stylesheet" href="assets/fonts/fuentes.css">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

		<?php
			if (isset($_GET['p'])) {
				$p = $_GET['p'];
			} else {
				$p = 1;
			}
?>
	<?php if ($lang != '') {?>
		<title><?php echo  $productos[$lang][$p] ;?></title>
		<?php }else{?>
			<title>Hop In salon</title>
			<?php }?>
	</head>
	<body class="blue-variant">
		<header class="px-3 py-2 ">
			<div class="container-full">
				<div class="row justify-content-center align-items-center">
					<div class="col-6">
					<svg viewBox="0 0 111 18"  xmlns="http://www.w3.org/2000/svg">
<path d="M0 0.1125V17.1H1.96458V6.075L5.25147 10.4625L8.50059 6.1125V17.1H10.4652V0.1125L5.25147 7.1625L0 0.1125ZM21.3459 0.675C19.0035 0.675 17.0012 1.5 15.3766 3.1125C13.7521 4.725 12.9209 6.75 12.9209 9.0375C12.9209 11.325 13.7521 13.3125 15.3766 14.9625C17.0012 16.575 19.0035 17.4 21.3459 17.4C23.6883 17.4 25.6907 16.575 27.3152 14.9625C28.9398 13.35 29.7709 11.3625 29.7709 9.0375C29.7709 6.7125 28.9398 4.725 27.3152 3.1125C25.6907 1.5 23.6505 0.675 21.3459 0.675ZM25.8796 13.5375C24.6328 14.775 23.1216 15.4125 21.3459 15.4125C19.608 15.4125 18.0968 14.775 16.8501 13.5375C15.6033 12.3 14.961 10.8 14.961 9.075C14.961 7.3125 15.6033 5.8125 16.8501 4.575C18.0968 3.3375 19.608 2.7 21.3459 2.7C23.1216 2.7 24.6328 3.3375 25.8796 4.575C27.1263 5.8125 27.7308 7.3125 27.7308 9.075C27.7308 10.8 27.0885 12.3 25.8796 13.5375ZM38.876 11.0625L32.1511 0V17.1H34.1157V6.975L40.8406 18V0.975H38.876V11.0625ZM42.4274 2.9625H45.8276V17.1H47.7922V2.9625H51.2302V0.975H42.3896V2.9625H42.4274ZM52.8548 17.1H54.8193V0.975H52.8548V17.1ZM63.4711 8.8875C64.7178 8.1375 65.3601 7.0125 65.3601 5.5125C65.3601 4.275 64.9067 3.1875 64.0378 2.325C63.1688 1.4625 62.111 1.0125 60.8642 1.0125H58.2951V17.1375H61.242C62.4888 17.1375 63.5844 16.6875 64.4533 15.7875C65.3601 14.8875 65.8134 13.8375 65.8134 12.6C65.8134 11.7375 65.549 10.9125 65.0578 10.2375C64.68 9.6375 64.1511 9.1875 63.4711 8.8875ZM60.2975 2.9625H60.8642C61.5443 2.9625 62.1487 3.225 62.6399 3.7125C63.131 4.2375 63.3955 4.8 63.3955 5.5125C63.3955 6.225 63.131 6.7875 62.6399 7.275C62.1487 7.7625 61.5443 8.025 60.8264 8.025H60.2975V2.9625ZM63.0932 14.3625C62.5643 14.8875 61.9598 15.1125 61.242 15.1125H60.2975V9.975H61.242C61.9598 9.975 62.5643 10.2375 63.0932 10.725C63.6222 11.2125 63.8489 11.8125 63.8489 12.525C63.8489 13.275 63.6222 13.8375 63.0932 14.3625ZM68.5336 17.1H75.8252V15.1125H70.4982V10.0125H75.8252V8.025H70.4982V2.9625H75.8252V0.975H68.5336V17.1ZM80.3589 0.975H78.3943V17.1H85.6859V15.1125H80.3589V0.975ZM89.1995 0.975H87.2349V17.1H94.5265V15.1125H89.1995V0.975ZM108.543 3.1125C106.918 1.5 104.878 0.675 102.574 0.675C100.231 0.675 98.229 1.5 96.6044 3.1125C94.9799 4.725 94.1487 6.75 94.1487 9.0375C94.1487 11.325 94.9799 13.3125 96.6044 14.9625C98.229 16.575 100.231 17.4 102.574 17.4C104.916 17.4 106.918 16.575 108.543 14.9625C110.168 13.35 110.999 11.3625 110.999 9.0375C111.037 6.75 110.205 4.725 108.543 3.1125ZM107.107 13.5375C105.861 14.775 104.349 15.4125 102.574 15.4125C100.836 15.4125 99.3246 14.775 98.0779 13.5375C96.8311 12.3 96.1889 10.8 96.1889 9.075C96.1889 7.3125 96.8311 5.8125 98.0779 4.575C99.3246 3.3375 100.836 2.7 102.574 2.7C104.349 2.7 105.861 3.3375 107.107 4.575C108.354 5.8125 108.959 7.3125 108.959 9.075C108.959 10.8 108.316 12.3 107.107 13.5375Z"></path>
				</svg>
					</div>
					<!--<div class="col-6">
						<h1 class="text-center"><?php echo $titulo[$lang]; ?></h1>
					</div>-->
					<div class="col-6">
						<?php if ($lang != '') {?>
							<p class="text-end">
								<a href="index.php" >
									<?php echo $lang ?>
									<i class="bi bi-chevron-compact-down"></i>
								</a>
							</p> 
						<?php }?>
					</div>
				</div>

			</div>
		</header>
		<main class="mb-3 row">
			<div class="container-lg col-md-4" id="sidebar">
		<?php if ($prd == '') { // no hay información de idioma ?>
			<div class="list-group w-100 mx-auto text-center" id="idiomas">
        <?php foreach ($productos as $idioma => $productosIdioma): ?>
            <a href="#" class="list-group-item list-group-item-action" data-lang="<?php echo $idioma; ?>"><?php echo $idioma; ?></a>
        <?php endforeach; ?>
    </div>

    <ul id="productos" class="w-100 mx-auto">
        <!-- Los productos se mostrarán aquí -->
    </ul>
		
		</div>
		<?php } else { // mostramos las instrucciones en el idioma ?>

		<?php } ?>
			</div>
			<!-- /end col-md-6 -->
			<div class="container-lg col-md-8">
			<?php if ($lang == '')  { // no hay información de idioma ?>
			<div class="list-group w-50 mx-auto text-center">
				<!-- Imprimir enlaces para cambiar de idioma -->


			</div>
		<?php } else{ // mostramos las instrucciones en el idioma?>
			<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-5">
			<?php if ($_GET['p']){
				$p=$_GET['p'];
			}?>
			<div class="container-img fade-in-left"><img src="assets/images/main-<?php echo $p; ?>.png" style="max-width: 550px"></div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-7">
	
			<?php echo '<h1>' . $productos[$lang][$p] . '</h1>'; ?>
			
			<?php
				$fp = fopen('data-' . $_GET['l'] . '-' . $_GET['p'] . '.txt', 'r'); // abro el archivo de texto en modo lectura para windows
				$texto = fread($fp, filesize('data-' . $_GET['l'] . '-' . $_GET['p'] . '.txt')); // leo del archivo hasta el final de su tamaño
				fclose($fp); // cierro el archivo
				echo $texto;
				?>
				</div>
			</div>
				<?php
					}
				?>
			</div>
			<!-- /end col-md-6 -->
		</main>
		<footer class=" py-3">
			<div class="container-lg">
				<p class="text-center mb-0">&copy; <?php echo date('Y'); ?></p>
			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script>
			$(function(){
				 $.fn.replaceTagName = function(replaceWith) {
					var tags = [],
						i    = this.length;
					while (i--) {
						var newElement = document.createElement(replaceWith),
							thisi      = this[i],
							thisia     = thisi.attributes;
						for (var a = thisia.length - 1; a >= 0; a--) {
							var attrib = thisia[a];
							newElement.setAttribute(attrib.name, attrib.value);
						};
						newElement.innerHTML = thisi.innerHTML;
						$(thisi).after(newElement).remove();
						tags[i] = newElement;
					}
					return $(tags);
				};
				$('main table').addClass('table table-bordered  table-striped').wrap('<div class="table-responsive"></div>');
			});
		</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
			var url = window.location.href;
			var sidebar = document.getElementById("sidebar");
			if (url.includes("?p=") || url.includes("&p=")) {
				sidebar.style.display = "none";
			} else {
				sidebar.style.display = "block";
			}
});
</script>

<script>
 var productos = <?php echo json_encode($productos); ?>;
 function mostrarProductos(event) {
    event.preventDefault();
    var lang = event.target.getAttribute('data-lang');
    var productosEnIdioma = productos[lang];
    if (productosEnIdioma) {
        var idiomasMenu = document.getElementById('idiomas');
        var productosList = document.getElementById('productos');
        idiomasMenu.style.display = 'none';
        var volverButton = document.createElement('button');
        volverButton.textContent = 'Volver a idiomas';
        volverButton.addEventListener('click', volverAIdiomas);
        productosList.appendChild(volverButton);
        productosEnIdioma.forEach(function (producto, index) {
            var li = document.createElement('li');
            var productoLink = document.createElement('a');
            productoLink.href = `?l=${lang}&p=${index + 1}`;
            productoLink.textContent = producto;
            productoLink.classList.add('list-group-item', 'list-group-item-action');
            li.appendChild(productoLink);
            productosList.appendChild(li);
        });
        productosList.style.display = 'block';
    }
}
function volverAIdiomas() {
    var idiomasMenu = document.getElementById('idiomas');
    var productosList = document.getElementById('productos');
    while (productosList.firstChild) {
        productosList.removeChild(productosList.firstChild);
    }
    idiomasMenu.style.display = 'block';
    this.style.display = 'none';
}
 var idiomas = document.querySelectorAll('#idiomas a');
idiomas.forEach(function (idioma) {
idioma.addEventListener('click', mostrarProductos);
 });
</script>

	</body>
</html>