<?php

namespace AntQa\Bundle\PayUBundle\Tests\Model;

use AntQa\Bundle\PayUBundle\Model\Payment;
use Symfony\Component\Security\Core\User\User;

class PaymentTest extends \PHPUnit_Framework_TestCase
{
    public function testStatus()
    {
        $payment = $this->getPayment();
        $this->assertEquals(Payment::STATUS_NEW, $payment->getStatus());

        $payment->setStatus(Payment::STATUS_PENDING);
        $this->assertEquals(Payment::STATUS_PENDING, $payment->getStatus());
    }

    public function testOrderId()
    {
        $payment = $this->getPayment();
        $this->assertNull($payment->getOrderId());

        $payment->setOrderId('order_id');
        $this->assertEquals('order_id', $payment->getOrderId());
    }

    public function testId()
    {
        $payment = $this->getPayment();
        $this->assertNull($payment->getId());

        $payment->setId(1);
        $this->assertEquals(1, $payment->getId());
    }

    public function testCreatedAt()
    {
        $payment = $this->getPayment();
        $this->assertInstanceOf('DateTime', $payment->getCreatedAt());
    }

    public function testUser()
    {
        $payment = $this->getPayment();
        $this->assertNull($payment->getUser());

        $user = new User('username', 'password');
        $payment->setUser($user);
        $this->assertEquals($user, $payment->getUser());
    }

    /**
     * @return Payment
     */
    protected function getPayment()
    {
        return $this->getMockForAbstractClass('AntQa\Bundle\PayUBundle\Model\Payment');
    }
}
