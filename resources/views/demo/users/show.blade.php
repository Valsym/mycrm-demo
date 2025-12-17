@extends('layouts.app')

@section('title', 'Настройки профиля')

@section('content')
    <div class="container">
        <!-- Включаем общий баннер -->
        @include('demo.partials.demo_banner', [
            'demoDescription' => 'В демо-версии настройки профиля не активны',
            'fullVersionUrl' => 'https://crm.valsy.ru'
        ])

        <h1 class="header-3 settings__header">Настройки</h1>

        @if(auth()->user()->email_verified_at)
            <div class="alert alert-success">
                ✅ Email подтвержден: {{ auth()->user()->email }}
            </div>
        @else
            <div class="alert alert-warning">
                ⚠️ Email не подтвержден: {{ auth()->user()->email }}
                <button class="btn btn-outline-primary"
                        onclick="showDemoFeature('update')"
                        title="Доступно в полной версии">
                    <i class="fas fa-plus"></i> Отправить письмо подтверждения повторно
                </button>
            </div>
        @endif
    <div class="dasboard-section__body">
        <div class="dasboard-section__wrapper">
            <div class="dasboard-section__col">
                <div class="dashboard-card dasboard-section__card">
                    <div class="settings__content settings__content--account show" id="account">


                            <div class="field field--big settings__field field-user-name required @error('name') field--error @enderror">
                                <input type="text" id="user-name" class="field__input input input--big" name="name" value="{{ $user->name }}" placeholder="Имя" required>
                                @error('name')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="field field--big settings__field field-user-email required @error('email') field--error @enderror">
                                <input type="email" id="user-email" class="field__input input input--big" name="email" value="{{ $user->email }}" placeholder="Email" required>
                                @error('email')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="field field--big settings__field field-user-company required @error('company') field--error @enderror">
                                <input type="text" id="user-company" class="field__input input input--big" name="company" value="{{ $user->company }}" placeholder="Компания" required>
                                @error('company')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="field field--big settings__field field-user-position required @error('position') field--error @enderror">
                                <input type="text" id="user-position" class="field__input input input--big" name="position" value="{{ $user->position }}" placeholder="Должность" required>
                                @error('position')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="field field--big settings__field field-user-phone required @error('phone') field--error @enderror">
                                <input type="text" id="user-phone" class="field__input input input--big" name="phone" value="{{ $user->phone }}" placeholder="Рабочий телефон">
                                @error('phone')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="title settings__caption settings__caption--account"><span>Смена пароля</span></p>
                            <div class="field field--big settings__field field-user-password required @error('password') field--error @enderror">
                                <input type="password" id="user-password" class="field__input input input--big" name="password" value="{{ old('password') }}" placeholder="Пароль">
                                @error('password')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="field field--big settings__field field-user-password_confirmation required @error('password_confirmation') field--error @enderror">
                                <input type="password" id="user-password_confirmation" class="field__input input input--big" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Пароль (подтверждение)">
                                @error('password_confirmation')
                                <span class="field__error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-outline-primary"
                                    onclick="showDemoFeature('update')"
                                    title="Доступно в полной версии">
                                <i class="fas fa-plus"></i> Обновить
                            </button>

                    </div>
                </div>
            </div>
            <div class="dasboard-section__col">
                <div class="dashboard-card dasboard-section__card">
                    <p class="header-3 deal-log__header">Телеграмм</p>
                    @include('demo.users.telegram', ['emoMode' => $demoMode])
                </div>
            </div>

        </div>
    </div>

        <!-- Блок с информацией о полной версии -->
{{--        @include('demo.partials.full_version_info');--}}
        <div class="card mt-4 border-warning">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="fas fa-crown"></i> Полная версия CRM</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Telegramm-уведомления</h5>
                        <div class="text-center my-3">
                            <img width="50%"  src="/img/telega.jpg"
                                 class="img-fluid rounded border"
                                 alt="Канбан-доска">
                        </div>
                        <p class="text-muted">
                            В полной версии реализованы мгновенные уведомления в Телеграмм об изменениях в сделках.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5>Email-уведомления</h5>
                        <div class="text-center my-3">
                            <img width="70%" src="/img/email.png"
                                 class="img-fluid rounded border"
                                 alt="Фильтры">
                        </div>
                        <p class="text-muted">
                            В полной версии реализованы уведомления на email об изменениях в сделках.
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
