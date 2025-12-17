{{-- resources/views/demo/deals/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Сделка: ' . $deal->name)

@section('content')
    <div class="container">
        <!-- Демо-баннер -->
        <div class="alert alert-info mb-4">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h4 class="alert-heading mb-1">
                        <i class="fas fa-info-circle"></i> Демо-версия
                    </h4>
                    <p class="mb-0">Это упрощенная версия страницы сделки.
                        <a href="{{ route('demo.deals.full_version', $deal) }}" class="alert-link">
                            Посмотреть полную версию со всеми функциями
                        </a></p>
                </div>
                <a href="https://crm.valsy.ru/deals/{{ $deal->id }}"
                   target="_blank"
                   class="btn btn-success btn-lg">
                    <i class="fas fa-external-link-alt"></i> Открыть полную версию
                </a>
            </div>
        </div>

        <!-- Основная информация о сделке -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">{{ $deal->name }}</h2>
                <div>
                <span class="badge text-white bg-{{ $deal->status->color ?? 'secondary' }} fs-6">
                    {{ $deal->status->name }}
                </span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Компания:</th>
                                <td>{{ $deal->company->name ?? 'Не указана' }}</td>
                            </tr>
                            <tr>
                                <th>Контакт:</th>
                                <td>{{ $deal->contact->name ?? 'Не указан' }}</td>
                            </tr>
                            <tr>
                                <th>Менеджер:</th>
                                <td>{{ $deal->owner->name ?? 'Не назначен' }}</td>
                            </tr>
                            <tr>
                                <th>Исполнитель:</th>
                                <td>{{ $deal->executor->name ?? 'Не назначен' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Бюджет:</th>
                                <td class="h5 text-success">
                                    {{ asCurrency($deal->budget_amount) }}
                                </td>
                            </tr>
                            <tr>
                                <th>Дата создания:</th>
                                <td>{{ $deal->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Срок выполнения:</th>
                                <td>
                                    @if($deal->due_date)
                                        <span class="{{ $deal->due_date->isPast() ? 'text-danger' : '' }}">
                                        {{ $deal->due_date->format('d.m.Y') }}
                                    </span>
                                    @else
                                        Не указан
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Приоритет:</th>
                                <td>
                                <span class="badge bg-{{ $deal->priority_color }}">
                                    {{ $deal->priority_label }}
                                </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($deal->description)
                    <div class="mt-4">
                        <h5>Описание:</h5>
                        <div class="border rounded p-3 bg-light">
                            {{ $deal->description }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Заблокированные функции с объяснением -->
        <div class="row">
            <!-- Переключение статусов -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-secondary">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-exchange-alt"></i> Изменение статуса
                    </div>
                    <div class="card-body text-center">
                        <div class="demo-feature-block">
                            <div class="demo-feature-icon mb-3">
                                <i class="fas fa-lock fa-2x text-muted"></i>
                            </div>
                            <p class="text-muted">В полной версии вы можете мгновенно менять статус сделки кнопками:</p>

                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-secondary" disabled>
                                    ← «Предыдущий статус»
                                </button>
                                <button class="btn btn-outline-secondary" disabled>
                                    «Следующий статус» →
                                </button>
                            </div>

                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Автоматически отправляются уведомления при изменении статуса
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Управление задачами -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-secondary">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-tasks"></i> Задачи
                    </div>
                    <div class="card-body">
                        <div class="demo-feature-block">
                            <div class="demo-feature-icon mb-3">
                                <i class="fas fa-lock fa-2x text-muted"></i>
                            </div>
                            <p class="text-muted mb-3">В полной версии доступно:</p>
                            <ul class="text-muted small">
                                <li>Создание задач к сделке</li>
                                <li>Назначение ответственных</li>
                                <li>Установка сроков выполнения</li>
                                <li>Отметка о выполнении</li>
                                <li>Уведомления о просрочке</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Комментарии и история -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-secondary">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-history"></i> История изменений
                    </div>
                    <div class="card-body">
                        <div class="demo-feature-block">
                            <div class="demo-feature-icon mb-3">
                                <i class="fas fa-lock fa-2x text-muted"></i>
                            </div>
                            <p class="text-muted mb-3">В полной версии доступно:</p>
                            <ul class="text-muted small">
                                <li>Автоматическое логирование всех изменений</li>
                                <li>Комментарии к сделке</li>
                                <li>Прикрепление файлов</li>
                                <li>Уведомления участников</li>
                                <li>Восстановление предыдущих версий</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Скриншоты полной версии -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-images"></i> Как выглядит полная версия
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="border rounded overflow-hidden">
                            <img src=""
                                 class="img-fluid"
                                 alt="Полная версия карточки сделки">
                            <div class="p-3 bg-light">
                                <h6>Полная карточка сделки</h6>
                                <p class="small text-muted mb-0">Редактирование, задачи, участники, история</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="border rounded overflow-hidden">
                            <img src=""
                                 class="img-fluid"
                                 alt="Изменение статуса">
                            <div class="p-3 bg-light">
                                <h6>Быстрое изменение статуса</h6>
                                <p class="small text-muted mb-0">Кнопки для мгновенного перехода между статусами</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Призыв к действию -->
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    <i class="fas fa-rocket"></i> Хотите увидеть все возможности?
                </h4>
            </div>
            <div class="card-body text-center">
                <div class="py-4">
                    <h3 class="mb-4">Полная версия CRM включает более 50 функций!</h3>

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="feature-item">
                                <div class="feature-icon mb-2">
                                    <i class="fas fa-bolt fa-2x text-primary"></i>
                                </div>
                                <h5>Мгновенные уведомления</h5>
                                <p class="text-muted">Telegram, Email, Web-push</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="feature-item">
                                <div class="feature-icon mb-2">
                                    <i class="fas fa-chart-line fa-2x text-primary"></i>
                                </div>
                                <h5>Расширенная аналитика</h5>
                                <p class="text-muted">Графики, отчеты, прогнозы</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="feature-item">
                                <div class="feature-icon mb-2">
                                    <i class="fas fa-file-pdf fa-2x text-primary"></i>
                                </div>
                                <h5>Экспорт в PDF/Excel</h5>
                                <p class="text-muted">Профессиональные отчеты</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <a href="https://crm.valsy.ru/deals/{{ $deal->id }}"
                           target="_blank"
                           class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-external-link-alt"></i> Открыть полную версию
                        </a>
                        <a href="{{ route('demo.deals.full_version', $deal) }}"
                           class="btn btn-outline-primary btn-lg px-5">
                            <i class="fas fa-play-circle"></i> Видео-демонстрация
                        </a>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted">
                            <small>
                                <i class="fas fa-info-circle"></i> Логин для тестирования:
                                <code>demo@demo.ru</code> / пароль: <code>demo</code>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Навигация -->
        <div class="mt-4">
            <a href="{{ route('demo.deals.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Назад к списку сделок
            </a>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .demo-feature-block {
            padding: 1rem;
            text-align: center;
        }

        .demo-feature-icon {
            color: #6c757d;
        }

        .feature-item {
            padding: 1rem;
            border-radius: 8px;
            background: #f8f9fa;
            height: 100%;
        }

        .feature-icon {
            color: #0d6efd;
        }

        .alert a.alert-link {
            color: #055160;
            text-decoration: underline;
            font-weight: 600;
        }

        .table th {
            font-weight: 600;
            color: #495057;
        }
    </style>
@endpush
