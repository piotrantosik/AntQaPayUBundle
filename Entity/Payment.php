<?php

namespace AntQa\Bundle\PayUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AntQa\Bundle\PayUBundle\Model\Payment as PaymentModel;

/**
 * Class Payment
 *
 * @ORM\Entity()
 * @ORM\Table(name="payment")
 */
class Payment extends PaymentModel
{
}
