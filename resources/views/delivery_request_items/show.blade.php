@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Delivery Request Items' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_request_items.delivery_request_items.destroy', $deliveryRequestItems->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_request_items.delivery_request_items.index') }}" class="btn btn-primary" title="Show All Delivery Request Items">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_request_items.delivery_request_items.create') }}" class="btn btn-success" title="Create New Delivery Request Items">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_request_items.delivery_request_items.edit', $deliveryRequestItems->id ) }}" class="btn btn-primary" title="Edit Delivery Request Items">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Request Items" onclick="return confirm(&quot;Delete Delivery Request Items??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Delivery Request</dt>
            <dd>{{ optional($deliveryRequestItems->deliveryRequest)->ref }}</dd>
            <dt>Ref</dt>
            <dd>{{ $deliveryRequestItems->ref }}</dd>
            <dt>Description</dt>
            <dd>{{ $deliveryRequestItems->description }}</dd>
            <dt>Qty</dt>
            <dd>{{ $deliveryRequestItems->qty }}</dd>
            <dt>Price</dt>
            <dd>{{ $deliveryRequestItems->price }}</dd>
            <dt>Total</dt>
            <dd>{{ $deliveryRequestItems->total }}</dd>

        </dl>

    </div>
</div>

@endsection