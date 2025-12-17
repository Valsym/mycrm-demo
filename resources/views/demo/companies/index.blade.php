@extends('layouts.app')

@section('title', 'Компании (Демо)')

@section('content')
    <div class="container">
        <!-- Включаем общий баннер -->
        @include('demo.partials.demo_banner', [
            'demoDescription' => 'В демо-версии показаны только последние 10 компаний.',
            'fullVersionUrl' => 'https://crm.valsy.ru/companies'
        ])
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">
                        <i class="fas fa-building"></i> Компании
                        <span class="badge text-white bg-secondary">Демо (показано {{ $items->count() }})</span>
                    </h2>

                    <button class="btn btn-outline-primary"
                            onclick="showDemoFeature('create')"
                            title="Доступно в полной версии">
                        <i class="fas fa-plus"></i> Добавить компанию
                    </button>
                </div>
            </div>

            <div class="card-body">
                @if($items->isEmpty())
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
                                <th>Название</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th>Адрес</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $company)
                                <tr>
                                    <td>
                                        <strong>{{ $company->name }}</strong>
                                        @if($company->url)
                                            <br>
                                            <small class="text-muted">{{ $company->url }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $company->email ?? '-' }}</td>
                                    <td>{{ $company->phone ?? '-' }}</td>
                                    <td>{{ $company->address ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('demo.companies.show', $company) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> Просмотр
                                        </a>
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
