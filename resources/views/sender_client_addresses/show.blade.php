@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($senderClientAddresses->name) ? $senderClientAddresses->name : 'Sender Client Addresses' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sender_client_addresses.sender_client_addresses.destroy', $senderClientAddresses->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sender_client_addresses.sender_client_addresses.index') }}" class="btn btn-primary" title="Show All Sender Client Addresses">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sender_client_addresses.sender_client_addresses.create') }}" class="btn btn-success" title="Create New Sender Client Addresses">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sender_client_addresses.sender_client_addresses.edit', $senderClientAddresses->id ) }}" class="btn btn-primary" title="Edit Sender Client Addresses">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sender Client Addresses" onclick="return confirm(&quot;Delete Sender Client Addresses??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Sender Client</dt>
            <dd>{{ optional($senderClientAddresses->senderClient)->name }}</dd>
            <dt>Name</dt>
            <dd>{{ $senderClientAddresses->name }}</dd>
            <dt>Country</dt>
            <dd>{{ $senderClientAddresses->country }}</dd>
            <dt>County</dt>
            <dd>{{ $senderClientAddresses->county }}</dd>
            <dt>City</dt>
            <dd>{{ $senderClientAddresses->city }}</dd>
            <dt>State</dt>
            <dd>{{ $senderClientAddresses->state }}</dd>
            <dt>Address</dt>
            <dd>{{ $senderClientAddresses->address }}</dd>
            <dt>Lat</dt>
            <dd>{{ $senderClientAddresses->lat }}</dd>
            <dt>Lng</dt>
            <dd>{{ $senderClientAddresses->lng }}</dd>

        </dl>

    </div>
</div>

@endsection