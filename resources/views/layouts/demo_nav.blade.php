<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <!-- Логотип -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('demo.welcome') }}">
            <i class="fas fa-rocket me-2"></i>
            <span class="fw-bold">MyCRM</span>
            <span class="badge bg-warning ms-2">ДЕМО</span>
        </a>

        <!-- Мобильное меню -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#demoNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Основное меню -->
        <div class="collapse navbar-collapse" id="demoNav">
            <ul class="navbar-nav me-auto">
                <!-- Дашборд -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demo.dashboard.index') }}">
                        <i class="fas fa-tachometer-alt"></i> Дашборд
                    </a>
                </li>

                <!-- Сделки (простой пункт без dropdown) -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demo.deals.index') }}">
                        <i class="fas fa-briefcase"></i> Сделки
                    </a>
                </li>

                <!-- Компании -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demo.companies.index') }}">
                        <i class="fas fa-building"></i> Компании
                    </a>
                </li>

                <!-- Контакты -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demo.contacts.index') }}">
                        <i class="fas fa-users"></i> Контакты
                    </a>
                </li>

                <!-- Задачи -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demo.tasks.index') }}">
                        <i class="fas fa-tasks"></i> Задачи
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('demo.users.show', Auth()->id()) /*?? User::where('email', 'demo@demo.ru')->first()*/ }}">
                        <i class="fas fa-tasks"></i> Настройки
                    </a>
                </li>
            </ul>

            <!-- Правая часть -->
            <ul class="navbar-nav">
                <!-- Кнопка "Создать" (заблокирована) -->
                <li class="nav-item">
                    <button class="nav-link btn btn-outline-light btn-sm me-2"
                            onclick="showDemoFeature('create')">
                        <i class="fas fa-plus"></i> Создать
                    </button>
                </li>

                <!-- Профиль -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        <span class="d-none d-md-inline">Демо</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <div class="dropdown-item-text">
                                <div class="fw-bold">Демо Пользователь</div>
                                <small class="text-muted">demo@demo.ru</small>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('demo.users.show', Auth()->id()) }}">
                                <i class="fas fa-cog me-2"></i> Профиль
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://crm.valsy.ru" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i> Полная версия
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('demo.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Выйти
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-dark.bg-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .nav-link {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        margin: 0 2px;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 991.98px) {
        .nav-link {
            margin: 2px 0;
        }
    }
</style>
