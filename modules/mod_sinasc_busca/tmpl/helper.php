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
 *
 * @param   string   aParam  Param
 *
 * @return  void
 */
public static function buscar($novoNome){
    //INSERT INTO `sisvev_locnasc` (`codigo`, `descr`) VALUES ('1', 'Hospital'), ('2', 'Outro Estab Saúde'), ('3', 'Domicílio'), ('4', 'Outros'), ('9', 'Ignorado');
    //CREATE TABLE `sisvev`.`sisvev_estcivmae` ( `codigo` INT(1) NOT NULL , `descr` CHAR(33) NOT NULL , INDEX (`codigo`)) ENGINE = InnoDB;
    //ALTER TABLE sisvev_certidao_nascimento ADD CONSTRAINT ESCMAE FOREIGN KEY(ESCMAE) REFERENCES sisvev_escmae(codigo);
    
        $conn = JFactory::getDbo();
        $query = $conn->getQuery(true);
    
        $query
        ->select(array('c.NUMERODN','locnasc.descr', 'estab.descestab','t.cod_cep','muni.desc_municipio','c.IDADEMAE',
        'ecvl.descr','esc.descr','cbo.ds_cbo','c.QTDFILVIVO','c.QTDFILMORT','t1.cod_cep','muni1.desc_municipio',
        'gest.descr','grav.descr','p.descr','cons.descr','c.DTNASC','c.HORANASC','s.descr','c.APGAR_1','c.APGAR_5','r.descr',
        'c.PESO','idan.descr','cid.descr','c.DTCADASTRO','c.DTRECEBIM','estab1.descestab','uf.desc_uf'))
        ->from($conn->quoteName('sisvev_certidao_nascimento', 'c'))
        ->join('INNER', $conn->quoteName('sisvev_locnasc', 'locnasc') . ' ON ' . $conn->quoteName('locnasc.codigo') . ' = ' . $conn->quoteName('c.LOCNASC'))
        ->join('INNER', $conn->quoteName('cnesdn18', 'estab') . ' ON ' . $conn->quoteName('estab.codestab') . ' = ' . $conn->quoteName('c.CODESTAB'))
        ->join('INNER', $conn->quoteName('tabcep', 't') . ' ON ' . $conn->quoteName('t.cod_cep') . ' = ' . $conn->quoteName('c.CODBAINASC'))
        ->join('INNER', $conn->quoteName('sisvev_municipio', 'muni') . ' ON ' . $conn->quoteName('muni.cod_municipio') . ' = ' . $conn->quoteName('c.CODMUNNASC'))
        ->join('INNER', $conn->quoteName('sisvev_estcivmae', 'ecvl') . ' ON ' . $conn->quoteName('ecvl.codigo') . ' = ' . $conn->quoteName('c.ESTCIVMAE'))
        ->join('INNER', $conn->quoteName('sisvev_escmae', 'esc') . ' ON ' . $conn->quoteName('esc.codigo') . ' = ' . $conn->quoteName('c.ESCMAE'))
        ->join('INNER', $conn->quoteName('cbo2002', 'cbo') . ' ON ' . $conn->quoteName('cbo.cbo') . ' = ' . $conn->quoteName('c.CODOCUPMAE'))
        ->join('INNER', $conn->quoteName('tabcep', 't1') . ' ON ' . $conn->quoteName('t1.cod_cep') . ' = ' . $conn->quoteName('c.CODBAIRES'))
        ->join('INNER', $conn->quoteName('sisvev_municipio', 'muni1') . ' ON ' . $conn->quoteName('muni1.cod_municipio') . ' = ' . $conn->quoteName('c.CODMUNRES'))
        ->join('INNER', $conn->quoteName('sisvev_gestacao', 'gest') . ' ON ' . $conn->quoteName('gest.codigo') . ' = ' . $conn->quoteName('c.GESTACAO'))
        ->join('INNER', $conn->quoteName('sisvev_gravidez', 'grav') . ' ON ' . $conn->quoteName('grav.codigo') . ' = ' . $conn->quoteName('c.GRAVIDEZ'))
        ->join('INNER', $conn->quoteName('sisvev_parto', 'p') . ' ON ' . $conn->quoteName('p.codigo') . ' = ' . $conn->quoteName('c.PARTO'))
        ->join('INNER', $conn->quoteName('sisvev_consultas', 'cons') . ' ON ' . $conn->quoteName('cons.codigo') . ' = ' . $conn->quoteName('c.CONSULTAS'))
        ->join('INNER', $conn->quoteName('sisvev_sexo', 's') . ' ON ' . $conn->quoteName('s.codigo') . ' = ' . $conn->quoteName('c.SEXO'))
        ->join('INNER', $conn->quoteName('sisvev_racacor', 'r') . ' ON ' . $conn->quoteName('r.codigo') . ' = ' . $conn->quoteName('c.RACACOR'))
        ->join('INNER', $conn->quoteName('sisvev_idanomal', 'idan') . ' ON ' . $conn->quoteName('idan.codigo') . ' = ' . $conn->quoteName('c.IDANOMAL'))
        ->join('INNER', $conn->quoteName('cid10', 'cid') . ' ON ' . $conn->quoteName('cid.cid10') . ' = ' . $conn->quoteName('c.CODANOMAL'))
        ->join('INNER', $conn->quoteName('cnesdn18', 'estab1') . ' ON ' . $conn->quoteName('estab1.codestab') . ' = ' . $conn->quoteName('c.CODINST'))
        ->join('INNER', $conn->quoteName('sisvev_uf', 'uf') . ' ON ' . $conn->quoteName('uf.cod_uf') . ' = ' . $conn->quoteName('c.UFINFORM'))
        ->where($conn->quoteName('c.NUMERODN') . ' = ' . $conn->quote($novoNome));
        
    
    
        $conn->setQuery($query);
        $count = $conn->loadRow();
        
        return $count;
    
        
    
        
    }








    
}
?>