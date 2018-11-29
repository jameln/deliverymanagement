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
                <h4 class="mt-5 mb-5">Sender Clients</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sender_clients.sender_clients.create') }}" class="btn btn-success" title="Create New Sender Clients">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($senderClientsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Sender Clients Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Sender Company</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Phone2</th>
                            <th>Cin</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($senderClientsObjects as $senderClients)
                        <tr>
                            <td>{{ optional($senderClients->senderCompany)->company_name }}</td>
                            <td>{{ $senderClients->name }}</td>
                            <td>{{ $senderClients->last_name }}</td>
                            <td>{{ $senderClients->email }}</td>
                            <td>{{ $senderClients->phone }}</td>
                            <td>{{ $senderClients->phone2 }}</td>
                            <td>{{ $senderClients->cin }}</td>

                            <td>

                                <form method="POST" action="{!! route('sender_clients.sender_clients.destroy', $senderClients->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sender_clients.sender_clients.show', $senderClients->id ) }}" class="btn btn-info" title="Show Sender Clients">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sender_clients.sender_clients.edit', $senderClients->id ) }}" class="btn btn-primary" title="Edit Sender Clients">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sender Clients" onclick="return confirm(&quot;Delete Sender Clients?&quot;)">
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
            {!! $senderClientsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection