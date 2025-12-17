{{-- resources/views/demo/full_version_redirect.blade.php --}}
@extends('layouts.app')

@section('title', 'Полная версия CRM')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="mb-5">
                    <i class="fas fa-rocket fa-4x text-primary mb-4"></i>
                    <h1 class="display-5 mb-3">Открыть полную версию CRM</h1>
                    <p class="lead text-muted mb-4">
                        Вы переходите к полной функциональной версии системы с демо-доступом.
                        Все данные будут доступны только для просмотра.
                    </p>
                </div>

                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="fas fa-external-link-alt"></i> Ссылка на полную версию
                        </h5>
                        <div class="input-group mb-3">
                            <input type="text"
                                   class="form-control form-control-lg"
                                   value="https://crm.valsy.ru/crm/deals/{{ $deal->id ?? '' }}"
                                   readonly
                                   id="fullVersionUrl">
                            <button class="btn btn-primary"
                                    type="button"
                                    onclick="copyToClipboard()">
                                <i class="fas fa-copy"></i> Копировать
                            </button>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="https://crm.valsy.ru/deals/{{ $deal->id ?? '' }}"
                               target="_blank"
                               class="btn btn-success btn-lg py-3">
                                <i class="fas fa-external-link-alt"></i> Открыть в новом окне
                            </a>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning">
                    <h5 class="alert-heading">
                        <i class="fas fa-info-circle"></i> Информация о демо-доступе
                    </h5>
                    <p class="mb-2">Для входа в полную версию используйте:</p>
                    <p class="mb-0">
                        <strong>Логин:</strong> <code>demo@example.com</code><br>
                        <strong>Пароль:</strong> <code>demo123</code>
                    </p>
                </div>

                <div class="mt-5">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Вернуться назад
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function copyToClipboard() {
                const input = document.getElementById('fullVersionUrl');
                input.select();
                input.setSelectionRange(0, 99999);

                try {
                    navigator.clipboard.writeText(input.value);
                    showCopiedMessage();
                } catch (err) {
                    // Fallback для старых браузеров
                    document.execCommand('copy');
                    showCopiedMessage();
                }
            }

            function showCopiedMessage() {
                const button = event.target.closest('button');
                const originalHtml = button.innerHTML;

                button.innerHTML = '<i class="fas fa-check"></i> Скопировано!';
                button.classList.add('btn-success');
                button.classList.remove('btn-primary');

                setTimeout(() => {
                    button.innerHTML = originalHtml;
                    button.classList.remove('btn-success');
                    button.classList.add('btn-primary');
                }, 2000);
            }
        </script>
    @endpush
@endsection
