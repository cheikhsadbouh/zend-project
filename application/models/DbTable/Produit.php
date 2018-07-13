<?php

class Application_Model_DbTable_Produit extends Zend_Db_Table_Abstract
{

    protected $_name = 'produit';





public function getpro($id)
{
$id = (int)$id;
$row = $this->fetchRow('id_produit = ' . $id);
if (!$row) {
throw new Exception("Could not find row $id");
}
return $row->toArray();
}




public function addpro($nomp,$prix,$ma,$cat)
{
$data = array(
'nom_produit' => $nomp,
'prix' => $prix,
'id_magasin' => $ma,
'id_categorie' => $cat,

);
$this->insert($data);
}




public function updatepro($id,$nomp,$prix,$ma,$cat)
{
$data = array(
'nom_produit' => $nomp,
'prix' => $prix,
'id_magasin' => $ma,
'id_categorie' => $cat,
);
$this->update($data, 'id_produit = '. (int)$id);
}


public function deletepro($id)
{
$this->delete('id_produit =' . (int)$id);
}

public function addprocmd($id_pro,$id_cmd)
{
	$arr= explode(",", $id_pro);
	foreach ($arr as $value){
			
$data = array(
'n_commande' =>(int) $id_cmd,


);
$this->update($data, 'id_produit = '. (int)$value);
}

}


public function vend()
{
	$select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
    $select->setIntegrityCheck(false)
       ->join('commande', 'commande.n_commande = produit.n_commande');

$rows = $this->fetchAll($select);
	return $rows;
}

public function getnull(){
			//$id="null";
			//return $this->select()->where('n_commande= ?', $id);


$select= $this->select()
->from('produit')
->where("n_commande  IS NULL");

  return $this->fetchAll($select);
}


}

