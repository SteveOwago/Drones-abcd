<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<link href="{{ URL::asset('../../backend/css/main.css') }}" rel="stylesheet">
<aside class="app-sidebar">
    <div class="app-sidebar__user">

    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="#"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'site.pages.product' ? 'active' : '' }}"
                href="{{ route('product.show') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">products</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'site.pages.category' ? 'active' : '' }}"
                href="{{ route('category.show') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
