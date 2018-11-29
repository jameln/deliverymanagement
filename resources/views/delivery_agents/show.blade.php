@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Delivery Agents' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_agents.delivery_agents.destroy', $deliveryAgents->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_agents.delivery_agents.index') }}" class="btn btn-primary" title="Show All Delivery Agents">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_agents.delivery_agents.create') }}" class="btn btn-success" title="Create New Delivery Agents">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_agents.delivery_agents.edit', $deliveryAgents->id ) }}" class="btn btn-primary" title="Edit Delivery Agents">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Agents" onclick="return confirm(&quot;Delete Delivery Agents??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Delivery Company</dt>
            <dd>{{ optional($deliveryAgents->deliveryCompany)->company_name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $deliveryAgents->phone }}</dd>
            <dt>Cin</dt>
            <dd>{{ $deliveryAgents->cin }}</dd>
            <dt>Dln</dt>
            <dd>{{ $deliveryAgents->dln }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $deliveryAgents->photo) }}</dd>
            <dt>Created At</dt>
            <dd>{{ $deliveryAgents->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $deliveryAgents->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection