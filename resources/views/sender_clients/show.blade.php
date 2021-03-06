@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($senderClients->name) ? $senderClients->name : 'Sender Clients' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sender_clients.sender_clients.destroy', $senderClients->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sender_clients.sender_clients.index') }}" class="btn btn-primary" title="Show All Sender Clients">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sender_clients.sender_clients.create') }}" class="btn btn-success" title="Create New Sender Clients">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sender_clients.sender_clients.edit', $senderClients->id ) }}" class="btn btn-primary" title="Edit Sender Clients">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sender Clients" onclick="return confirm(&quot;Delete Sender Clients??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Sender Company</dt>
            <dd>{{ optional($senderClients->senderCompany)->company_name }}</dd>
            <dt>Name</dt>
            <dd>{{ $senderClients->name }}</dd>
            <dt>Last Name</dt>
            <dd>{{ $senderClients->last_name }}</dd>
            <dt>Email</dt>
            <dd>{{ $senderClients->email }}</dd>
            <dt>Phone</dt>
            <dd>{{ $senderClients->phone }}</dd>
            <dt>Phone2</dt>
            <dd>{{ $senderClients->phone2 }}</dd>
            <dt>Cin</dt>
            <dd>{{ $senderClients->cin }}</dd>
            <dt>Created At</dt>
            <dd>{{ $senderClients->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $senderClients->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection