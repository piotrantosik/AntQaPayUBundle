<?php

namespace AntQa\Bundle\PayUBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author Piotr Antosik <mail@piotrantosik.com>
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
