<div class="modal fade" id="demoFeatureModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-lock"></i> Функция недоступна
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="demoFeatureMessage"></p>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Эта функция доступна только в полной версии CRM
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <a href="https://crm.valsy.ru"
                   target="_blank"
                   class="btn btn-primary">
                    Перейти к полной версии
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function showDemoFeature(feature) {
        const messages = {
            'create': 'Создание новых записей доступно только в полной версии CRM.',
            'edit': 'Редактирование записей доступно только в полной версии CRM.',
            'delete': 'Удаление записей доступно только в полной версии CRM.',
            'export': 'Экспорт данных доступен только в полной версии CRM.',
            'filter': 'Расширенные фильтры доступны только в полной версии CRM.',
            'update': 'Обновление доступно только в полной версии CRM.',
            'pdf': 'Экспорт PDF доступен только в полной версии CRM.'
        };

        const message = messages[feature] || 'Эта функция доступна только в полной версии CRM.';
        document.getElementById('demoFeatureMessage').innerText = message;

        const modal = new bootstrap.Modal(document.getElementById('demoFeatureModal'));
        modal.show();
    }
</script>
<style>
    .modal-backdrop {
        position: relative;
    }
</style>
