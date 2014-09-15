<?php

namespace AntQa\Bundle\PayUBundle\Tests\Entity;

use AntQa\Bundle\PayUBundle\Entity\Payment;

class PaymentTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $payment = $this->getPayment();
        $this->assertInstanceOf('AntQa\Bundle\PayUBundle\Entity\Payment', $payment);
    }

    /**
     * @return Payment
     */
    protected function getPayment()
    {
        return $this->getMock('AntQa\Bundle\PayUBundle\Entity\Payment');
    }
}
