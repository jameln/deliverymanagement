@extends('layouts.app')

@section('content')

<div class="panel panel-default">
<div class="message"></div>
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Sender Deliveries' }}</h4>
        </span>

        <div class="pull-left clearfix" style="margin-left: 30px;">
            <select class="form-control" id="select-status">
                <option>En attente</option>
                <option>En depot</option>
                <option>En route</option>
                <option>Livré</option>
            </select>
        </div>
        <input type="hidden" id="url" value="{{ route('sender_deliveries.sender_deliveries.updatestatus', $senderDeliveries->id) }}">
        <input type="hidden" id="status" value="{{ $senderDeliveries->status }}">

        <div class="pull-right">

            <form method="POST" action="{!! route('sender_deliveries.sender_deliveries.destroy', $senderDeliveries->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sender_deliveries.sender_deliveries.index') }}" class="btn btn-primary" title="Show All Sender Deliveries">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sender_deliveries.sender_deliveries.create') }}" class="btn btn-success" title="Create New Sender Deliveries">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sender_deliveries.sender_deliveries.edit', $senderDeliveries->id ) }}" class="btn btn-primary" title="Edit Sender Deliveries">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sender Deliveries" onclick="return confirm(&quot;Delete Sender Deliveries??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Delivery Company</dt>
            <dd>{{ optional($senderDeliveries->deliveryCompany)->company_name }}</dd>
            <dt>Sender Company</dt>
            <dd>{{ optional($senderDeliveries->senderCompany)->company_name }}</dd>
            <dt>Status</dt>
            <dd id="statussetted" >{{ $senderDeliveries->status }}</dd>
            <dt>Note</dt>
            <dd>{{ $senderDeliveries->note }}</dd>
            <dt>Created At</dt>
            <dd>{{ $senderDeliveries->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $senderDeliveries->updated_at }}</dd>

        </dl>

    </div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        var status = $('#status').val();
        $("#select-status").val(status);
        $("#select-status").on('change',function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                url: $("#url").val(),
                type: "patch",
                data: {
                    _token: CSRF_TOKEN,
                    'status': $('#select-status').val()
                },
                success: function() {
                    $('.message').show();
                    $('.message').html('<div class="alert alert-success" role="alert">Success updated status!</div>');
                    $('#statussetted').html($('#select-status').val()); 
                    setTimeout(function(){
                       $('.message').hide();
                    }, 2000);
                },
                error: function(){
                    $('.message').html('<div class="alert alert-danger" role="alert">Failed updated status!</div>');
                    setTimeout(function(){
                       $('.message').hide();
                    }, 2000);

                }
            });
        })
    });
</script>

@endsection