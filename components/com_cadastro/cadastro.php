<?php 
//require_once dirname(__FILE__) . '/resultado.php';
defined('_JEXEC') or die;  
/*
$novoNome = "";
$jinput = JFactory::getApplication()->input;

if (isset($_POST['novoNome']))
{
	$novoNome = (string)$_POST['novoNome'];
}
if (empty($novoNome)) {
	//$result =  "";
}


$conn = JFactory::getDBO(); //conexão com o BD

// Create and populate an object.
$profile = new stdClass();
$profile->nome=$novoNome;



// Create a new query object.
$query = $conn->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
$query->select($conn->quoteName('nome'));
$query->from($conn->quoteName('#__pessoa'));
$query->where($conn->quoteName('nome'). 'LIKE'.$conn->quote('$novoNome'));

// Reset the query using our newly populated query object.
$conn->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
//$result = $conn->loadObjectList();



// Insert the object into the user profile table.
$result = $conn->LoadObject();//JFactory::getDbo()->insertObject('#__pessoa', $profile, 'id');

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
<form action="<?php echo JRoute::_('index.php?option=com_cadastro/teste/resultado.php'); ?>" method="post" accept-charset="utf-8">
NOME: <input type=text name="novoNome"><br>
<!--<input type="hidden" value="$previous" />-->
<input type=submit value="OK">
</form>
<?php //echo $results ;
?>
</body>
</html>


