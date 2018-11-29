<?php
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{ route('settings.manage') }}" class="{{ (route('settings.manage') == url()->current()) ? 'active' : '' }}">{{__('global.general_settings')}}</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{__('global.roles_settings')}} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('settings.roles') }}" class="{{ (route('settings.roles') == url()->current()) ? 'active' : '' }}">{{__('global.roles_list')}}</a></li>
                    <li><a href="{{ route('settings.objects') }}">{{ __('global.roles_objects') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>