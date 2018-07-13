<?php

class Application_Model_DbTable_Commande extends Zend_Db_Table_Abstract
{

    protected $_name = 'commande';




public function addcmd($date_cmd,$date_lv,$tel_cl)
{
$data = array(
'datecommande' => $date_cmd,
'datelivrasion' => $date_lv,
'tel' => $tel_cl,


);
$id=$this->insert($data);

return $id;
}
}

