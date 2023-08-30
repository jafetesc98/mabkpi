<?php

namespace App\Main;

class SimpleMenu
{
    /**
     * List of simple menu items.
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
                'layout' => 'side-menu'
            ],
            'title' => 'Inicio'
        ],

        'margen' => [
            'icon' => 'inbox',
            'route_name' => 'margen',
            'params' => [
                'layout' => 'side-menu'
            ],
            'title' => 'Margen menor a 4%'
        ],
        'diferencia' => [
            'icon' => 'hard-drive',
            'route_name' => 'diferencia',
            'params' => [
                'layout' => 'side-menu'
            ],
            'title' => 'Ultimas entradas'
        ],
        'capas' => [
            'icon' => 'hard-drive',
            'route_name' => 'capas',
            'params' => [
                'layout' => 'side-menu'
            ],
            'title' => 'Reporte de Capas'
        ],
    ];
    }
            
}
