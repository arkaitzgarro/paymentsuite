<?php

/**
 * PaymentCoreBundle for Symfony2
 *
 * This Bundle is part of Symfony2 Payment Suite
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 *
 * Marc Morera 2013
 */

namespace PaymentSuite\PaymentCoreBundle\Tests\Event;

use PaymentSuite\PaymentCoreBundle\Event\PaymentOrderDoneEvent;

/**
 * Tests PaymentSuite\PaymentCoreBundle\Event\PaymentOrderDoneEvent class
 */
class PaymentOrderDoneEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PaymentOrderDoneEvent
     *
     * Object to test
     */
    private $event;

    /**
     * @var PaymentBridge
     *
     * Order Wrapper
     */
    private $paymentBridge;

    /**
     * @var PaymentMethodInterface
     *
     * Payment method object
     */
    private $paymentMethod;

    /**
     * Setup
     */
    public function setUp()
    {

        $this->paymentBridge = $this->getMock('\PaymentSuite\PaymentCoreBundle\Services\Interfaces\PaymentBridgeInterface');
        $this->paymentMethod = $this->getMock('\PaymentSuite\PaymentCoreBundle\PaymentMethodInterface');
        $this->event = new PaymentOrderDoneEvent($this->paymentBridge, $this->paymentMethod);
    }

    /**
     * Testing if event instances Event Framework class
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf('Symfony\Component\EventDispatcher\Event', $this->event);
    }

    /**
     * Testing getPaymentBridge
     */
    public function testGetPaymentBridge()
    {
        $this->assertEquals($this->paymentBridge, $this->event->getPaymentBridge());
    }

    /**
     * Testing getPaymentMethod
     */
    public function testGetPaymentMethod()
    {
        $this->assertEquals($this->paymentMethod, $this->event->getPaymentMethod());
    }

}
