AntQaPayUBundle
===========================
Integrate [openpayu_php](https://github.com/PayU/openpayu_php) in Symfony App

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

Update config.yml / parameters.yml:

```yml
#config.yml

payu_bundle:
    pos_id: %payu_id%
    pos_signature_key: %payu_signature%
    pos_env: %payu_env% #secure or custom
    payment_class: "AntQa\Bundle\PaymentBundle\Entity\Payment"
```

```yml
#parameters.yml

    payu_id: 145227
    payu_signature: 13a980d4f851f3d9a1cfc792fb1f5e50
    pos_env: secure
```

Create order:

``` php
$order = [];
$order['continueUrl'] = $this->generateUrl('ant_qa_payu_thanks', [], true);
$order['notifyUrl'] = $this->generateUrl('ant_qa_payu_notify', [], true);
$order['customerIp'] = $request->getClientIp();
$order['description'] = 'Test payment';
$order['currencyCode'] = 'PLN';
$order['totalAmount'] = 1000;
$order['extOrderId'] = mt_rand(1000, 2000); //must be unique!

$order['products']['products'][0] = [
    'name' => 'Test product',
    'unitPrice' => 1000,
    'quantity' => 1
];

$order['products']['products'][1] = [
    'name' => 'Test product #2',
    'unitPrice' => 1000,
    'quantity' => 1
];

$order['buyer'] = [
    'email' => 'mail@localhost',
    'phone' => '123456789',
    'firstName' => 'Jan',
    'lastName' => 'Kowalski'
];

$response = $this->get('ant_qa.payu_bundle.controller.payment')->createOrder($order);

return $response;
```
