<?php

class Application_Model_ContactoMapper
{
    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Getway de datos invalido');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Contacto');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Contacto $contacto)
    {
        /*
        $data = array(
            'nombre'   => $contacto->getNombre(),
            'direccion'   => $contacto->getDireccion(),
            'email'   => $contacto->getEmail(),
            'telefono'   => $contacto->getTelefono(),
            'celular'   => $contacto->getCelular(),
        );*/
        
        /* Parametriza el SP */
        $querySP = "CALL `agendadb`.`altaContacto`('"
                . $contacto->getNombre()."', "
                . "'".$contacto->getDireccion()."', "
                . "'".$contacto->getEmail()."', "
                . "'".$contacto->getTelefono()."', "
                . "'".$contacto->getCelular()."');";
        
        $queryEX = $this->getDbTable()->getAdapter()->query($querySP);
        $queryEX->execute();
        
        /*
        if (null === ($idContac = $contacto->getIdCntac())) {
            unset($data['idContac']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idContac = ?' => $idContac));
        }*/
    }
 
    public function find($idContac, Application_Model_Contacto $contacto)
    {
        $result = $this->getDbTable()->find($idContac);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $contacto->setIdCntac($row->idContac)
                  ->setNombre($row->nombre)
                  ->setDireccion($row->direccion)
                  ->setEmail($row->email)
                  ->setTelefono($row->telefono)
                  ->setCelular($row->celular);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Contacto();
            $entry->setIdContac($row->idContac)
                  ->setNombre($row->nombre)
                  ->setDireccion($row->direccion)
                  ->setEmail($row->email)
                  ->setTelefono($row->telefono)
                  ->setCelular($row->celular);
            $entries[] = $entry;
        }
        return $entries;
    }
}

