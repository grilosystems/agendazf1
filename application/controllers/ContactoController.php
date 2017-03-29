<?php

class ContactoController extends Zend_Controller_Action
{

    public function init()
    {
        $this->initView();  
        $this->view->baseUrl = $this->_request->getBaseUrl(); 
    }

    public function indexAction()
    {
        $contacto = new Application_Model_ContactoMapper();
        $this->view->entries = $contacto->fetchAll();
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Contacto();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Contacto($form->getValues());
                $mapper  = new Application_Model_ContactoMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }
    
    public function testAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) 
        {
            $this->_helper->viewRenderer->setNoRender(); 
            
            $contacto = new Application_Model_Contacto();
            $mapper  = new Application_Model_ContactoMapper();
            
            //Obteniendo campos
            $nombre = $this->_request->getPost('nombre');
            $direccion = $this->_request->getPost('dir');
            $email = $this->_request->getPost('email');
            $telefono = $this->_request->getPost('tel');
            $celular = $this->_request->getPost('cel');

            $contacto->setNombre($nombre);
            $contacto->setDireccion($direccion);
            $contacto->setEmail($email);
            $contacto->setTelefono($telefono);
            $contacto->setCelular($celular);
            
            $mapper->save($contacto);
            
        }
        
        /*
        $nombre = $_POST['nombre'];
        $direccion = $_POST['dir'];
        $email = $_POST['email'];
        $telefono = $_POST['tel'];
        $celular = $_POST['cel'];*/
           
    }
    
}



