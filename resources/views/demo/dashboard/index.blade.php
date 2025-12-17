{{-- resources/views/demo/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Дашборд (Демо)')

@section('content')
    <div class="container">
        <!-- Демо-баннер -->
        <div class="alert alert-info mb-4">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h4 class="alert-heading mb-1">
                        <i class="fas fa-chart-line"></i> Демо-версия дашборда
                    </h4>
                    <p class="mb-0">
                        Это упрощенная версия с тестовыми данными. Полная версия показывает реальную аналитику в реальном времени.
                    </p>
                </div>
                <a href="https://crm.valsy.ru/dashboard"
                   target="_blank"
                   class="btn btn-success">
                    <i class="fas fa-external-link-alt"></i> Открыть полную версию
                </a>
            </div>
        </div>

        <!-- Заголовок -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">
                <i class="fas fa-tachometer-alt"></i> Дашборд CRM
                <span class="badge text-white bg-secondary ms-2">Демо</span>
            </h1>
            <div class="text-muted">
                <i class="far fa-calendar"></i> {{ now()->format('d.m.Y') }}
            </div>
        </div>

        <!-- Основные метрики -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted">Всего сделок</h6>
                                <h3 class="mb-0">{{ array_sum($dealsCounters) }}</h3>
                            </div>
                            <div class="text-primary">
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-success h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted">Заработано</h6>
                                <h3 class="mb-0">{{ asCurrency($financeOverview[1]) }}</h3>
                            </div>
                            <div class="text-success">
                                <i class="fas fa-money-bill-wave fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-warning h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted">Компаний</h6>
                                <h3 class="mb-0">{{ $commonCounters['companies'] }}</h3>
                            </div>
                            <div class="text-warning">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-info h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted">Сотрудников</h6>
                                <h3 class="mb-0">{{ $commonCounters['users'] }}</h3>
                            </div>
                            <div class="text-info">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Два графика -->
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Активность на этой неделе</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="weekChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Сделки по месяцам</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="dealsChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Другие блоки в колонках -->
        <div class="row">
            <!-- Горящие задачи -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Горящие задачи</h5>
                        <span class="badge text-white bg-danger">Демо</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach($hotTasks as $task)
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $task->deal->name }}</h6>
                                        <small class="text-muted">{{ $task->due_date->format('d.m') }}</small>
                                    </div>
                                    <p class="mb-1 small">{{ $task->type->name }} • {{ $task->executor->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Статусы сделок -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Сделки по статусам</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($dealsCounters as $status => $count)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $status }}
                                    <span class="badge text-white bg-primary rounded-pill">{{ $count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Новая статистика -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Общая статистика</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($commonCounters as $key => $value)
                                <div class="col-6 mb-3">
                                    <div class="text-center p-2 border rounded">
                                        <h4 class="mb-1">{{ $value }}</h4>
                                        <small class="text-muted">
                                            @if($key == 'tasks') Задачи
                                            @elseif($key == 'users') Сотрудники
                                            @elseif($key == 'companies') Компании
                                            @elseif($key == 'contacts') Контакты
                                            @elseif($key == 'complete_deals') Завершено сделок
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Блок с информацией о полной версии -->
        @include('demo.partials.full_version_info');
        <!-- Блок "Полная версия" -->

        <!-- Модальное окно для демо-функций -->
        @include('demo.modals.demo_feature');

    </div>

    @push('styles')
        <style>
            .card {
                transition: transform 0.2s;
            }

            .card:hover {
                transform: translateY(-2px);
            }

            .list-group-item {
                border-left: none;
                border-right: none;
            }

            .badge.bg-secondary {
                font-size: 0.7rem;
                vertical-align: middle;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // График недельной активности
                const weekCtx = document.getElementById('weekChart').getContext('2d');
                new Chart(weekCtx, {
                    type: 'bar',
                    data: {
                        labels: @json($weekPerformance['labels']),
                        datasets: [{
                            label: 'Активность',
                            data: @json($weekPerformance['data']),
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(199, 199, 199, 0.6)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(199, 199, 199, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return 'Событий: ' + context.raw;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 5
                                }
                            }
                        }
                    }
                });

                // График сделок по месяцам
                const dealsData = @json($dealsByMonth);
                const dealsCtx = document.getElementById('dealsChart').getContext('2d');

                const monthNames = ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'];
                const labels = dealsData.map(item => {
                    const [year, month] = item.month.split('-');
                    return monthNames[parseInt(month) - 1] + ' ' + year;
                });

                new Chart(dealsCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Количество сделок',
                            data: dealsData.map(item => item.count),
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            tension: 0.3,
                            yAxisID: 'y',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        if (context.dataset.label === 'Количество сделок') {
                                            return context.dataset.label + ': ' + context.raw;
                                        }
                                        return context.dataset.label + ': ' + context.raw + ' тыс. руб.';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Количество сделок'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
