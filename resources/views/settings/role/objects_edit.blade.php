@extends('layouts.admin')
@section('title', __('global.settings') )

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('settings.menu')

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="rose">
                    {{__('global.permissions_list_of',['name'=>$object->name])}}
                </div>
                <div class="card-content">

                    <div class="row">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>{{__('global.permissions_name')}}</th>
                                        <th>{{__('global.permissions_slug')}}</th>
                                        <th>{{__('global.createdAt')}}</th>
                                        <th>{{__('global.updatedAt')}}</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $object->permissions as $permission)
                                    <tr>
                                        <td class="text-center">{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        <td>{{($permission->created_at)}}</td>
                                        <td>{{($permission->updated_at)}}</td>
                                        <td class="td-actions text-right">
                                            <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('global.delete')}}" onclick="openmodal_deleterole({{$permission->id}})"><i class="material-icons">delete_forever</i></a>
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
                    {{__('global.permissions_add')}}
                </div>
                <div class="card-content">
                    <form method="post" action="{{ route('settings.permissions_add',['object_id' => $object->id]) }}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="label-control" for="permissions_add_name">{{__('global.permissions_name')}}</label>
                            <input type="text" name="permissions_add_name" id="permissions_add_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="label-control" for="permissions_add_slug">{{__('global.permissions_slug')}}</label>
                            <input type="text" id="permissions_add_slug" class="form-control" name="permissions_add_slug" >
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
            preConfirm: function () {
                return new Promise(function (resolve, reject) {

                    $.ajax({
                        url: '{{ url('/api/permissions') }}/'+roleid,
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
        $('#permissions_add_name').keyup(function(){
            $('#permissions_add_slug').val(slugify($(this).val()));
        });

    });


</script>
@endsection
