<?php

namespace spec\Bonsi\Workalongs\Presenters;

use Mockery;
use PhpSpec\ObjectBehavior;

class PresentableTraitSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Bonsi\Workalongs\Presenters\Foo');        
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('spec\Bonsi\Workalongs\Presenters\Foo');
    }
    
    function it_fetches_a_valid_presenter()
    {
        Mockery::mock('FooPresenter');
                
        $this->present()->shouldBeAnInstanceOf('FooPresenter');
    }
    
    function it_throws_up_if_invalid_presenter_is_provided()
    {
        $this->presenter = 'Invaaaaalid';
        
//        $this->present()->shouldThrow('PresenterException');
        $this->shouldThrow('Bonsi\Workalongs\Presenters\Exceptions\PresenterException')->duringPresent();
    }
    
    function it_caches_the_presenter_for_future_use()
    {
        Mockery::mock('FooPresenter');
        
        $one = $this->present();
        $two = $this->present();

        $one->shouldBe($two);
        
    }
    
    
    
}

class Foo
{
//    use \Bonsi\Workalongs\Presenters\PresentableTrait;
    
    use \Bonsi\Workalongs\Presenters\PresentableTrait;

    public $presenter = 'FooPresenter';
    
    
}