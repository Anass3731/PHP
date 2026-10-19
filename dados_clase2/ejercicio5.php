<?php
require 'includes/navbar.php'; 

//comprobMOS SI SE HA ENVIADO EL FORMULARIO
$formularioEnviado = isset($_GET['enviar']);



?>



<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>


<input type="submit">
<input type="hidden" name="enviar" value="1">

</form>

<?php 
if ($formularioEnviado==1) {
?>
Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; 
}
?>

</body>
</html>

