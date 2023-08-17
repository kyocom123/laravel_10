<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/dashboard"
            target="_blank">
            <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Argon Dashboard 2 Laravel</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @isset($menus)
                @foreach($menus as $menu_item)
                    @if($menu_item['children'])
                        <?php 
                            $router = explode('.', Route::currentRouteName())[0];
                            $controller = [];
                            $child_menu = '';
                            foreach($menu_item['children'] as $children) {
                                $url = explode('.', $children['link']);
                                array_push($controller, $url[0]);
                                $active = $router == $url[0] ? 'active' : '';
                                $child_menu .= '<li class="nav-item">';
                                $child_menu .= '<a class="nav-link '.$active.'" href="'.route($children['link']).'">';
                                $child_menu .= '<span class="sidenav-normal"> '.$children['name'].' </span>';
                                $child_menu .= '</a></li>';    
                            }
                        ?>
                        
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="{{ "#nav_item_".$menu_item['id'] }}" class="nav-link {{ in_array($router, $controller) ? 'active' : 'collapsed' }}" aria-controls="{{ 'nav_item_'.$menu_item['id'] }}" role="button" aria-expanded="true">
                                <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                    <i class="fa {{ $menu_item['icon'] }} text-info text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">{{ $menu_item['name'] }}</span>
                            </a>
                            <div class="collapse {{ in_array($router, $controller) ? 'show' : '' }}" id="{{ 'nav_item_'.$menu_item['id'] }}" style="">
                                <ul class="nav ms-4">
                                    {!! $child_menu !!}
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == $menu_item['link'] ? 'active' : '' }}" href="{{ route($menu_item['link']) }}">
                                <div
                                    class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                    <i class="fa {{ $menu_item['icon'] }} text-info text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">{{ $menu_item['name'] }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endisset
        </ul>
    </div>
</aside>
