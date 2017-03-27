<?php

class Application_Model_Contacto
{
    protected $_nombre;
    protected $_direccion;
    protected $_email;
    protected $_telefono;
    protected $_celular;
    protected $_idContac;
 
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propiedad getway de datos invalido');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propiedad getway de datos invalido');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
 
    public function setNombre($text)
    {
        $this->_nombre = (string) $text;
        return $this;
    }
 
    public function getNombre()
    {
        return $this->_nombre;
    }
    
    public function setDireccion($text)
    {
        $this->_direccion = (string) $text;
        return $this;
    }
 
    public function getDireccion()
    {
        return $this->_direccion;
    }
    
    public function setEmail($text)
    {
        $this->_email = (string) $text;
        return $this;
    }
 
    public function getEmail()
    {
        return $this->_email;
    }
    
    public function setTelefono($text)
    {
        $this->_telefono = (string) $text;
        return $this;
    }
 
    public function getTelefono()
    {
        return $this->_telefono;
    }
    
    public function setCelular($text)
    {
        $this->_celular = (string) $text;
        return $this;
    }
 
    public function getCelular()
    {
        return $this->_celular;
    }
    
    public function setIdContac($text)
    {
        $this->_idContac = (string) $text;
        return $this;
    }
 
    public function getIdContac()
    {
        return $this->_idContac;
    }
 
    
}

