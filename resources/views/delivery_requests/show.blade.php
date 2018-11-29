@extends('layouts.app')

@section('content')

<div class="panel panel-default">
<input type="hidden" id="url" value="{{ route('delivery_requests.delivery_requests.setstatus', $deliveryRequests->id) }}">
<input type="hidden" id="status" value="{{ optional($deliveryRequests->statuses)->label }}">
<div class="message"></div>

    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Delivery Requests' }}</h4>
        </span>
        <div class="pull-left clearfix" style="margin-left: 30px;">
            <select class="form-control" id="select-status">
                <option value="0" disabled selected>{{__('Changer le status')}}</option>
                    @foreach($statuses as $key=>$value)
                        <option value="{{ $value->id }}">{{ $value->label }}</option>
                    @endforeach
            </select>
        </div>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_requests.delivery_requests.destroy', $deliveryRequests->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_requests.delivery_requests.index') }}" class="btn btn-primary" title="Show All Delivery Requests">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_requests.delivery_requests.create') }}" class="btn btn-success" title="Create New Delivery Requests">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_requests.delivery_requests.edit', $deliveryRequests->id ) }}" class="btn btn-primary" title="Edit Delivery Requests">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Requests" onclick="return confirm(&quot;Delete Delivery Requests??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Ref</dt>
            <dd>{{ $deliveryRequests->ref }}</dd>
            <dt>Sender Company</dt>
            <dd>{{ optional($deliveryRequests->senderCompany)->company_name }}</dd>
            <dt>Sender Site</dt>
            <dd>{{ optional($deliveryRequests->senderSite)->name }}</dd>
            <dt>Sender Client</dt>
            <dd>{{ optional($deliveryRequests->senderClient)->name }}</dd>
            <dt>Sender Client Address</dt>
            <dd>{{ optional($deliveryRequests->senderClientAddress)->name }}</dd>
            <dt>Delivery Company</dt>
            <dd>{{ optional($deliveryRequests->deliveryCompany)->company_name }}</dd>
            <dt>Pricedelivery Price</dt>
            <dd>{{ $deliveryRequests->pricedelivery_price }}</dd>
            <dt>Total To Pay</dt>
            <dd>{{ $deliveryRequests->total_to_pay }}</dd>
            <dt>Currency</dt>
            <dd>{{ optional($deliveryRequests->currency)->name }}</dd>
            <dt>Status</dt>
            <dd>{{ optional($deliveryRequests->statuses)->label }}</dd>
            <dt>Created At</dt>
            <dd>{{ $deliveryRequests->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $deliveryRequests->updated_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $deliveryRequests->description }}</dd>

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
                    'statuses_id': $('#select-status').val()
                },
                success: function() {
                    $('.message').show();
                    $('.message').html('<div class="alert alert-success" role="alert">Success updated status!</div>');
                    setTimeout(function(){
                       $('.message').hide();
                       location.reload();
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