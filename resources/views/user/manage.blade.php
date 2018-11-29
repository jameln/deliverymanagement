@extends('layouts.admin')
@section('title',  __('user.utilisateurs'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">contacts</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">{{ __('user.utilisateurs')}}</h4-->

                    <div class="card">
                        <div class="card-header card-header-tabs" data-background-color="purple">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title"><h4 class="card-title">{{ __('user.utilisateurs')}}</h4></span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="rtl.html#admin" data-toggle="tab">
                                                <i class="material-icons">group</i> {{ __('user.moderateurs')}}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="rtl.html#familles" data-toggle="tab">
                                                <i class="material-icons">wc</i> {{ __('user.parents')}}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="rtl.html#parrain" data-toggle="tab">
                                                <i class="material-icons">person</i> {{ __('user.parrain')}}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="rtl.html#adherents" data-toggle="tab">
                                                <i class="material-icons">group_add</i> {{ __('user.adherents')}}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="rtl.html#admission" data-toggle="tab">
                                                <i class="material-icons">group_add</i> {{ __('user.admission')}}
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="admin">
                                <div class="material-datatables">
                                    <div class="toolbar">
                                        <button class="btn btn-success" onclick="openmodal_addcompte_admin();">
                                            <span class="btn-label"><i class="material-icons">add_circle_outline</i></span>
                                            {{ __('user.ajouter_compte')}}
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                    <table id="datatables_user_admin" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="disabled-sorting">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes" >
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>{{ __('user.nom_prenom')}}</th>
                                                <th>{{ __('user.email')}}</th>
                                                <th>{{ __('user.date_naissance')}}</th>
                                                <th>{{ __('user.type_compte')}}</th>
                                                <th>{{ __('user.status')}}</th>
                                                <th class="disabled-sorting text-right">{{ __('user.actions')}}</th>
                                            </tr>

                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>{{ __('user.nom_prenom')}}</th>
                                                <th>{{ __('user.email')}}</th>
                                                <th>{{ __('user.date_naissance')}}</th>
                                                <th>{{ __('user.type_compte')}}</th>
                                                <th>{{ __('user.status')}}</th>
                                                <th class="text-right">{{ __('user.actions')}}</th>
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
                                                <td>foulen ben foulen</td>
                                                <td>foulen@gmail.com</td>
                                                <td>1990/02/25</td>
                                                <td>editeur</td>
                                                <td class="td-actions text-right">
                                                    <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                    <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                    <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                                </td>
                                            </tr-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="familles">
                                <div class="material-datatables">

                                    <table id="datatables_user_famille" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="disabled-sorting">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </th>

                                            <th>{{ __('user.nom_prenom')}}</th>
                                            <th>{{ __('user.login')}}</th>
                                            <th>{{ __('user.email')}}</th>
                                            <th>{{ __('user.tel')}}</th>
                                            <th>{{ __('user.etat')}}</th>

                                            <th class="disabled-sorting text-right">{{ __('user.actions')}}</th>
                                        </tr>

                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th></th>

                                            <th>{{ __('user.nom_prenom')}}</th>
                                            <th>{{ __('user.login')}}</th>
                                            <th>{{ __('user.email')}}</th>
                                            <th>{{ __('user.tel')}}</th>
                                            <th>{{ __('user.etat')}}</th>

                                            <th class="text-right">{{ __('user.actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen ben foulen</td>
                                            <td>admin_foulen</td>
                                            <td>foulen@gmail.com</td>
                                            <td>25753159</td>
                                            <td>En cours</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen1 ben foulen1</td>
                                            <td>admin_foulen1</td>
                                            <td>foulen1@gmail.com</td>
                                            <td>95369842</td>
                                            <td>En attente</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="parrain">
                                <div class="material-datatables">

                                    <table id="datatables_user_famille" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="disabled-sorting">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </th>

                                            <th>{{ __('user.nom_prenom')}}</th>
                                            <th>{{ __('user.login')}}</th>
                                            <th>{{ __('user.email')}}</th>
                                            <th>{{ __('user.tel')}}</th>
                                            <th>{{ __('user.nbre_orphelin')}}</th>

                                            <th class="disabled-sorting text-right">{{ __('user.actions')}}</th>
                                        </tr>

                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th></th>

                                            <th>{{ __('user.nom_prenom')}}</th>
                                            <th>{{ __('user.login')}}</th>
                                            <th>{{ __('user.email')}}</th>
                                            <th>{{ __('user.tel')}}</th>
                                            <th>{{ __('user.nbre_orphelin')}}</th>

                                            <th class="text-right">{{ __('user.actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen ben foulen</td>
                                            <td>admin_foulen</td>
                                            <td>foulen@gmail.com</td>
                                            <td>97533059</td>
                                            <td>1</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen1 ben foulen1</td>
                                            <td>admin_foulen1</td>
                                            <td>foulen1@gmail.com</td>
                                            <td>55360042</td>
                                            <td>3</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="adherents">
                                <div class="material-datatables">

                                    <table id="datatables_user_famille" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="disabled-sorting">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </th>

                                            <th>{{ __('user.nom_prenom')}}</th>
                                            <th>{{ __('user.login')}}</th>
                                            <th>{{ __('user.email')}}</th>
                                            <th>{{ __('user.tel')}}</th>
                                            <th>{{ __('user.etat')}}</th>

                                            <th class="disabled-sorting text-right">{{ __('user.actions')}}</th>
                                        </tr>

                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th></th>

                                            <th>{{ __('user.nom_prenom')}}</th>
                                            <th>{{ __('user.login')}}</th>
                                            <th>{{ __('user.email')}}</th>
                                            <th>{{ __('user.tel')}}</th>
                                            <th>{{ __('user.etat')}}</th>

                                            <th class="text-right">{{ __('user.actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen ben foulen</td>
                                            <td>admin_foulen</td>
                                            <td>foulen@gmail.com</td>
                                            <td>97533059</td>
                                            <td class="text-success">Active</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen1 ben foulen1</td>
                                            <td>admin_foulen1</td>
                                            <td>foulen1@gmail.com</td>
                                            <td>55360042</td>
                                            <td class="text-danger">Non active</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="admission">
                                <div class="material-datatables">

                                    <table id="datatables_user_famille" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="disabled-sorting">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="optionsCheckboxes" >
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>{{ __('user.nom_prenom')}}</th>
                                                <th>{{ __('user.email')}}</th>
                                                <th>{{ __('user.tel')}}</th>
                                                <th>{{ __('user.type_compte')}}</th>
                                                <th class="disabled-sorting text-right">{{ __('user.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>{{ __('user.nom_prenom')}}</th>
                                                <th>{{ __('user.email')}}</th>
                                                <th>{{ __('user.tel')}}</th>
                                                <th>{{ __('user.type_compte')}}</th>
                                                <th class="text-right">{{ __('user.actions')}}</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>foulen ben foulen</td>
                                            <td>admin_foulen</td>
                                            <td>foulen@gmail.com</td>
                                            <td>97533059</td>
                                            <td class="text-success">Parrain</td>

                                            <td class="td-actions text-right">
                                                <a href="#" class="btn btn-info " rel="tooltip" title="{{__('visite.table-voir')}}" onclick="openmodal_viewpost(1)"><i class="material-icons">remove_red_eye</i></a>
                                                <a href="#" class="btn btn-success " rel="tooltip" title="{{__('visite.table-modifier')}}" onclick="openmodal_addpost()"><i class="material-icons">mode_edit</i></a>
                                                <a href="#" class="btn btn-danger " rel="tooltip" title="{{__('visite.table-supprimer')}}" onclick="openmodal_deletepost(1)"><i class="material-icons">delete_forever</i></a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/div>
        </div-->


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

    $(document).ready(function(){

        $('#datatables_user_admin').DataTable({
            "ajax":'{{ url('/api/users?format=datatable') }}',
            "columns": [
                { "data": "id", render: function ( data, type, row ) { return '<div class="checkbox"><label><input type="checkbox" name="optionsCheckboxes" value="'+data+'" ></label></div>'; }},
                { "data": "name"},
                { "data": "email"},
                { "data": "updated_at"},
                { "data": "role"},
                { "data": "status_name"},
                { "data": "id", className: "td-actions text-right", render: function ( data, type, row ) { return '<a href="#" class="btn btn-info " rel="tooltip" title="View" onclick="openmodal_viewuser('+data+')"><i class="material-icons">remove_red_eye</i></a> \
                    <a href="#" class="btn btn-success " rel="tooltip" title="Edit" onclick="openmodal_edituser('+data+')"><i class="material-icons">mode_edit</i></a> \
                    <a href="#" class="btn btn-danger " rel="tooltip" title="Delete" onclick="openmodal_deleteuser('+data+')"><i class="material-icons">delete_forever</i></a>'; }  }
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
                searchPlaceholder: "{{ __('famille.recherche')}}",
            },
            "columnDefs": [ {
                "targets": 0,
                "orderable": false
            }
            ]
        });



    });

    function openmodal_addcompte_admin(){
        $.get('ajouter_admin_ajax',function(data){
            swal({
                title: '{{ __("user.ajouter_compte")}}',
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

   function openmodal_addcompte_autre(){
       $.get('ajouter_admin_autre_ajax',function(data){
           swal({
               title: '{{ __("user.ajouter_compte")}}',
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

    function openmodal_editcompteadmin(id){
        $.get('modifier_admin_ajax'+id,function(data) {
            swal({
                title: 'Modifier admin',
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

    function openmodal_viewuser(id){
        $.get('{{ url('user/view')}}/'+id,function(data) {
            swal({
                title: 'View post',
                html: data,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            })
        });
    }


    function openmodal_deletecompte_admin(id){
        swal({
            title: '{{ __("user.are_you_sure")}}؟',
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