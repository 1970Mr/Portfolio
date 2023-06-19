<nav>
  <ol class="breadcrumb">
    @foreach ($routes as $text => $route)
      <li class="breadcrumb-item @if(count($routes) == $loop->iteration || $route == '') 'active' @endif">
        @if($route != '')
          <a href="{{ $route }}">{{ $text }}</a>
        @else
          {{ $text }}
        @endif
      </li>
    @endforeach
    </li>
  </ol>
</nav>
