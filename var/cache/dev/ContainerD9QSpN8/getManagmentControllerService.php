<?php

namespace ContainerD9QSpN8;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getManagmentControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ManagmentController' shared autowired service.
     *
     * @return \App\Controller\ManagmentController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ManagmentController.php';

        $container->services['App\\Controller\\ManagmentController'] = $instance = new \App\Controller\ManagmentController(($container->privates['security.helper'] ?? $container->load('getSecurity_HelperService')), ($container->privates['security.authorization_checker'] ?? $container->getSecurity_AuthorizationCheckerService()));

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\ManagmentController', $container));

        return $instance;
    }
}
