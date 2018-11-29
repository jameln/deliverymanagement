@extends('layouts.admin')
@section('title', __('user.ajouter_compte'))

@section('after_head')
<style>
    .radio.withinput .form-group {
        width: 100px;
        display: inline-block;
        margin: -20px 0;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
               <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">person</i>
               </div>
                <div class="card-content">
                    <form method="post" id="user_add_form">
                        {{ csrf_field() }}
                        <h4 class="card-title">{{ __('user.ajouter_compte')}}</h4>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="label-control">{{ __('user.name')}}</label>
                                    <input type="text" class="form-control" name="add_name" required="true">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                <label class="label-control">{{ __('user.email')}}</label>
                                <input type="email" class="form-control" name="add_email" required="true">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="label-control">{{ __('user.type_compte')}}</label>
                                    <select name="add_role" class="selectpicker" data-style="select-with-transition" title="{{ __('user.type_compte')}}" data-size="7" required="true">
                                        <option disabled=""> {{ __('user.type_compte')}}</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="label-control">{{ __('global.default_language')}}</label>
                                    <select name="add_language" class="selectpicker" data-style="select-with-transition" title="{{ __('global.choose_language')}}" data-size="7" required="true">
                                        <option disabled=""> {{ __('global.choose_language')}}</option>
                                        @foreach($languages as $language)
                                        <option value="{{$language->id}}" {{ (settings_get_val('default_language') == $language->ref) ? 'selected' : '' }}>{{__('sidebar.'.$language->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="label-control">{{ __('user.pwd')}}</label>
                                    <input type="password" class="form-control" name="add_password" id="add_password" required="true">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="label-control">{{ __('user.cpwd')}}</label>
                                    <input type="password" class="form-control" name="add_repassword" equalto="#add_password" required="true">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group form-button text-center">
                                        <button type="submit" class="btn btn-fill btn-rose">{{ __('user.confirmer')}}</button>
                                    </div>
                                </div>
                            </div>
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
<script>
    demo.initFormExtendedDatetimepickers();
    $('#user_add_form').validate({});

</script>
    @endsection