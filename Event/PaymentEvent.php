<?php

namespace AntQa\Bundle\PayUBundle\Event;

use AntQa\Bundle\PayUBundle\Model\Payment;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class PaymentEvent
 *
 * @author Piotr Antosik <mail@piotrantosik.com>
 */
class PaymentEvent extends Event
{
    protected $payment;

    /**
     * Constructor.
     *
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }
}
