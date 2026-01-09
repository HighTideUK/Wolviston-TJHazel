<?php

if (!isset($active_nav)) {
    $active_nav = [
        'item' => '',
        'sub_item' => ''
    ];
}

?>
<nav>
    <ul>
        @foreach (getAdminNav() as $nav)
            @if ($active_nav['item'] == $nav['key'])
                <li class="nav-item active">
            @else
                <li class="nav-item">
            @endif
                <a class="nav-link" href="{{ $nav['route'] }}">
                    <div class="icon">
                        <i class="fal {{ getAdminSectionIcon($nav['key']) }} fa-fw"></i>
                    </div>
                    <div class="label">
                        <div class="inner">
                            <span>{{ $nav['label'] }}</span>
                            @if ($active_nav['item'] == $nav['key'] && count($nav['items']) > 0)
                                <i class="fal fa-chevron-down"></i>
                            @else
                                <i class="fal fa-chevron-right"></i>
                            @endif
                        </div>
                    </div>
                </a>
                @if (count($nav['items']) > 0)
                    <ul class="sub-items">
                        @foreach ($nav['items'] as $item)
                            @if ($active_nav['sub_item'] == $item['key'] && $active_nav['item'] == $nav['key'])
                                <li class="sub-nav-item active">
                            @else
                                <li class="sub-nav-item">
                            @endif
                                <a href="{{ $item['route'] }}">{{ $item['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>


<p><a href="{{ route('logout') }}" class="btn btn-primary btn-outline disable-on-click">Logout &nbsp;<i class="fal fa-sign-out"></i></a></p>