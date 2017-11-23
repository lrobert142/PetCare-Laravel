<header>

  @if( session('notifications') )

    <div class="notifications__container notifications__container--{{ session('notifications')['type'] }}">
      <span class="notifications__container--close">X</span>
      <ul class="notifications">
        @foreach (session('notifications')['messages'] as $notification)
          <li class="notification">{{ $notification }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</header>
