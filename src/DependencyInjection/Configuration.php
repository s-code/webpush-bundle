<?php

namespace BenTools\WebPushBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('bentools_webpush');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('doctrine_migrations', 'array');
        }

        $rootNode
            ->children()

                ->arrayNode('settings')
                    ->children()
                        ->scalarNode('subject')
                        ->end()
                        ->scalarNode('public_key')
                        ->isRequired()
                        ->end()
                        ->scalarNode('private_key')
                        ->isRequired()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
