<!-- BEGIN: Mobile Menu  aqui se van hacer cambios-->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.png') }}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <ul class="border-t border-white/[0.08] py-5 hidden">
        @foreach ($side_menu as $menuKey => $menu)
           <!--  @if ($menu == 'devider')
                <li class="menu__devider my-6"></li>
            @else -->
            @if ($menu['params']['permiso']=="direccion" && Auth::user()->puesto =="DIRECCION")
                <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}&nombre= {{Auth::user()->nombre_lar}}" class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}">
                        <div class="menu__icon">
                            <i data-lucide="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <i data-lucide="chevron-down" class="menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}"></i>
                            @endif
                        </div>
                    </a>
                    
                </li>
                @endif
                @if ($menu['params']['permiso']=="todos")
                <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}&nombre= {{Auth::user()->nombre_lar}}" class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}">
                        <div class="menu__icon">
                            <i data-lucide="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <i data-lucide="chevron-down" class="menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}"></i>
                            @endif
                        </div>
                    </a>
                </li>
                @endif 
                <?php if (  Auth::user()->puesto =="SUBOPERACI" || Auth::user()->puesto =="DIRECCION" || Auth::user()->puesto =="SOPERACION"): ?>
                    @if ($menu['params']['permiso']=="soperacion" )
                    <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}&nombre= {{Auth::user()->nombre_lar}}" class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}">
                        <div class="menu__icon">
                            <i data-lucide="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <i data-lucide="chevron-down" class="menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}"></i>
                            @endif
                        </div>
                    </a>
                </li>
                @endif
                <?php endif; ?>   
                <?php if (  Auth::user()->puesto =="SUBOPERACI" || Auth::user()->puesto =="OPERACION" ): ?>
                    @if ($menu['params']['permiso']=="operacion")
                    <li>
                    <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}" class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}">
                        <div class="menu__icon">
                            <i data-lucide="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <i data-lucide="chevron-down" class="menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}"></i>
                            @endif
                        </div>
                    </a>
                </li>
                @endif
                <?php endif; ?>   
            @endif
        @endforeach
    </ul>
</div>
<!-- END: Mobile Menu -->
