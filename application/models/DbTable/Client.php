<?php

class Application_Model_DbTable_Client extends Zend_Db_Table_Abstract
{

    protected $_name = 'client';



public function addcl($nom,$tel)
{
$data = array(
'nom' => $nom,
'tel' => $tel,


);

$row = $this->fetchRow('tel = ' . $tel);
if (!$row) {
$this->insert($data);
}

}

}

