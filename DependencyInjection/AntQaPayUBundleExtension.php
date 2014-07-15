<?php

namespace AntQa\Bundle\PayUBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AntQaPayUBundleExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('payu_bundle.pos_env', $config['pos_env']);
        $container->setParameter('payu_bundle.pos_id', $config['pos_id']);
        $container->setParameter('payu_bundle.pos_signature_key', $config['pos_signature_key']);
        $container->setParameter('payu_bundle.payment_class', $config['payment_class']);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'payu_bundle';
    }
}
