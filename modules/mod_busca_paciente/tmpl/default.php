
 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"method="post" accept-charset="utf-8">
INSIRA O CPF: <input type=text maxlength="11" name="cpf"><br>
<?php 
	defined('_JEXEC') or die;
	require_once dirname(__FILE__) . '/helper.php';
	//$novoNome = $_POST['nome'];
	if (isset($_POST['OK']))
	{
		$resultado = ModBusca::buscar($_POST['cpf']);
		//print_r($resultado);
		foreach	($resultado as $indice){
            echo "<tr><td value=\"".$indice."\"".">"."$indice"."</td></tr>";
            
			
        }
		
		
	}




	
?>

<input type=submit name="OK" value="OK">
</form>
</body>
</html>

