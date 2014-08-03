<?php

namespace AntQa\Bundle\PayUBundle;

/**
 * Class AntQaPaymentEvents
 *
 * @author Piotr Antosik <mail@piotrantosik.com>
 */
final class AntQaPaymentEvents
{
    const PAYMENT_STATUS_UPDATE = 'payu.payment_status_update';
    const PAYMENT_COMPLETED = 'payu.payment_completed';
    const PAYMENT_CANCELED = 'payu.payment_canceled';
}
