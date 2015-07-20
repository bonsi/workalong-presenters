<?php   namespace Bonsi\Workalongs\Presenters;

/**
 * 
 */
abstract class Presenter
{
    /**
    *
    * @var $entity 
    */
    protected $entity;
    
    
    /**
     * 
     *
     * @return void
     */
    function __construct($entity) 
    {
        $this->entity = $entity;
    }
    
    
    /**
     * 
     *
     * @return  Response from  presenter method, or else entity method
     */
    public function __get($property)
    {
        if( method_exists($this, $property) )
        {
            return $this->{$property}();
        }
        
        return $this->entity->{$property};        
    }
    
    
}
