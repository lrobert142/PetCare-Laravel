<header>

{{-- TODO TEMP --}}
  <div class="notifications__container notifications__container--success">
    <span class="notifications__container--close">X</span>
      <ul class="notifications">
        <li class="notification">Successfully added new pet: test</li>
      </ul>
    </div>

  @if( session('notifications') )

    <div class="notifications__container--{{ session('notifications')['type'] }}">
      <span class="notifications__container--close">X</span>
      <ul class="notifications">
        @foreach (session('notifications')['messages'] as $notification)
          <li class="notification">{{ $notification }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</header>
