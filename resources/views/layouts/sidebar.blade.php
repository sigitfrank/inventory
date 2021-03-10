<div class="mdl-layout__drawer">
    <header>Inventory</header>
    <div class="scroll__wrapper" id="scroll__wrapper">
        <div class="scroller" id="scroller">
            <div class="scroll__container" id="scroll__container">
                <nav class="mdl-navigation">
                    @foreach ($sidebar_parents as $sidebar_parent)
                        @foreach ($user_access as $access)
                            @if ($sidebar_parent->id == $access->module_id)
                                @if ($sidebar_parent->has_child)
                                    <div class="sub-navigation">
                                        <a class="mdl-navigation__link {{request()->segment(1) == $sidebar_parent->path ? 'mdl-navigation__link--current' : ''}}">
                                            <i class="material-icons">{{$sidebar_parent->icon}}</i>
                                            {{ $sidebar_parent->nama_module }}
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                        @foreach ($sidebars_children as $sidebars_child)
                                            @if ($sidebars_child['parent_module']==$sidebar_parent->id)
                                                <div class="mdl-navigation">
                                                    <a class="mdl-navigation__link {{request()->segment(1).'/'.request()->segment(2) == $sidebars_child['path'] ? 'mdl-navigation__link--current' : ''}}" href="{{route($sidebars_child['path']) }}">
                                                        {{$sidebars_child['nama_module']}}
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <a class="mdl-navigation__link {{request()->segment(1) == $sidebar_parent->path ? 'mdl-navigation__link--current' : ''}} " href="{{ route($sidebar_parent->path) }}">
                                        <i class="material-icons" role="presentation">{{ $sidebar_parent->icon }}</i>
                                        {{ $sidebar_parent->nama_module }}
                                    </a>    
                                @endif  
                            @endif    
                        @endforeach    
                    @endforeach
                    {{-- <a class="mdl-navigation__link" href="maps.html">
                        <i class="material-icons" role="presentation">map</i>
                        Maps
                    </a>
                    <a class="mdl-navigation__link" href="charts.html">
                        <i class="material-icons">multiline_chart</i>
                        Charts
                    </a> --}}
                    <div class="mdl-layout-spacer"></div>
                    <hr>
                    <a class="mdl-navigation__link" href="https://github.com/CreativeIT/getmdl-dashboard">
                        <i class="material-icons" role="presentation">link</i>
                        GitHub
                    </a>
                </nav>
            </div>
        </div>
        <div class='scroller__bar' id="scroller__bar"></div>
    </div>
</div>