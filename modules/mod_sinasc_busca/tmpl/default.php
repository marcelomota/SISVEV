
 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"method="post" accept-charset="utf-8">
DIGITE O CÓDIGO DA DECLARAÇÃO DE NASCIMENTO: <input type=text maxlength="8" name="dn"><br>
<table>
	
<?php 
	defined('_JEXEC') or die;
	require_once dirname(__FILE__) . '/helper.php';
	if (isset($_POST['OK']))
	{
		$novoNome = $_POST['dn'];
		$resultado = ModBusca::buscar($novoNome);
		
		foreach	($resultado as $indice){
            echo "<tr><td value=\"".$indice."\"".">"."$indice"."</td></tr>";
            
			
        }
		
		
	}




	
?>

</table>
<input type=submit name="OK" value="OK">
</form>
</body>
</html>

