
<div class="card">
    <div class="card-header">
        <h5>Telegram уведомления <span id="demo-status-badge" class="badge bg-secondary">{{ $demoMode ? 'Демо-режим включен' : '' }}</span></h5>
    </div>
    <div class="card-body">
        <!-- Блок для состояния "Telegram привязан" -->
        <div id="telegram-linked-block" class="{{ $demoMode ? '' : 'd-none' }}">
            <div class="alert alert-success">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <i class="fas fa-check-circle"></i>
                        <strong>Telegram привязан.</strong> Вы получаете уведомления.
                    </div>
                </div>
            </div>
            <button id="unlinkTelegram" class="btn btn-danger">
                <i class="fas fa-unlink"></i> Отвязать Telegram
            </button>
            <button id="" class="btn btn-success btn-sm disabled">
                <i class="fas fa-paper-plane"></i> <-- Жмите чтобы имитировать отправку кода
            </button>
        </div>

        <!-- Блок для состояния "Telegram не привязан" -->
        <div id="telegram-unlinked-block" class="{{ $demoMode ? 'd-none' : '' }}">
            <div class="alert alert-info">
                <p><strong><i class="fas fa-flask"></i> Демо-интеграция с Telegram</strong></p>
                <p>В демо-версии показан процесс привязки Telegram:</p>
                <ol>
                    <li>Найдите нашего бота <span class="mb-0 small text-muted">(@..._bot)</span> в Telegram</li>
                    <li>Нажмите <strong>/start</strong></li>
                    <li>Отправьте сгенерированный ниже код</li>
                </ol>
                <p class="mb-0 small text-muted">
                    <i class="fas fa-info-circle"></i>
                    В реальной версии используется рабочий Telegram-бот с отправкой реальных уведомлений.
                </p>
            </div>

            <div class="text-center">
                <button id="generateCode" class="btn btn-primary">
                    <i class="fas fa-key"></i> Сгенерировать код привязки
                </button>

                <div id="codeContainer" class="mt-3" style="display: none;">
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-key"></i> Демо-код для привязки:</h6>
                        <div class="h4 text-center my-3" id="codeDisplay"></div>
                        <p class="mb-2">
                            <strong>В демо-режиме:</strong> просто скопируйте код и нажмите "Привязать"
                        </p>
                        <p class="mb-0 text-muted small">
                            <i class="fas fa-info-circle"></i>
                            В рабочей версии: отправьте этот код реальному CRM-боту в Telegram
                        </p>
                    </div>
                    <div class="text-center">
                        <button id="copyCode" class="btn btn-outline-secondary btn-sm me-2">
                            <i class="fas fa-copy"></i> Скопировать код
                        </button>
                        <button id="simulateBind" class="btn btn-success btn-sm">
                            <i class="fas fa-paper-plane"></i> Имитировать отправку кода
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для демо-уведомлений -->
<div class="modal fade" id="demoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-flask"></i> Демо-режим
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="demoModalMessage"></p>
                <div class="alert alert-info">
                    <h6 class="alert-heading">В полной версии:</h6>
                    <ul class="mb-0">
                        <li>Реальная привязка Telegram-бота</li>
                        <li>Мгновенные уведомления о событиях</li>
                        <li>История отправленных уведомлений</li>
                        <li>Настройка типов уведомлений</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <a href="https://crm.valsy.ru/settings"
                   target="_blank"
                   class="btn btn-primary">
                    Открыть полную версию
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    // Инициализация состояния из PHP
    let demoMode = @json($demoMode); // true или false

    // Генерация случайного кода для демо
    function generateDemoCode() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let code = '';
        for (let i = 0; i < 8; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return 'DEMO-' + code;
    }

    // Обновление интерфейса в зависимости от состояния
    function updateUI() {
        const linkedBlock = document.getElementById('telegram-linked-block');
        const unlinkedBlock = document.getElementById('telegram-unlinked-block');
        const statusBadge = document.getElementById('demo-status-badge');

        if (demoMode) {
            // Telegram привязан
            linkedBlock.classList.remove('d-none');
            unlinkedBlock.classList.add('d-none');
            statusBadge.textContent = 'Telegram привязан';
            statusBadge.className = 'badge bg-success';
        } else {
            // Telegram не привязан
            linkedBlock.classList.add('d-none');
            unlinkedBlock.classList.remove('d-none');
            statusBadge.textContent = 'Telegram не привязан';
            statusBadge.className = 'badge bg-warning';
        }
    }

    // Показать демо-сообщение
    function showDemoMessage(action) {
        const modal = new bootstrap.Modal(document.getElementById('demoModal'));
        const messageEl = document.getElementById('demoModalMessage');

        const messages = {
            'unlink': 'В реальной версии это действие отправит запрос на сервер для отвязки Telegram-бота и прекратит отправку уведомлений.',
            'generate': 'В реальной версии будет сгенерирован уникальный код, который нужно отправить Telegram-боту для привязки.',
            'copy': 'Код скопирован в буфер обмена. В реальной версии пользователь должен отправить его Telegram-боту для привязки.',
            'linked': 'Telegram успешно привязан! В реальной версии вы будете получать уведомления о всех важных событиях.'
        };

        messageEl.textContent = messages[action] || 'Это демо-режим. В реальной версии это действие выполнит другую операцию.';
        modal.show();
    }

    // Обработчики событий
    document.addEventListener('DOMContentLoaded', function() {
        // Обновляем интерфейс при загрузке
        updateUI();

        // Отвязать Telegram
        document.getElementById('unlinkTelegram').addEventListener('click', function(e) {
            e.preventDefault();

            if (confirm('Вы уверены, что хотите отвязать Telegram? Вы перестанете получать уведомления. (В Демо-режиме - это просто имитация отвязки, жмите кнопку "Да", для демонстрации!)')) {
                demoMode = false;
                updateUI();
                showDemoMessage('unlink');

                // Показываем уведомление об успешном отключении
                showNotification('Telegram успешно отвязан', 'info');
            }
        });

        // Сгенерировать код привязки
        document.getElementById('generateCode').addEventListener('click', function(e) {
            e.preventDefault();

            // Генерируем и показываем код
            const code = generateDemoCode();
            document.getElementById('codeDisplay').textContent = code;
            document.getElementById('codeContainer').style.display = 'block';

            // Показываем сообщение о том, что это демо
            showDemoMessage('generate');

            // Прокручиваем к коду
            document.getElementById('codeContainer').scrollIntoView({ behavior: 'smooth' });
        });

        // Скопировать код
        document.getElementById('copyCode')?.addEventListener('click', function(e) {
            e.preventDefault();

            const code = document.getElementById('codeDisplay').textContent;
            navigator.clipboard.writeText(code).then(() => {
                // Показываем всплывающее сообщение
                showNotification('Код скопирован в буфер обмена!', 'success');

                // Показываем демо-сообщение
                showDemoMessage('copy');

                // После копирования имитируем привязку через 3 секунды
                setTimeout(() => {
                    if (confirm('В демо-режиме: представим, что вы отправили код боту и привязали Telegram. Привязать?')) {
                        demoMode = true;
                        updateUI();
                        showDemoMessage('linked');
                        document.getElementById('codeContainer').style.display = 'none';
                        showNotification('Telegram успешно привязан!', 'success');

                        // Перезагружаем страницу через 1.5 секунды
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                }, 2000);
            }).catch(err => {
                console.error('Ошибка копирования: ', err);
                showNotification('Не удалось скопировать код', 'error');
            });
        });

        // Добавьте эту кнопку вместо confirm
        document.getElementById('simulateBind')?.addEventListener('click', function() {
            // Показываем анимацию отправки
            const button = this;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Отправка...';
            button.disabled = true;

            // Имитация отправки
            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;

                // Сохраняем состояние
                localStorage.setItem('demoTelegramLinked', 'true');

                // Показываем успешное сообщение
                showNotification('Telegram успешно привязан! Перезагружаем страницу...', 'success');

                // Перезагружаем страницу
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }, 1500);
        });
    });

    // Функция для показа уведомлений (тостов)
    function showNotification(message, type = 'info') {
        // Создаем контейнер для тостов, если его нет
        let toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            toastContainer.style.zIndex = '9999';
            document.body.appendChild(toastContainer);
        }

        // Создаем toast элемент
        const toastId = 'toast-' + Date.now();
        const bgColor = type === 'success' ? 'bg-success' :
            type === 'error' ? 'bg-danger' :
                type === 'warning' ? 'bg-warning' : 'bg-info';

        const toastHTML = `
        <div id="${toastId}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ${bgColor} text-white">
                <strong class="me-auto">Уведомление</strong>
                <small>Только что</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;

        toastContainer.insertAdjacentHTML('beforeend', toastHTML);

        // Инициализируем и показываем toast
        const toastEl = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastEl, {
            delay: 3000
        });

        toast.show();

        // Удаляем элемент после скрытия
        toastEl.addEventListener('hidden.bs.toast', function() {
            this.remove();
        });
    }

    // Если хотите сохранять состояние между перезагрузками страницы, используйте localStorage:
    function saveStateToLocalStorage() {
        localStorage.setItem('demoTelegramMode', demoMode);
    }

    function loadStateFromLocalStorage() {
        const saved = localStorage.getItem('demoTelegramMode');
        if (saved !== null) {
            demoMode = saved === 'true';
            updateUI();
        }
    }

    // Вызовите loadStateFromLocalStorage() при загрузке страницы
    // и saveStateToLocalStorage() при изменении demoMode
</script>



