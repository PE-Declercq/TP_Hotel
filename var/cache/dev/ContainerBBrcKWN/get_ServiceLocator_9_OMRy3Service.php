<?php

namespace ContainerBBrcKWN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_9_OMRy3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.9.OMRy3' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.9.OMRy3'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'hotelsRepo' => ['privates', 'App\\Repository\\HotelsRepository', 'getHotelsRepositoryService', true],
        ], [
            'hotelsRepo' => 'App\\Repository\\HotelsRepository',
        ]);
    }
}
