<?php   namespace Bonsi\Workalongs\Presenters;

use Bonsi\Workalongs\Presenters\Exceptions\PresenterException;

/**
 *
 * @author ivo
 */
trait PresentableTrait
{
    /**
    *
    * @var $presenterInstance     
     */
    protected $presenterInstance;
    

    /**
     * 
     * @return Presenter instance
     * @throws PresenterException
     */
    public function present()
    {
        if( !$this->presenter || !class_exists($this->presenter) )
        {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }
        
        if( !isset($this->presenterInstance) )
        {
            $this->presenterInstance = new $this->presenter($this);
        }
        
        return $this->presenterInstance;
    }   
    
    
}
