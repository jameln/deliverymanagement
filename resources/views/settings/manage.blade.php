@extends('layouts.app')
@section('title', __('global.settings') )

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('settings.menu')

        <div class="col-md-12">

            <div class="col-md-4">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('settings.update') }}" method="post" >
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-header card-header-text" data-background-color="rose">
                            {{__('global.language_settings')}}
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-4 label-on-left" for="settings_default_language">{{__('global.default_language')}}</label>
                                <div class="col-sm-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <select name="settings[default_language]" id="settings_default_language" class="selectpicker" data-style="select-with-transition" title="{{__('global.choose_language')}}" data-size="4">
                                            <option disabled>{{__('global.choose_language')}}</option>
                                            @foreach( $languages as $language)
                                            <option value="{{$language->ref}}" {{ ($language->ref == isset($settings['default_language']) ? $settings['default_language']['value'] : 1 ) ? 'selected' : '' }}>{{__('sidebar.'.$language->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-rose btn-fill">{{__('global.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('after_footer')
@parent
<script type="text/javascript">
    $(document).ready(function() {


    });
</script>
@endsection
