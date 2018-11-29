@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($deliveryDeposits->name) ? $deliveryDeposits->name : 'Delivery Deposits' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_deposits.delivery_deposits.destroy', $deliveryDeposits->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_deposits.delivery_deposits.index') }}" class="btn btn-primary" title="Show All Delivery Deposits">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_deposits.delivery_deposits.create') }}" class="btn btn-success" title="Create New Delivery Deposits">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_deposits.delivery_deposits.edit', $deliveryDeposits->id ) }}" class="btn btn-primary" title="Edit Delivery Deposits">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Deposits" onclick="return confirm(&quot;Delete Delivery Deposits??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Delivery Company</dt>
            <dd>{{ optional($deliveryDeposits->deliveryCompany)->company_name }}</dd>
            <dt>Name</dt>
            <dd>{{ $deliveryDeposits->name }}</dd>
            <dt>Country</dt>
            <dd>{{ $deliveryDeposits->country }}</dd>
            <dt>County</dt>
            <dd>{{ $deliveryDeposits->county }}</dd>
            <dt>City</dt>
            <dd>{{ $deliveryDeposits->city }}</dd>
            <dt>State</dt>
            <dd>{{ $deliveryDeposits->state }}</dd>
            <dt>Address</dt>
            <dd>{{ $deliveryDeposits->address }}</dd>
            <dt>Lat</dt>
            <dd>{{ $deliveryDeposits->lat }}</dd>
            <dt>Lng</dt>
            <dd>{{ $deliveryDeposits->lng }}</dd>
            <dt>Phone</dt>
            <dd>{{ $deliveryDeposits->phone }}</dd>
            <dt>Fax</dt>
            <dd>{{ $deliveryDeposits->fax }}</dd>
            <dt>Created At</dt>
            <dd>{{ $deliveryDeposits->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $deliveryDeposits->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection