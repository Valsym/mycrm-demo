@extends('layouts.app')

@section('title', 'Сделки (Демо-версия)')

@section('content')
    <div class="container">
        <div class="alert alert-info mb-4">
            <h4><i class="fas fa-info-circle"></i> Демо-версия CRM</h4>
            <p>В демо-версии доступен базовый функционал. Полная версия включает:</p>
            <ul>
                <li>✅ Канбан-доску с Drag&Drop</li>
                <li>✅ Расширенную фильтрацию и поиск по связям</li>
                <li>✅ Автоматические уведомления в Telegram</li>
                <li>✅ Экспорт отчетов в PDF</li>
                <li>✅ Интерактивные графики на дашборде</li>
                <li>✅ OAuth авторизацию</li>
            </ul>
            <p class="mb-0"><strong>Для доступа к полной версии:</strong> свяжитесь со мной.</p>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Сделки (базовый просмотр)</h2>
            </div>
            <div class="card-body">

                <!-- Простая форма поиска -->
                <form method="GET" action="{{ route('demo.deals.index') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Поиск по названию сделки..."
                                   value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Найти
                            </button>

                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('demo.deals.index') }}" class="btn btn-secondary w-100">
                                <i class="fas fa-times"></i> Сбросить
                            </a>
                        </div>

                    </div>
                </form>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <!-- Сохранить в PDF (заблокирована) -->
                        <button class="btn btn-outline-primary"
                                onclick="showDemoFeature('pdf')"
                                title="Доступно в полной версии">
                            <i class="fas fa-plus"></i> Экспорт PDF
                        </button>
                    </div>
                    </div>

                <!-- Простая таблица вместо канбана -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Компания</th>
                            <th>Менеджер</th>
                            <th>Сумма</th>
                            <th>Дата создания</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($deals as $deal)
                            <tr>
                                <td>
                                    <a href="{{ route('demo.deals.show', $deal) }}">
                                        {{ $deal->name }}
                                    </a>
                                </td>
                                <td>{{ $deal->company->name ?? '-' }}</td>
                                <td>{{ $deal->owner->name ?? '-' }}</td>
                                <td>{{ asCurrency($deal->budget_amount) }}</td>
                                <td>{{ $deal->created_at->format('d.m.Y') }}</td>
                                <td>
                                <span class="badge text-white bg-{{ $deal->status->color ?? 'secondary' }}">
                                    {{ $deal->status->name ?? '-' }}
                                </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Нет сделок</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $deals->links('vendor.pagination.simple') }}
                {{-- $deals->links() --}}

                <!-- Простая статистика -->
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $totalDeals }}</h5>
                                <p class="card-text">Всего сделок</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ asCurrency($totalAmount) }}</h5>
                                <p class="card-text">Общая сумма</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $dealStatuses->count() }}</h5>
                                <p class="card-text">Статусов сделок</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок "Полная версия" -->
        <div class="card mt-4 border-warning">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="fas fa-crown"></i> Полная версия CRM</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Канбан-доска (Drag&Drop)</h5>
                        <div class="text-center my-3">
                            <img src="/img/kanban-board.jpg"
                                 class="img-fluid rounded border"
                                 alt="Канбан-доска">
                        </div>
                        <p class="text-muted">
                            В полной версии реализована интерактивная канбан-доска с перетаскиванием сделок между статусами.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5>Расширенная фильтрация</h5>
                        <div class="text-center my-3">
                            <img src="/img/kanban-screenshot.png"
                                 class="img-fluid rounded border"
                                 alt="Фильтры">
                        </div>
                        <p class="text-muted">
                            Фильтрация по менеджеру, исполнителю, компании, сумме и датам с сохранением в PDF.
                        </p>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-lg btn-success"
                            onclick="alert('Для получения доступа к полной версии CRM свяжитесь со мной через контакты в резюме или на сайте.')">
                        <i class="fas fa-unlock"></i> Запросить доступ к полной версии
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно для демо-функций -->
    @include('demo.modals.demo_feature');
@endsection
