@extends('layouts.app')

@section('title', 'Контакты (Демо)')

@section('content')
    <div class="container">
        <!-- Включаем общий баннер -->
        @include('demo.partials.demo_banner', [
            'demoDescription' => 'В демо-версии показаны только последние 10 контактов.',
            'fullVersionUrl' => 'https://crm.valsy.ru'
        ])
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <i class="fas fa-building"></i> Контакты
                        <span class="badge text-white bg-secondary">Демо (показано {{ $contacts->count() }})</span>
                    </h2>
                    <!-- Простой поиск -->
                    <button class="btn btn-outline-primary"
                            onclick="showDemoFeature('filter')"
                            title="Доступно в полной версии">
                        <i class="fas fa-plus"></i> Найти
                    </button>

                    <button class="btn btn-outline-primary"
                            onclick="showDemoFeature('create')"
                            title="Доступно в полной версии">
                        <i class="fas fa-plus"></i> Добавить контакт
                    </button>


                </div>
            </div>

            <div class="card-body">
                @if($contacts->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4>Нет компаний для отображения</h4>
                        <p class="text-muted">В демо-версии данные ограничены</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Должность</th>
                                <th>Компания</th>
                                <th>Тип</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>
                                        <strong>{{ $contact->name }}</strong>
                                        @if($contact->url)
                                            <br>
                                            <small class="text-muted">{{ $contact->url }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $contact->email ?? '-' }}</td>
                                    <td>{{ $contact->phone ?? '-' }}</td>
                                    <td>{{ $contact->position ?? '-' }}</td>
                                    <td>{{ $contact->company->name ?? '-' }}</td>
                                    <td>{{ $contact->status->name ?? '-' }}</td>
                                    <td>

                                        <button class="btn btn-outline-primary"
                                                onclick="showDemoFeature('edit')"
                                                title="Доступно в полной версии">
                                            <i class="fas fa-plus"></i> Редактировать
                                        </button>
                                        <button class="btn btn-outline-primary"
                                                onclick="showDemoFeature('delete')"
                                                title="Доступно в полной версии">
                                            <i class="fas fa-plus"></i> Удалить
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Блок с информацией о полной версии -->
        @include('demo.partials.full_version_info');

        <!-- Модальное окно для демо-функций -->
        @include('demo.modals.demo_feature');

@endsection
