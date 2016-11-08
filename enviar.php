<?php
/*====================================================================+
|| # Encuesta Elecciones Valparaiso - Desarrollo Web 2016 - Universidad de Valparaíso
|+====================================================================+
|| # Copyright © 2016 Felipe Allendes. All rights reserved.
|| # https://github.com/allendesfelipe/encuesta_prueba
|+====================================================================*/

// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}



// Variables
$directorio = 'C:/wamp/www/FormularioPHP/assets/';
$extension = explode('.', $_FILES['foto']['name']);
$nombre_foto = time() . '.' . $extension[1];

$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? Filtro($_POST['apellido']) : '';
$aniona = isset($_POST['aniona']) ? Filtro($_POST['aniona']) : '';
//$aniona = isset($_POST['aniona']) ? (int) $_POST['aniona'] : 0;
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$region = isset($_POST['region']) ? Filtro($_POST['region']) : '';
$areainteres = isset($_POST['areainteres']) ? Filtro($_POST['areainteres']) : '';
$pagpersonal = isset($_POST['pagpersonal']) ? Filtro($_POST['pagpersonal']) : '';
$correo = isset($_POST['correo']) ? Filtro($_POST['correo']) : '';
$colorfav = isset($_POST['colorfav']) ? Filtro($_POST['colorfav']) : '';



$error = '';
?>
<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Felipe Allendes">
  <title>Formulario enviado.</title>
  <!-- CSS -->

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <!--
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css"> -->
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>

<?php
// Mostrar contenido
//if(is_numeric($_POST['RUT']) == 0){
//$error = 'Por favor, ingrese RUT correcto';
//}
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;

} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($apellido)) {
  $error = 'Por favor, ingrese su apellido.';
} else if(empty($aniona)) {
  $error = 'Por favor, ingrese su año de nacimiento.';
} else if(empty($sexo)) {
  $error = 'Por favor, sexo.';
} else if(empty($region)) {
  $error = 'Por favor, ingrese su region.';
} else if(empty($areainteres)) {
  $error = 'Por favor, ingrese su area de interes.';
} else if(empty($pagpersonal)) {
  $error = 'Por favor, seleccione su pagina personal.';
} else if(empty($correo)) {
  $error = 'Por favor, seleccione su color favorito.';
} 
// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen
  move_uploaded_file($foto['tmp_name'], $foto_subida);
?>

  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Bienvenido(a) <b><?php echo $nombre; ?></b>,</p>
      
      <p> Apellido : <b><?php echo $apellido; ?></b></p>
      <p> Año de nacimiento : <b><?php echo $aniona; ?></b></p>
      <p>
        Tu sexo es: <b><?php echo ($sexo == 'm' ? 'Masculino' : 'Femenino'); ?></b>
      </p>
      <p> Region : <b><?php echo $region; ?></b></p>
      <p> Area de interes: <b><?php echo $areainteres; ?></b></p>
      <p> Página personal: <b><?php echo $pagpersonal; ?></b></p>
      <p> Tu correo electrónico es <b><?php echo $correo; ?></b></p>
      <p> Color favorito : <b><?php echo $colorfav; ?></b></p>
      </p>
    
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>

<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/allendesfelipe" target="_blank">Felipe Allendes</a>
    </div>
  </footer>
</div>
</body>
</html>