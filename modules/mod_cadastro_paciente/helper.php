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
class ModCadastroPacienteHelper
{
/**
 * 
 *Função responsável pelo cadastro do paciente utilizando transações
 * @param   string   aParam  Param
 *
 * @return  void
 */

public static function cadastrar($novoNome,$novoCpf,$novoRg,$novaData,$cep,$rua,$bairro,$cidade,$uf){


    $conn = JFactory::getDBO(); //conexão com o BD
    
    try
    {
        $conn->transactionStart();//inicia a transação
        
        $query = $conn->getQuery(true);//ativa a query
        
        //seta o array com as variaveis capturadas
        $values = array($conn->quote($novoNome), $conn->quote($novoCpf), $conn->quote($novoRg), $conn->quote($novaData));
        //insere na tabela
        $query->insert($conn->quoteName('#__pessoa'));
        //insere nas colunas correspondentes
        $query->columns($conn->quoteName(array('nome', 'cpf', 'rg', 'data_nascimento')));
        //separa os valores devidamente
        $query->values(implode(',',$values));
        //esvazia a query
        $conn->setQuery($query);

        $result = $conn->execute();


        $query2 = $conn->getQuery(true);//ativa a query
        
        //seta o array com as variaveis capturadas
        $values2 = array($conn->quote($novoCpf),$conn->quote($cep), $conn->quote($rua), $conn->quote($bairro), $conn->quote($cidade),$conn->quote($uf));
        //insere na tabela
        $query2->insert($conn->quoteName('#__endereco'));
        //insere nas colunas correspondentes
        $query2->columns($conn->quoteName(array('cpf','cep','rua','bairro', 'codmunicipio', 'uf')));
        //separa os valores devidamente
        $query2->values(implode(',',$values2));
        //esvazia a query
        $conn->setQuery($query2);

        //resultado da conexão
        $result2 = $conn->execute();
    
        $conn->transactionCommit();

        
    }
    catch (Exception $e)
    {
        // catch any database errors.
        $conn->transactionRollback();
        JErrorPage::render($e);
    }
    
    
        /*$conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('nome')
        ->from($conn->quoteName('teste_pessoa'))
        ->where($conn->quoteName('nome') . " = " . $conn->quote($novoNome));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; */
    }

    public static function getCodigoCidade($cidade){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('cod_municipio')
        ->from($conn->quoteName('sisvev_municipio'))
        ->where($conn->quoteName('desc_municipio') . " = " . $conn->quote($cidade));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    
    public static function getCodigoUf($ufinform){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('cod_uf')
        ->from($conn->quoteName('sisvev_uf'))
        ->where($conn->quoteName('desc_uf') . " = " . $conn->quote($ufinform));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    
}
?>