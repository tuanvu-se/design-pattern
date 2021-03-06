<?php

namespace SimUDuck\Test\Unit;

use SimUDuck\Fly\FlyRocketPowered;
use SimUDuck\Quack\MuteQuack;
use SimUDuck\RubberDuck;
use PHPUnit\Framework\TestCase;

/**
 * RubberDuck unit test class.
 */
class RubberDuckTest extends TestCase
{
    public function testDisplaySuccess()
    {
        $rubberDuck = new RubberDuck();
        $this->assertEquals('I am Rubber Duck.', $rubberDuck->display());
    }

    public function testSwimSuccess()
    {
        $rubberDuck = new RubberDuck();
        $this->assertEquals('I am swimming.', $rubberDuck->swim());
    }

    public function testPerformFlyToFlyNoWay()
    {
        $rubberDuck = new RubberDuck();
        $this->assertEquals('I cannot fly!', $rubberDuck->performFly());
    }

    public function testPerformFlyToFlyRocketPowered()
    {
        $rubberDuck = new RubberDuck();
        $rubberDuck->setFlyBehavior(new FlyRocketPowered());

        $this->assertEquals('Woo-hoo! I am flying with a rocket.', $rubberDuck->performFly());
    }

    public function testPerformQuackToSqueak()
    {
        $rubberDuck = new RubberDuck();
        $this->assertEquals('Squeak...squeak...squeak!', $rubberDuck->performQuack());
    }

    public function testPerformQuackToMuteQuack()
    {
        $rubberDuck = new RubberDuck();
        $rubberDuck->setQuackBehavior(new MuteQuack());

        $this->assertEquals('I cannot quack!', $rubberDuck->performQuack());
    }
}
