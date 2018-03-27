@if ($item['submenu'] == [])
    <li>
        <a href="{{ url($item['url']) }}"><i class="{{ $item['icon_class'] }}"></i> <span>{{ $item['name'] }}</span></a>
    </li>
@else
    <li class="treeview">
      <a href="#"><i class="{{ $item['icon_class'] }}"></i> <span>{{ $item['name'] }}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        @foreach ($item['submenu'] as $submenu)
            <li><a href="{{ url($submenu['url']) }}">{{ $submenu['name'] }} </a></li>
        @endforeach
      </ul>
    </li>
@endif
