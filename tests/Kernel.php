<?php

namespace Cesurapp\AcmeBundle\Tests;

use Cesurapp\AcmeBundle\AcmeBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

/**
 * Create App Test Kernel.
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new AcmeBundle(),
            /* new DoctrineBundle() */
        ];
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        // Framework Configuration
        $container->extension('framework', [
            'test' => true,
        ]);

        // Doctrine Bundle Default Configuration
        $container->extension('doctrine', [
            'dbal' => [
                'default_connection' => 'default',
                'url' => 'sqlite:///%kernel.project_dir%/var/database.sqlite',
            ],
            'orm' => [
                'auto_generate_proxy_classes' => false,
                'enable_lazy_ghost_objects' => true,
                'report_fields_where_declared' => true,
                'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
                'auto_mapping' => true,
                'mappings' => [
                    'App' => [
                        'is_bundle' => false,
                        'dir' => __DIR__.'/_App/Entity',
                        'prefix' => 'Cesurapp\ApiBundle\Tests\_App\Entity',
                        'alias' => 'Cesurapp\ApiBundle\Tests',
                        'type' => 'attribute',
                    ],
                ],
            ],
        ]);

        // Acme Bundle Default Configuration
        /* $container->extension('acme', []); */

        // Services
        /*$services = $container->services()->defaults()->autowire()->autoconfigure();
        $services->load('Cesurapp\\AcmeBundle\\Tests\\_App\\Repository\\', '_App/Repository');*/
    }

    /*protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->add('home', '/')->controller([$this, 'helloAction']);
        $routes->import('_App/Controller', 'attribute');
    }*/
}
