<div class="profile-menu">
    <ul>
        <li><a href="/profile/messages" class="btn">Сообщения</a></li>
        <li><a href="/profile/blog" class="btn">Мой блог</a></li>
        @can('edit-expert')
        <li><a href="{{ route("profile.services") }}" class="btn">Мои услуги</a></li>
        @endcan
        <li><a href="/profile" class="btn">Аккаунт</a></li>

    </ul>
</div>
