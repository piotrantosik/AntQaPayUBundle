<?php

namespace AntQa\Bundle\PayUBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use AntQa\Bundle\PayUBundle\DependencyInjection\AntQaPayUBundleExtension;

/**
 * {@inheritDoc}
 *
 * @author Piotr Antosik <mail@piotrantosik.com>
 */
class AntQaPayUBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // register extensions that do not follow the conventions manually
        $container->registerExtension(new AntQaPayUBundleExtension());
    }
}
