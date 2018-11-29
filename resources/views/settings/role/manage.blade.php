@extends('layouts.admin')
@section('title', __('global.settings') )

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('settings.menu')

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="rose">
                    {{__('global.roles_list')}}
                </div>
                <div class="card-content">

                    <div class="row">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>{{__('global.roles_name')}}</th>
                                        <th>{{__('global.roles_description')}}</th>
                                        <th class="text-right">{{__('global.roles_actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $roles as $role)
                                    <tr>
                                        <td class="text-center">{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('settings.roles_edit',['id'=>$role->id])}}" class="btn btn-warning " rel="tooltip" title="{{__('global.manage_role')}}" ><i class="material-icons">settings</i></a>
                                            <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('global.delete')}}" onclick="openmodal_deleterole({{$role->id}})"><i class="material-icons">delete_forever</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="rose">
                    {{__('global.roles_add')}}
                </div>
                <div class="card-content">
                    <form method="post" action="{{ route('settings.roles_add') }}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="label-control" for="roles_add_name">{{__('global.roles_name')}}</label>
                            <input type="text" name="roles_add_name" id="roles_add_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="label-control" for="roles_add_description">{{__('global.roles_desciption')}}</label>
                            <textarea id="roles_add_description" class="form-control" name="roles_add_description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-rose btn-fill">{{__('global.add')}}</button>
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
    function openmodal_deleterole(id){
        var roleid = id;
        swal({
            title: '{{ __('global.role_delete_sure') }}',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: '{{ __('global.yes_delete') }}',
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            onOpen : function(){
              $('#select_role_migrate').selectpicker();
            },
            html:'  <select name="family[status]" id="select_role_migrate" data-style="select-with-transition" title="{{ __('global.shose_role_migrate') }}" > \
                        @foreach( $roles as $role) <option value="{{$role->id}}">{{$role->name}} </option> @endforeach \
                    </select><br><br>',
            preConfirm: function () {
                return new Promise(function (resolve, reject) {

                    $.ajax({
                        url: '{{ url('/api/roles') }}/'+roleid+'/'+$('#select_role_migrate').val(),
                        type: 'DELETE',
                        success: function(result) {
                            resolve();
                        },
                        error:function(){
                            reject('{{ __('global.internet_error_tray_again') }}')
                        }
                    });
            })}

        }).then(function() {

            swal({
                title: '{{ __('global.deleted') }}',
                text: '{{ __('global.object_deleted') }}',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            }).then(function() {
                location.reload();

            });
        }).catch(swal.noop)
    }


    $(document).ready(function() {


    });
</script>
@endsection
