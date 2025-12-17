@extends('layouts.app')

@section('title', 'Список задач  (Демо)')

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
                        <i class="fas fa-building"></i> Задачи
                        <span class="badge text-white bg-secondary">Демо (показано {{ $tasks->count() }})</span>
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
                        <i class="fas fa-plus"></i> Добавить задачу
                    </button>


                </div>
            </div>

            <div class="card-body">
                @if($tasks->isEmpty())
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
                                <th>Дата создания</th>
                                <th>Описание</th>
                                <th>Исполнитель</th>
                                <th>Срок исполнения</th>
                                <th>Тип</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->created_at->format('d.m.Y') }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->executor->name }}</td>
                                    <td>{{ $task->due_date->format('d.m.Y') }}</td>
                                    <td>{{ $task->type->name }}</td>
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
