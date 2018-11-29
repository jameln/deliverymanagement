@extends('layouts.admin')
@section('title', 'Posts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Posts List</h4>
                    <div class="toolbar">
                        <button class="btn btn-info" onclick="openmodal_addpost()">
                            <span class="btn-label"><i class="material-icons">add_circle_outline</i></span>
                            Add new post
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th class="disabled-sorting">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" >
                                        </label>
                                    </div>
                                </th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <!--tr>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="optionsCheckboxes" >
                                        </label>
                                    </div>
                                </td>
                                <td><div class="img-container" ><img src="public/img/image_placeholder.jpg"></div></td>
                                <td>Title of post herer</td>
                                <td>Description contetnt of post here Description contetnt of...</td>
                                <td>Visible</td>
                                <td>2011/04/25</td>
                                <td class="td-actions text-right">
                                    <a href="#" class="btn btn-info " rel="tooltip" title="View" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                    <a href="#" class="btn btn-success " rel="tooltip" title="Edit" onclick="openmodal_editpost(1)"><i class="material-icons">mode_edit</i></a>
                                    <a href="#" class="btn btn-danger " rel="tooltip" title="Delete" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                </td>
                            </tr-->
                            </tbody>
                        </table>
                    </div>
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
        $('#datatables').DataTable({
            "ajax":'{{ url('/api/articles?format=datatable') }}',
            "columns": [
                { "data": "id", render: function ( data, type, row ) { return '<div class="checkbox"><label><input type="checkbox" name="optionsCheckboxes" value="'+data+'" ></label></div>'; }},
                { "data": null, render: function ( data, type, row ) { return '<div class="img-container" ><img src="public/img/image_placeholder.jpg"></div>'; }  },
                { "data": "title" },
                { "data": "content", render: function ( data, type, row ) { return data.substr(0, 50)+'...'; }},
                { "data": "status" },
                { "data": "updated_at" },
                { "data": "id", className: "td-actions text-right", render: function ( data, type, row ) { return '<a href="#" class="btn btn-info " rel="tooltip" title="View" onclick="openmodal_viewpost('+data+')"><i class="material-icons">remove_red_eye</i></a> \
                    <a href="#" class="btn btn-success " rel="tooltip" title="Edit" onclick="openmodal_editpost('+data+')"><i class="material-icons">mode_edit</i></a> \
                    <a href="#" class="btn btn-danger " rel="tooltip" title="Delete" onclick="openmodal_deletepost('+data+')"><i class="material-icons">delete_forever</i></a>'; }  }
            ],
            "dom": "<'row'<'col-md-2'l><'col-md-7'B><'col-md-3'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            buttons: [
                { extend: 'excel', text: '<i class="material-icons">grid_on</i> Excel', className: 'btn-warning' },
                { extend: 'pdf', text: '<i class="material-icons">picture_as_pdf</i> PDF', className: 'btn-warning' },
                { extend: 'colvis', text: '<i class="material-icons">view_column</i> {{ __("family.column_visibility")}}', className: ' ' },
                { extend: 'collection', text: '<i class="material-icons">settings</i> Action', className: 'btn-rose',
                    buttons: [
                        {text: 'Delete selected'},
                        {text: 'Make visible'},
                        {text: 'Make invisible'}
                    ]
                }
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },
            "columnDefs": [ {
                "targets": 0,
                "orderable": false
                }
            ]
        });

    });


    function openmodal_addpost(){
        $.get('posts/add_ajax',function(data){
            swal({
                title: 'Add new post',
                html: data ,
                onOpen: function() {
                    $(".datetimepicker").datetimepicker({
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-chevron-up",
                            down: "fa fa-chevron-down",
                            previous: "fa fa-chevron-left",
                            next: "fa fa-chevron-right",
                            today: "fa fa-screenshot",
                            clear: "fa fa-trash",
                            close: "fa fa-remove"
                        }
                    });
                },
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                swal({
                    type: 'success',
                    html: 'You entered: <strong>' +
                    $('#input-field').val() +
                    '</strong>',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false

                })
            }).catch(swal.noop)

        });


    }

    function openmodal_editpost(id){
        $.get('posts/edit_ajax/'+id,function(data) {
            swal({
                title: 'Edit post',
                html: data,
                onOpen: function () {
                    $(".datetimepicker").datetimepicker({
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-chevron-up",
                            down: "fa fa-chevron-down",
                            previous: "fa fa-chevron-left",
                            next: "fa fa-chevron-right",
                            today: "fa fa-screenshot",
                            clear: "fa fa-trash",
                            close: "fa fa-remove"
                        }
                    });
                },
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
                swal({
                    type: 'success',
                    html: 'You entered: <strong>' +
                    $('#input-field').val() +
                    '</strong>',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false

                })
            }).catch(swal.noop)
        });
    }

    function openmodal_viewpost(id){
        $.get('posts/view_ajax/'+id,function(data) {
            swal({
                title: 'View post',
                html: data,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            })
        });
    }

    function openmodal_deletepost(id){
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, delete it!',
            buttonsStyling: false
        }).then(function() {
            swal({
                title: 'Deleted!',
                text: 'Your file has been deleted.',
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
            })
        }).catch(swal.noop)
    }

</script>
@endsection