<div class="alert alert-info mb-4">
    <div class="d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="alert-heading mb-1">
                <i class="fas fa-info-circle"></i> Демо-версия
            </h4>
            <p class="mb-0">{{ $demoDescription ?? 'Это демо-версия с ограниченным функционалом' }}</p>
        </div>
        <a href="{{ $fullVersionUrl ?? 'https://crm.valsy.ru' }}"
           target="_blank"
           class="btn btn-success">
            <i class="fas fa-external-link-alt"></i> Открыть полную версию
        </a>
    </div>
</div>
