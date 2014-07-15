AntQaPayUBundle
===========================

Requirements
------------

PayU pos configuration:

    Type - checkout
    Automatic collection - on

Installation
------------

Add in composer.json:

    "piotrantosik/payu-bundle": "dev-master",
    "openpayu/openpayu": "dev-master"

Add routing:

    ant_qa_pay_u:
        resource: "@AntQaPayUBundle/Resources/config/routing.yml"
        prefix:   /payment


Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new AntQa\Bundle\PayUBundle\AntQaPayUBundle(),
    );
}
```

Create Payment entity:

```php
<?php

namespace Acme\Bundle\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AntQa\Bundle\PayUBundle\Model\Payment as PaymentModel;

/**
 * Class Payment
 *
 * @ORM\Entity()
 * @ORM\Table(name="sc_payment")
 */
class Payment extends PaymentModel
{

    /**
     * @ORM\ManyToOne(targetEntity="YourUserClass")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;
}

```

Create order:

``` php
$order = [];
$order['completeUrl'] = $this->generateUrl('ant_qa_payu_thanks', [], true);
$order['notifyUrl'] = $this->generateUrl('ant_qa_payu_notify', [], true);
$order['customerIp'] = $request->getClientIp();
$order['description'] = 'Test payment';
$order['currencyCode'] = 'PLN';
$order['totalAmount'] = 1000;
$order['extOrderId'] = mt_rand(1000, 2000);

$order['products']['products'][0]['name'] = 'Test product';
$order['products']['products'][0]['unitPrice'] = 1000;
$order['products']['products'][0]['quantity'] = 1;

$order['buyer']['email'] = 'mail@localhost';
$order['buyer']['phone'] = '123456789';
$order['buyer']['firstName'] = 'Jan';
$order['buyer']['lastName'] = 'Kowalski';
$response = $this->get('ant_qa.payu_bundle.controller.payment')->createOrder($order);

return $response;
```
