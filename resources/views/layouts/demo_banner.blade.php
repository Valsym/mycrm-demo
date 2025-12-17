@if(request()->is('demo*') && !request()->is('demo/welcome'))
    <div class="alert alert-warning mb-0 border-0 rounded-0 text-center py-2"
         style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">
        <div class="container">
            <i class="fas fa-flask me-2"></i>
            @if(Auth()->user() ?? false)
            <strong>Демо-режим</strong> — Вы вошли как <code>{{ Auth()->user()->email }}</code>.
            <a href="https://crm.valsy.ru" target="_blank" class="alert-link mx-2">
                <i class="fas fa-external-link-alt"></i> Открыть полную версию
            </a>
            @endif
            <!--•
            <form action="{{-- route('demo.logout') --}}" method="POST" class="d-inline">
                @ csrf
                <button type="submit" class="btn btn-link alert-link p-0">
                    <i class="fas fa-sign-out-alt"></i> Выйти
                </button>
            </form>-->
        </div>
    </div>
@endif
