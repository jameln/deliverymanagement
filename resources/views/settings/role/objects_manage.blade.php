@extends('layouts.admin')
@section('title', __('global.settings') )

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('settings.menu')

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="rose">
                    {{__('global.objects_list')}}
                </div>
                <div class="card-content">

                    <div class="row">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>{{__('global.objects_name')}}</th>
                                        <th>{{__('global.objects_slug')}}</th>
                                        <th>{{__('global.createdAt')}}</th>
                                        <th>{{__('global.updatedAt')}}</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $objects as $object)
                                    <tr>
                                        <td class="text-center">{{$object->id}}</td>
                                        <td>{{$object->name}}</td>
                                        <td>{{$object->slug}}</td>
                                        <td>{{$object->created_at}}</td>
                                        <td>{{($object->updated_at)}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('settings.objects_edit', ['id'=>$object->id])}}" class="btn btn-warning " rel="tooltip" title="{{__('global.manage')}}" ><i class="material-icons">settings</i></a>
                                            <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('global.delete')}}" onclick="openmodal_deleterole({{$object->id}})"><i class="material-icons">delete_forever</i></a>
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
                    {{__('global.objects_add')}}
                </div>
                <div class="card-content">
                    <form method="post" action="{{ route('settings.objects_add') }}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="label-control" for="objects_add_name">{{__('global.objects_name')}}</label>
                            <input type="text" name="objects_add_name" id="objects_add_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="label-control" for="objects_add_slug">{{__('global.objects_slug')}}</label>
                            <input type="text" id="objects_add_slug" class="form-control" name="objects_add_slug" >
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
                        url: '{{ url('/api/objects') }}/'+roleid,
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
        $('#objects_add_name').keyup(function(){
            $('#objects_add_slug').val(slugify($(this).val()));
        });

    });


</script>
@endsection
