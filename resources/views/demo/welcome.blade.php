{{-- resources/views/demo/welcome.blade.php --}}
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Демо-версия CRM системы MyCRM">
    <title>MyCRM - Демо-версия</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .demo-hero {
            background: var(--primary-gradient);
            color: white;
            padding: 4rem 0;
            border-radius: 0 0 40px 40px;
            margin-bottom: 3rem;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--secondary-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 2rem;
        }

        .demo-login-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            border: 3px solid #667eea;
        }

        .demo-credentials {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            border-left: 5px solid #28a745;
        }

        .tech-badge {
            background: var(--secondary-gradient);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            margin: 0.3rem;
            display: inline-block;
            font-size: 0.9rem;
        }

        .btn-demo-primary {
            background: var(--primary-gradient);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-demo-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .btn-demo-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
        }

        .btn-demo-secondary:hover {
            background: #667eea;
            color: white;
        }

        .screenshot-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .screenshot-container:hover {
            transform: scale(1.02);
        }

        .demo-footer {
            background: #2d3748;
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }
    </style>
</head>
<body>
<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: var(--primary-gradient)">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-rocket me-2"></i> MyCRM
        </a>
        <span class="badge bg-warning">ДЕМО-ВЕРСИЯ</span>
    </div>
</nav>

<!-- Герой-секция -->
<section class="demo-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Профессиональная CRM система
                    <span class="text-warning"> MyCRM</span>
                </h1>
                <p class="lead mb-4">
                    Полная демо-версия системы управления клиентами на Laravel + Blade.
                    Протестируйте все возможности перед покупкой или наймом разработчика.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <span class="tech-badge"><i class="fas fa-bolt me-1"></i> Laravel 12</span>
                    <span class="tech-badge"><i class="fas fa-bolt me-1"></i> Blade</span>
                    <span class="tech-badge"><i class="fas fa-bolt me-1"></i> MySQL</span>
                    <span class="tech-badge"><i class="fas fa-bolt me-1"></i> Bootstrap</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="screenshot-container">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         class="img-fluid"
                         alt="Демо CRM системы">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Основной контент -->
<div class="container">
    <div class="row">
        <!-- Левая колонка - особенности -->
        <div class="col-lg-8">
            <h2 class="mb-4 fw-bold">
                <i class="fas fa-star text-warning me-2"></i>
                Что вы можете протестировать
            </h2>

            <div class="row">
                <!-- Фича 1 -->
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-columns"></i>
                        </div>
                        <h4>Канбан-доска</h4>
                        <p class="text-muted">
                            Интерактивная канбан-доска сделок с Drag&Drop функционалом.
                            Перетаскивайте сделки между статусами.
                        </p>
                    </div>
                </div>

                <!-- Фича 2 -->
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Аналитика и отчеты</h4>
                        <p class="text-muted">
                            Графики активности, финансовые отчеты, статистика по менеджерам.
                            Экспорт в PDF и Excel.
                        </p>
                    </div>
                </div>

                <!-- Фича 3 -->
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h4>Уведомления</h4>
                        <p class="text-muted">
                            Автоматические уведомления в Telegram и Email.
                            Напоминания о задачах и изменениях статусов.
                        </p>
                    </div>
                </div>

                <!-- Фича 4 -->
                <div class="col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h4>Управление задачами</h4>
                        <p class="text-muted">
                            Создание задач к сделкам, назначение исполнителей,
                            контроль сроков выполнения.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Скриншоты -->
            <h3 class="mt-5 mb-4 fw-bold">
                <i class="fas fa-images text-primary me-2"></i>
                Скриншоты системы
            </h3>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="screenshot-container">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             class="img-fluid"
                             alt="Дашборд">
                        <div class="p-3 bg-light">
                            <small class="text-muted">Интерактивный дашборд</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="screenshot-container">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             class="img-fluid"
                             alt="Канбан-доска">
                        <div class="p-3 bg-light">
                            <small class="text-muted">Канбан-доска сделок</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="screenshot-container">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             class="img-fluid"
                             alt="Аналитика">
                        <div class="p-3 bg-light">
                            <small class="text-muted">Финансовая аналитика</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Правая колонка - демо-вход -->
        <div class="col-lg-4">
            <div class="demo-login-card mt-lg-0 mt-4">
                <h3 class="text-center mb-4 fw-bold">
                    <i class="fas fa-door-open text-success me-2"></i>
                    Вход в демо-режим
                </h3>

                <p class="text-center text-muted mb-4">
                    Нажмите кнопку ниже для автоматического входа в демо-режим.
                    Все данные предзаполнены.
                </p>

                <div class="demo-credentials mb-4">
                    <h5 class="mb-3">
                        <i class="fas fa-key me-2"></i>Демо-учетные данные:
                    </h5>
                    <div class="mb-2">
                        <strong>Email:</strong>
                        <code class="bg-light p-1 rounded">demo@demo.ru</code>
                    </div>
                    <div>
                        <strong>Пароль:</strong>
                        <code class="bg-light p-1 rounded">demo</code>
                    </div>
                </div>

                <div class="text-center">
                    <form action="{{ route('demo.login') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-demo-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Войти в демо-режим
                        </button>
                    </form>

                    <p class="text-muted small mb-4">
                        <i class="fas fa-info-circle me-1"></i>
                        Вы получите полный доступ ко всем функциям системы на 2 часа
                    </p>

                    <hr class="my-4">

                    <h5 class="mb-3">Что дальше?</h5>
                    <ul class="text-start small">
                        <li class="mb-2">Исследуйте все модули CRM</li>
                        <li class="mb-2">Создавайте тестовые сделки и задачи</li>
                        <li class="mb-2">Протестируйте канбан-доску и отчеты</li>
                        <li>Оцените удобство интерфейса</li>
                    </ul>

                    <div class="alert alert-warning mt-4">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Внимание:</strong> Все изменения в демо-режиме будут сброшены через 2 часа
                    </div>
                </div>
            </div>

            <!-- Контакты -->
            <div class="card mt-4 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-code me-2"></i>О разработчике
                    </h5>
                    <p class="card-text small">
                        Полный исходный код проекта доступен по запросу.
                        Для связи по вопросам разработки:
                    </p>
                    <ul class="list-unstyled small">
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:webmaster@valsy.ru">webmaster@valsy.ru</a>
                        </li>
                        <li class="mb-2">
                            <i class="fab fa-telegram me-2"></i>
                            <a href="https://t.me/MyCRM_support" target="_blank">@MyCRM_support</a>
                        </li>
                        <li>
                            <i class="fab fa-github me-2"></i>
                            <a href="https://github.com/valsym" target="_blank">GitHub профиль</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Технологии -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4 fw-bold">
                <i class="fas fa-cogs me-2"></i>
                Используемые технологии
            </h3>
            <div class="text-center">
                @foreach(['Laravel 12', 'Blade', 'SortableJS', 'Bootstrap CSS', 'MySQL', 'Redis', 'Docker', 'Git'] as $tech)
                    <span class="tech-badge m-1">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Футер -->
<footer class="demo-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-3">
                    <i class="fas fa-rocket me-2"></i> MyCRM
                </h5>
                <p class="small">
                    Профессиональная CRM система для управления продажами и клиентами.
                    Разработано на современном стеке технологий.
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Ссылки</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="{{ route('demo.deals.index') }}" class="text-light">
                            <i class="fas fa-external-link-alt me-1"></i> Демо-версия сделок
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('demo.dashboard.index') }}" class="text-light">
                            <i class="fas fa-external-link-alt me-1"></i> Демо-дашборд
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Информация</h5>
                <p class="small">
                    Это демо-версия проекта. Полный исходный код и коммерческая версия доступны по запросу.
                </p>
            </div>
        </div>
        <hr class="my-4" style="border-color: rgba(255,255,255,0.1)">
        <div class="text-center small">
            &copy; {{ date('Y') }}  MyCRM Demo. Все права защищены.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Плавная прокрутка
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Анимация счетчиков (опционально)
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const increment = target / 200;
        let current = 0;

        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.innerText = Math.ceil(current);
                setTimeout(updateCounter, 10);
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });
</script>
</body>
</html>
