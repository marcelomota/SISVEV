<?php 
// No direct access
defined('_JEXEC') or die; 

$novoNome = "";

if (isset($_POST['novoNome']))
{
	$novoNome = (string)$_POST['novoNome'];
}



$conn = JFactory::getDBO(); //conexão com o BD

// Create a new query object.
$query = $conn->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
$query->select($conn->quoteName(array('id', 'nome')));
$query->from($conn->quoteName('#__pessoa'));
$query->where($conn->quoteName('nome') . ' LIKE ' . $conn->quote('$novoNome'));

// Reset the query using our newly populated query object.
$conn->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$results = "Ta imprimindo será ?";
print_r($results);

// Insert the object into the user profile table.


/*
$sql = "SELECT * FROM #__pessoa";
$sql = "INSERT INTO `sisvev_pessoa` (`nome`) VALUES ('$novoNome')";
$conn->setQuery($sql);


if($conn->query()){
	//echo "inseriu";
}
else{

	echo $con->getErroMsg();
}

//$resultado = $conn->loadObjectList();

//echo "id".$resultado[0]->id;
//echo "Nome".$resultado[0]->nome;
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $results; ?>
</body>
</html>