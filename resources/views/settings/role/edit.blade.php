@extends('layouts.admin')
@section('title', __('global.settings') )

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('settings.menu')

        <form method="post" action="{{ route('settings.roles_edit', array('id' => $role->id)) }}" >

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-text" data-background-color="rose">
                        {{__('global.roles_add')}}
                    </div>
                    <div class="card-content">


                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="label-control" for="roles_edit_name">{{__('global.roles_name')}}</label>
                            <input type="text" name="roles_edit_name" id="roles_edit_name" value="{{$role->name}}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="label-control" for="roles_edit_description">{{__('global.roles_desciption')}}</label>
                            <textarea id="roles_edit_description" class="form-control" name="roles_edit_description">{{$role->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-rose btn-fill">{{__('global.save')}}</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-text" data-background-color="rose">
                        {{__('global.permissions_list')}}
                    </div>
                    <div class="card-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{__('global.object')}}</th>
                                <th>{{__('global.permissions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($objects as $object)
                                <tr>
                                    <td class="text-center">{{ $object->id }}</td>
                                    <td >{{ $object->name }}</td>
                                    <td >
                                        <div class="row">
                                            @foreach($object->permissions()->permissions as $permission)
                                            <div class="col-md-3">
                                                <div class="togglebutton">
                                                    <label title="{{$object->slug.'_'.$permission->slug}}">
                                                        <input type="checkbox" class="permissions_update" {{ (array_key_exists($permission->id,$role->permissions_array)) ? (($role->permissions_array[$permission->id]->status == 1) ? 'checked' : '') : '' }}>{{$permission->name}}
                                                        <input type="hidden" class="permission_status" name="permissions[{{$object->slug.'_'.$permission->slug}}][status]" value="{{ (array_key_exists($permission->id,$role->permissions_array)) ? (($role->permissions_array[$permission->id]->status == 1) ? '1' : '0') : '0' }}">
                                                        <input type="hidden" name="permissions[{{$object->slug.'_'.$permission->slug}}][id]" value="{{ (array_key_exists($permission->id,$role->permissions_array)) ?  $role->permissions_array[$permission->id]->id : '0' }}">
                                                        <input type="hidden" name="permissions[{{$object->slug.'_'.$permission->slug}}][permission_id]" value="{{ $permission->id }}">
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('after_footer')
@parent
<script type="text/javascript">
    $(document).ready(function() {
        $('.permissions_update').change(function(){
            if($(this).prop('checked')){
                $(this).closest('div').find('input[type="hidden"].permission_status').val(1);
            }else{
                $(this).closest('div').find('input[type="hidden"].permission_status').val(0);
            }
        });

    });
</script>
@endsection
