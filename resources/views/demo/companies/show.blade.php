{{-- resources/views/demo/companies/show.blade.php --}}
@extends('layouts.app')

@section('title', $company->name . ' (Демо)')

@section('content')
    <div class="container">
        <!-- Демо-баннер -->
        <div class="alert alert-info mb-4">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h4 class="alert-heading mb-1">
                        <i class="fas fa-info-circle"></i> Демо-версия карточки компании
                    </h4>
                    <p class="mb-0">В полной версии доступны: история взаимодействий, файлы, задачи, полная аналитика</p>
                </div>
                <a href="https://crm.valsy.ru/companies/{{ $company->id }}"
                   target="_blank"
                   class="btn btn-success">
                    <i class="fas fa-external-link-alt"></i> Открыть полную версию
                </a>
            </div>
        </div>

        <!-- Основная информация -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">
                    <i class="fas fa-building"></i> {{ $company->name }}
                </h2>
                <div>
                    <button class="btn btn-outline-secondary"
                            onclick="showDemoFeature('edit')"
                            title="Доступно в полной версии">
                        <i class="fas fa-edit"></i> Редактировать
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Телефон:</th>
                                <td>{{ $company->phone ?? 'Не указан' }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $company->email ?? 'Не указан' }}</td>
                            </tr>
                            <tr>
                                <th>Сайт:</th>
                                <td>
                                    @if($company->url)
                                        <a href="{{ $company->url }}" target="_blank">{{ $company->url }}</a>
                                    @else
                                        Не указан
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Адрес:</th>
                                <td>{{ $company->address ?? 'Не указан' }}</td>
                            </tr>
                            <tr>
                                <th>ИНН:</th>
                                <td>{{ $company->inn ?? 'Не указан' }}</td>
                            </tr>
                            <tr>
                                <th>Дата создания:</th>
                                <td>{{ $company->created_at->format('d.m.Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($company->description)
                    <div class="mt-4">
                        <h5>Описание:</h5>
                        <div class="border rounded p-3 bg-light">
                            {{ $company->description }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Контакты компании -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-users"></i> Контакты компании
                    <span class="badge text-white bg-secondary ms-2">Демо (показано не более 3)</span>
                </h5>
            </div>
            <div class="card-body">
                @if($company->contacts->count() > 0)
                    <div class="row">
                        @foreach($company->contacts->take(3) as $contact)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $contact->name }}</h6>
                                        <p class="card-text small">
                                        @if($contact->position)
                                            <div><strong>Должность:</strong> {{ $contact->position }}</div>
                                        @endif
                                        @if($contact->phone)
                                            <div><strong>Телефон:</strong> {{ $contact->phone }}</div>
                                        @endif
                                        @if($contact->email)
                                            <div><strong>Email:</strong> {{ $contact->email }}</div>
                                            @endif
                                            </p>
                                            <a href="{{ route('demo.contacts.show', $contact) }}"
                                               class="btn btn-sm btn-outline-primary">
                                                Подробнее
                                            </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($company->contacts->count() > 3)
                        <div class="text-center mt-3">
                            <button class="btn btn-outline-secondary"
                                    onclick="showDemoFeature('view_all')">
                                <i class="fas fa-eye"></i> Показать все контакты ({{ $company->contacts->count() }})
                                <small class="d-block text-muted">Доступно в полной версии</small>
                            </button>
                        </div>
                    @endif
                @else
                    <p class="text-muted text-center">Нет контактов</p>
                @endif
            </div>
        </div>

        <!-- Сделки компании -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-handshake"></i> Сделки с компанией
                    <span class="badge text-white bg-secondary ms-2">Демо (показано  не более 2)</span>
                </h5>
            </div>
            <div class="card-body">
                @if($company->deals->count() > 0)
                    <div class="list-group">
                        @foreach($company->deals->take(2) as $deal)
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $deal->name }}</h6>
                                    <span class="badge bg-{{ $deal->status->color ?? 'secondary' }}">
                                {{ $deal->status->name }}
                            </span>
                                </div>
                                <p class="mb-1">
                                    <strong>Сумма:</strong> {{ asCurrency($deal->budget_amount) }}
                                    • <strong>Менеджер:</strong> {{ $deal->owner->name ?? '-' }}
                                </p>
                                <small>
                                    Создана: {{ $deal->created_at->format('d.m.Y') }}
                                    @if($deal->due_date)
                                        • Срок: {{ $deal->due_date->format('d.m.Y') }}
                                    @endif
                                </small>
                                <div class="mt-2">
                                    <a href="{{ route('demo.deals.show', $deal) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($company->deals->count() > 2)
                        <div class="text-center mt-3">
                            <button class="btn btn-outline-secondary"
                                    onclick="showDemoFeature('view_all')">
                                <i class="fas fa-eye"></i> Показать все сделки ({{ $company->deals->count() }})
                                <small class="d-block text-muted">Доступно в полной версии</small>
                            </button>
                        </div>
                    @endif
                @else
                    <p class="text-muted text-center">Нет сделок</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Блок с информацией о полной версии -->
    @include('demo.partials.full_version_info');
    <!-- Модальное окно для демо-функций -->
    @include('demo.modals.demo_feature');
@endsection
