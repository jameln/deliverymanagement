@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Delivery Agents</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('delivery_agents.delivery_agents.create') }}" class="btn btn-success" title="Create New Delivery Agents">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($deliveryAgentsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Delivery Agents Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Delivery Company</th>
                            <th>Phone</th>
                            <th>Cin</th>
                            <th>Dln</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryAgentsObjects as $deliveryAgents)
                        <tr>
                            <td>{{ optional($deliveryAgents->deliveryCompany)->company_name }}</td>
                            <td>{{ $deliveryAgents->phone }}</td>
                            <td>{{ $deliveryAgents->cin }}</td>
                            <td>{{ $deliveryAgents->dln }}</td>

                            <td>

                                <form method="POST" action="{!! route('delivery_agents.delivery_agents.destroy', $deliveryAgents->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_agents.delivery_agents.show', $deliveryAgents->id ) }}" class="btn btn-info" title="Show Delivery Agents">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('delivery_agents.delivery_agents.edit', $deliveryAgents->id ) }}" class="btn btn-primary" title="Edit Delivery Agents">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Agents" onclick="return confirm(&quot;Delete Delivery Agents?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $deliveryAgentsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection