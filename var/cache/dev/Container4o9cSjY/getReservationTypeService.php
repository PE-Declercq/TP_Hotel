<?php

namespace Container4o9cSjY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getReservationTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\ReservationType' shared autowired service.
     *
     * @return \App\Form\ReservationType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/ReservationType.php';

        return $container->privates['App\\Form\\ReservationType'] = new \App\Form\ReservationType();
    }
}