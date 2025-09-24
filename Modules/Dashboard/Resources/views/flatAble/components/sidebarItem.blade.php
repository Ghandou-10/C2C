@if((isset($can['permission'])
    && auth()->user()->isAbleTo($can['permission']))
    || ! isset($can))

    <li class="pc-item {{ isset($tree) && is_array($tree) ? 'pc-hasmenu' : '' }} {{ isset($isActive) && $isActive ?  'active' : '' }} {{ isset($tree) && is_array($tree) && isset($isActive) && $isActive ? 'pc-trigger' : '' }}">
        <a href="{{ isset($tree) && is_array($tree) ? 'javascript: void(0);' : ($url ?? '#') }}" class="pc-link">
            @isset($icon)
                <span class="pc-micon">
                     <i class="{{ $icon }}"></i>
                </span>
            @endisset
            <span class="pc-mtext">{{ $name }}</span>
            @if(isset($tree) && is_array($tree) && count($tree))
                <span class="pc-arrow">
                    <i data-feather="chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right'  }}"></i>
                </span>
            @endif
        </a>
        @if(isset($tree) && is_array($tree) && count($tree))
            <ul class="pc-submenu">
                @foreach($tree as $item)
                    @if(isset($item['module']) && \Module::isEnabled($item['module']))
                        @if((isset($item['can']['permission'])
                        && auth()->user()->isAbleTo($item['can']['permission']))
                        || ! isset($item['can']))
                            <li class="pc-item {{ isset($item['tree']) && is_array($item['tree']) ? 'pc-hasmenu' : '' }} {{ isset($item['isActive']) && $item['isActive'] ? 'active' : '' }}">
                                <a class="pc-link" href="{{ isset($item['tree']) && is_array($item['tree']) ? 'javascript: void(0);' : ($item['url'] ?? '#') }}">
                                    {{ $item['name'] }}
                                    @if(isset($item['tree']) && is_array($item['tree']) && count($item['tree']))
                                        <span class="pc-arrow">
                                            <i data-feather="chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right'  }}"></i>
                                        </span>
                                    @endif
                                </a>
                                @if(isset($item['tree']) && is_array($item['tree']) && count($item['tree']))
                                    <ul class="pc-submenu">
                                        @foreach($item['tree'] as $treeItem)
                                            @if(isset($treeItem['module']) && \Module::isEnabled($treeItem['module']))
                                                @if((isset($treeItem['can']['permission'])
                                                && auth()->user()->isAbleTo($treeItem['can']['permission']))
                                                || ! isset($treeItem['can']))
                                                    <li class="pc-item {{ isset($treeItem['isActive']) && $treeItem['isActive'] ? 'active' : '' }}">
                                                        <a class="pc-link" href="{{ $treeItem['url'] }}">
                                                            {{ $treeItem['name'] }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
        @endif
    </li>

@endif
