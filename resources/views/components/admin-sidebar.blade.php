<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Базовые категории</div>
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
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Выполнен вход:</div>
            Тут будет имя пользователя
            <br><br>
        </div>
    </nav>
</div>
