<?php
/**
 *Classe responsável pela manipulação dos dados
 * 
 * @author Marcelo Ferreira Mota
 * @license    GNU/GPL, see LICENSE.php
 * mod_cadastro_paciente is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModBusca
{
/**
 * 
 *Função responsável pela busca do paciente
 * @param   string   aParam  Param
 *
 * @return  void
 */

public static function buscar($novoNome){


	$conn = JFactory::getDbo();
	$query = $conn->getQuery(true);

	$query
    ->select(array('p.nome','p.cpf','p.rg', 'p.nascimento','e.rua','e.bairro','c.cod_cep','m.desc_municipio'))
    ->from($conn->quoteName('sisvev_pessoa', 'p'))
    ->join('INNER', $conn->quoteName('sisvev_endereco', 'e') . ' ON ' . $conn->quoteName('e.cpf') . ' = ' . $conn->quoteName('p.cpf'))
	->join('INNER', $conn->quoteName('tabcep', 'c') . ' ON ' . $conn->quoteName('c.cod_cep') . ' = ' . $conn->quoteName('e.cep'))
	->join('INNER', $conn->quoteName('sisvev_municipio', 'm') . ' ON ' . $conn->quoteName('m.cod_municipio') . ' = ' . $conn->quoteName('c.cod_municipio'))
	->where($conn->quoteName('p.cpf') . ' = ' . $conn->quote($novoNome));
    


	$conn->setQuery($query);
	$count = $conn->loadRow();
	
	return $count;

}
    
}
?>