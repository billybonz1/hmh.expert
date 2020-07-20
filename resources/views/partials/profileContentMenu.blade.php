<div class="profile-content-menu">
    <ul>
        <li>
            <a href="{{ route('profile.password') }}" @if(Route::current()->getName() == 'profile.password') class="active" @endif>Сменить пароль</a>
        </li>
        <li>
            <a href="{{ route('profile') }}" @if(Route::current()->getName() == 'profile') class="active" @endif>Личные данные</a>
        </li>
        
        @can('edit-expert')
            <li>
                <a href="{{ route('profile.expert') }}" @if(Route::current()->getName() == 'profile.expert') class="active" @endif>
                    Настройки эксперта
                </a>
            </li>
        @endcan
        
        <li>
            <a href="{{ route('profile.balance') }}" @if(Route::current()->getName() == 'profile.balance') class="active" @endif>
                Баланс
            </a>
        </li>
    </ul>
</div>