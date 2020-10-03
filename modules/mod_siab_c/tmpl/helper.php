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
class ModCadastroSiab
{
/**
 * 
 *Função responsável pelo cadastro do paciente utilizando transações
 * @param   string   aParam  Param
 *
 * @return  void
 */

public static function cadastrar($novoNome,$dtnasc,$estcivil,$escol,$logradouro,$numero,$complemento,$cep,$bairro,$cidade,$uf){


    $conn = JFactory::getDBO(); //conexão com o BD
    
    try
    {
        $conn->transactionStart();//inicia a transação
        
        $query = $conn->getQuery(true);//ativa a query
        
        //seta o array com as variaveis capturadas
        $values = array($conn->quote($novoNome), $conn->quote($dtnasc), $conn->quote($estcivil), $conn->quote($escol),
        $conn->quote($logradouro),$conn->quote($numero),$conn->quote($complemento),$conn->quote($cep),$conn->quote($bairro),
        $conn->quote($cidade),$conn->quote($uf));
        //insere na tabela
        $query->insert($conn->quoteName('siab'));
        //insere nas colunas correspondentes
        $query->columns($conn->quoteName(array('siab_NOME', 'siab_IDADE', 'siab_ESTADOCIVIL',
        'siab_ESCOL','siab_LOGRD','siab_NUMERO','siab_COMPLE','siab_CEP','siab_BAIRRO','siab_CIDADERES',
        'siab_UFRES')));
        //separa os valores devidamente
        $query->values(implode(',',$values));
        //esvazia a query
        $conn->setQuery($query);

        $result = $conn->execute();
    
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
// metodo responsável por cadastrar na tabela de controle o código para verificação futura dos dados conssitentes.
    public static function insertControle($codigo){


        $conn = JFactory::getDBO(); //conexão com o BD
        
        try
        {
            $conn->transactionStart();//inicia a transação
            
            $query = $conn->getQuery(true);//ativa a query
            
            //seta o array com as variaveis capturadas
            $values = array($conn->quote($codigo));
            //insere na tabela
            $query->insert($conn->quoteName('consistencia'));
            //insere nas colunas correspondentes
            $query->columns($conn->quoteName(array('codigo')));
            //separa os valores devidamente
            $query->values(implode(',',$values));
            //esvazia a query
            $conn->setQuery($query);
    
            $result = $conn->execute();
        
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