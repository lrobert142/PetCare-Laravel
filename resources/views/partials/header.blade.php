<header>
  @if( session('notifications') )
    <div class="notifications__container--{{ $notification->type }}">
      <ul class="notifications">
        @foreach ($notifications as $notification)
          <li class="notification">{{ $notification->message }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</header>
