<?php

class ContactoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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


}



