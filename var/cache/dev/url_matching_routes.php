<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/managment' => [[['_route' => 'app_managment', '_controller' => 'App\\Controller\\ManagmentController::index'], null, null, null, false, false, null]],
        '/managment/suite/create' => [[['_route' => 'app_create_suite_managment', '_controller' => 'App\\Controller\\ManagmentController::renderSuiteCreateForm'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/hotel/(?'
                    .'|([^/\\-]++)\\-([^/]++)(*:72)'
                    .'|re(?'
                        .'|servation/([^/]++)(*:102)'
                        .'|capitulatif/([^/]++)(*:130)'
                    .')'
                .')'
                .'|/managment/([^/\\-]++)\\-(?'
                    .'|reservation(?'
                        .'|s(*:181)'
                        .'|\\-update(*:197)'
                    .')'
                    .'|suite(*:211)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        72 => [[['_route' => 'app_hotel', '_controller' => 'App\\Controller\\HotelController::index'], ['id', 'slug'], null, null, false, true, null]],
        102 => [[['_route' => 'app_hotel_reservation', '_controller' => 'App\\Controller\\HotelController::renderReservationForm'], ['id'], null, null, false, true, null]],
        130 => [[['_route' => 'app_reservation_success', '_controller' => 'App\\Controller\\HotelController::reservationSuccess'], ['id'], null, null, false, true, null]],
        181 => [[['_route' => 'app_reservation_managment', '_controller' => 'App\\Controller\\ManagmentController::reservationsView'], ['id'], null, null, false, false, null]],
        197 => [[['_route' => 'app_reservation_update_managment', '_controller' => 'App\\Controller\\ManagmentController::renderUpdateReservation'], ['id'], null, null, false, false, null]],
        211 => [
            [['_route' => 'app_suite_managment', '_controller' => 'App\\Controller\\ManagmentController::renderSuiteUpdateForm'], ['id'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
