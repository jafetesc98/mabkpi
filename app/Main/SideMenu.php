<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'inicio' => [
                'icon' => 'home',
                'route_name' => 'dashboard-overview-4',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'todos'
                ],
                'title' => 'Inicio'
            ],

            'margen' => [
                'icon' => 'percent',
                'route_name' => 'margen',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'direccion'
                ],
                'title' => 'Margen menor a 4%'
            ],
            'diferencia' => [
                'icon' => 'download',
                'route_name' => 'diferencia',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'direccion'
                ],
                'title' => 'Ultimas entradas'
            ],
            'botonesCapas' => [
                'icon' => 'hard-drive',
                'route_name' => 'botonesCapas',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'direccion'
                ],
                'title' => 'Menu de Capas'
            ],
            'presupuesto' => [
                'icon' => 'dollar-sign',
                'route_name' => 'presupuesto',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'todos'
                ],
                'title' => 'Presupuesto'
            ],
            'ventas' => [
                'icon' => 'file-text',
                'route_name' => 'ventas',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'todos'
                ],
                'title' => 'Ventas'
            ],
            'avance' => [
                'icon' => 'signal',
                'route_name' => 'avance',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'direccion'
                ],
                'title' => 'Avance X sucursal'
            ],
            /*icon-signal
            'file-manager' => [
                'icon' => 'hard-drive',
                'route_name' => 'file-manager',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'File Manager'
            ],
            'point-of-sale' => [
                'icon' => 'credit-card',
                'route_name' => 'point-of-sale',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Point of Sale'
            ],
            'chat' => [
                'icon' => 'message-square',
                'route_name' => 'chat',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Chat'
            ],
            'post' => [
                'icon' => 'file-text',
                'route_name' => 'post',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Post'
            ],*/
        ];
    }
}
