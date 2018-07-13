<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	 $pro = new Application_Model_DbTable_Produit();
        $this->view->prodt = $pro->getnull();
		  $form = new Application_Form_Formulaire();
	   $this->view->form=$form;
	   if ($this->getRequest()->isPost()) {
$formData = $this->getRequest()->getPost();
if ($form->isValid($formData)) {
$nomp = $form->getValue('nom_produit');
$prix = $form->getValue('prix');
$ma = $form->getValue('id_magasin');
$cat = $form->getValue('id_categorie');

$apro = new Application_Model_DbTable_Produit();
$apro->addpro($nomp,$prix,$ma,$cat);
$this->_helper->redirector('index');
} else {
$form->populate($formData);
}
}
      
    }

    public function addAction()
    {
       
    }

    public function modifyAction()
    {
       
	      
       $form = new Application_Form_Formulaire();
	   $this->view->form=$form;
if ($this->getRequest()->isPost()) {
$formData = $this->getRequest()->getPost();
if ($form->isValid($formData)) {
$id = (int)$this->_request->getParam('id');
$nomp = $form->getValue('nom_produit');
$prix = $form->getValue('prix');
$ma = $form->getValue('id_magasin');
$cat = $form->getValue('id_categorie');
$apro = new Application_Model_DbTable_Produit();
$apro->updatepro($id,$nomp,$prix,$ma,$cat);
$this->_helper->redirector('index');
} else {
$form->populate($formData);
}
} else {
$id = $this->_getParam('id', 0);
if ($id > 0) {
$apro = new Application_Model_DbTable_Produit();
$form->populate($apro->getpro($id));

}
}
    }

    public function deleteAction()
    {
       
	     if ($this->getRequest()->isPost()) {
$del = $this->getRequest()->getPost('del');
if ($del == 'Yes') {
$id = $this->getRequest()->getPost('id');
$apro = new Application_Model_DbTable_Produit();
$apro->deletepro($id);
}
$this->_helper->redirector('index');
} else {
//$id = $this->_getParam('id', 0);
//$apro = new Application_Model_DbTable_Produit();
//$this->view->pro = $apro->getpro($id);
$this->_helper->redirector('index');
}
    
	
    }

    public function commandAction()
    {
        $pro = new Application_Model_DbTable_Produit();
		
 $this->view->prodt = $pro->getnull();
 $this->view->vend = $pro->vend();
		//isset
		if(!empty($_GET['nom_cl'])){
			
			$nom_cl=htmlspecialchars($_GET['nom_cl']);
			$tel_cl=htmlspecialchars($_GET['tel_cl']);
			$id_pro=htmlspecialchars($_GET['id_pro']);
			$date_cmd=htmlspecialchars($_GET['date_cmd']);
			$date_lv=htmlspecialchars($_GET['date_lv']);
			
		$client = new Application_Model_DbTable_Client();
		$client->addcl($nom_cl,$tel_cl);
			
		$cmd =	new Application_Model_DbTable_Commande();
		$id_cmd=$cmd->addcmd($date_cmd,$date_lv,$tel_cl);
			
		$prod = new	Application_Model_DbTable_Produit();
		$pro->addprocmd($id_pro,$id_cmd);
			
		}
	  
	
	  
    }


}









