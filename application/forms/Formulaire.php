<?php

class Application_Form_Formulaire extends Zend_Form
{

    public function init()
    {
$id = new Zend_Form_Element_Hidden('id');
$id->addFilter('Int');
$nom = new Zend_Form_Element_Text('nom_produit');
$nom->setRequired(true)
->addFilter('StripTags')
->addFilter('StringTrim')
->addValidator('NotEmpty');
$prix = new Zend_Form_Element_Text('prix');
$prix->setRequired(true)
->addFilter('StripTags')
->addFilter('StringTrim')
->addValidator('NotEmpty');


$opt = new Zend_Form_Element_Select('id_magasin');
$opt->addMultiOptions(array(
        "1" => "magasin_A",
        "2" => "magasin_B",
    ));
	$opt1 = new Zend_Form_Element_Select('id_categorie');
$opt1->addMultiOptions(array(
        "1" => "material_informatique",
        "2" => "vetements",
    ));
	
$envoyer = new Zend_Form_Element_Submit('submit');

$this->addElements(array($nom,$prix,$envoyer,$opt,$opt1,$id));
    }


}

