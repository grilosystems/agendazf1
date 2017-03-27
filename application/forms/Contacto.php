<?php

class Application_Form_Contacto extends Zend_Form
{

    public function init()
    {
        //Metodo de envio
        $this->setMethod('post');
        
        /* Formulario */
        
        //Campo Nombre
        $this->addElement('text', 'nombre', array(
            'label' => 'Nombre: ',
            'required' => true,
            'validators' => array(
                array(
                    'validator' => 'StringLength', 
                    'options' => array(0,100)
                )
            )
        ));
        
        //Campo Dirección
        $this->addElement('text', 'direccion', array(
            'label' => 'Direccion: ',
            'required' => true,
            'validators' => array(
                array(
                    'validator' => 'StringLength', 
                    'options' => array(0,200)
                )
            )
        ));
        
        //Campo Email
        $this->addElement('text', 'email', array(
            'label' => 'E-Mail: ',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));
        
        //Teléfono
        $this->addElement('text', 'telefono', array(
            'label' => 'Teléfono: ',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(
                array(
                    'validator' => 'StringLength', 
                    'options' => array(0,15)
                )
            )
        ));
        
        //Campo Celular
        $this->addElement('text', 'celular', array(
            'label' => 'Celular: ',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(
                array(
                    'validator' => 'StringLength', 
                    'options' => array(0,15)
                )
            )
        ));
        
        //Botón Guardar
        $this->addElement('submit', 'enviar', array(
            'ignore'   => true,
            'label'    => 'Guardar',
        ));
        
        //Proteccion CSRF
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

