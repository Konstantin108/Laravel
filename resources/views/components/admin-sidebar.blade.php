<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Базовые категории</div>
                <a class="nav-link collapsed" href="{{route('admin.user.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Пользователи
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="{{ route('admin.category.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Категории
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="{{ route('admin.news.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Новости
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="{{ route('admin.news.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Добавить новость
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="{{ route('admin.category.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Добавить категорию
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <a class="nav-link collapsed" href="{{ route('admin.unloading.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas phpdebugbar-fa-address-book"></i></div>
                    Заказать выгрузку
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            @if(Auth::user()->avatar)
                <img src="{{ Auth::user()->avatar }}" alt="avatar">
            @endif
            <div class="small">Выполнен вход:</div>
            {{Auth::user()->name}}
            <br><br>
        </div>
    </nav>
</div>
