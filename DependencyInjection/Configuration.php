<?php

namespace AntQa\Bundle\PayUBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('payu_bundle');

        $rootNode
            ->children()
                ->scalarNode('pos_id')->isRequired()->end()
                ->scalarNode('pos_signature_key')->isRequired()->end()
                ->scalarNode('pos_env')->isRequired()->end()
                ->scalarNode('payment_class')->isRequired()->end()
            ->end();

        return $treeBuilder;
    }
}
