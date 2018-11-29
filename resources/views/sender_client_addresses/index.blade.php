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
                <h4 class="mt-5 mb-5">Sender Client Addresses</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sender_client_addresses.sender_client_addresses.create') }}" class="btn btn-success" title="Create New Sender Client Addresses">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($senderClientAddressesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Sender Client Addresses Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Sender Client</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>County</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Address</th>
                            <th>Lat</th>
                            <th>Lng</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($senderClientAddressesObjects as $senderClientAddresses)
                        <tr>
                            <td>{{ optional($senderClientAddresses->senderClient)->name }}</td>
                            <td>{{ $senderClientAddresses->name }}</td>
                            <td>{{ $senderClientAddresses->country }}</td>
                            <td>{{ $senderClientAddresses->county }}</td>
                            <td>{{ $senderClientAddresses->city }}</td>
                            <td>{{ $senderClientAddresses->state }}</td>
                            <td>{{ $senderClientAddresses->address }}</td>
                            <td>{{ $senderClientAddresses->lat }}</td>
                            <td>{{ $senderClientAddresses->lng }}</td>

                            <td>

                                <form method="POST" action="{!! route('sender_client_addresses.sender_client_addresses.destroy', $senderClientAddresses->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sender_client_addresses.sender_client_addresses.show', $senderClientAddresses->id ) }}" class="btn btn-info" title="Show Sender Client Addresses">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sender_client_addresses.sender_client_addresses.edit', $senderClientAddresses->id ) }}" class="btn btn-primary" title="Edit Sender Client Addresses">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sender Client Addresses" onclick="return confirm(&quot;Delete Sender Client Addresses?&quot;)">
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
            {!! $senderClientAddressesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection