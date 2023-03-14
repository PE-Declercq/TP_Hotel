<?php

namespace ContainerFTSMvcG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_PavQm9BService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.PavQm9B' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.PavQm9B'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'hotelsRepo' => ['privates', 'App\\Repository\\HotelsRepository', 'getHotelsRepositoryService', true],
            'reservationsRepo' => ['privates', 'App\\Repository\\ReservationRepository', 'getReservationRepositoryService', true],
            'suiteRepo' => ['privates', 'App\\Repository\\SuiteRepository', 'getSuiteRepositoryService', true],
        ], [
            'hotelsRepo' => 'App\\Repository\\HotelsRepository',
            'reservationsRepo' => 'App\\Repository\\ReservationRepository',
            'suiteRepo' => 'App\\Repository\\SuiteRepository',
        ]);
    }
}
