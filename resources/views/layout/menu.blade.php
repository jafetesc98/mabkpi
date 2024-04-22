        <!-- BEGIN: Simple Menu aqui se modifico para el menu-->

        <nav class="side-nav side-nav--simple">
            <ul>
                @foreach ($side_menu as $menuKey => $menu)
                    <!-- @if ($menu == 'devider')
                        <li class="side-nav__devider my-6"></li>
                    @else -->
                    @if ($menu['params']['permiso']=="direccion" && Auth::user()->puesto =="DIRECCION")
                        <li>
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}&nombre= {{Auth::user()->nombre_lar}}" class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-lucide="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <div class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                            <i data-lucide="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endif
                        <?php if (  Auth::user()->puesto !="VENTAS" ): ?>
                        @if ($menu['params']['permiso']=="todos" )
                        <li>
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']): 'javascript:;' }}" class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-lucide="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <div class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                            <i data-lucide="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endif
                        <?php endif; ?>

                        <?php if (  Auth::user()->puesto =="SUBOPERACI" || Auth::user()->puesto =="DIRECCION" || Auth::user()->puesto =="SOPERACION"): ?>
                         @if ($menu['params']['permiso']=="soperacion" )
                        <li>
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}&nombre= {{Auth::user()->nombre_lar}}" class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-lucide="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <div class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                            <i data-lucide="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                    @endif 
                    <?php endif; ?>   

                    <?php if (  Auth::user()->puesto =="SUBOPERACI" || Auth::user()->puesto =="OPERACION" ): ?>
                    @if ($menu['params']['permiso']=="operacion")
                        <li>
                            <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params']) : 'javascript:;' }}&nombre= {{Auth::user()->nombre_lar}}" class="{{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-lucide="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <div class="side-menu__sub-icon {{ $first_level_active_index == $menuKey ? 'transform rotate-180' : '' }}">
                                            <i data-lucide="chevron-down"></i>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                    @endif 
                    <?php endif; ?>   
                    <!-- @endif -->
                @endforeach
            </ul>
        </nav>
        <!-- END: Simple Menu -->