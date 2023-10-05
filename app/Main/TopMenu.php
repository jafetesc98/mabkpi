<?php

namespace App\Main;

class TopMenu
{
    /**
     * List of top menu items.
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
                'icon' => 'inbox',
                'route_name' => 'margen',
                'params' => [
                    'layout' => 'side-menu',
                    'permiso' => 'direccion'
                ],
                'title' => 'Margen menor a 4%'
            ],
            'diferencia' => [
                'icon' => 'hard-drive',
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
                'title' => 'Presupuesto',
                
            ],
        ];
    }
}
