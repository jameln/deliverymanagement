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
                <h4 class="mt-5 mb-5">Sender Deliveries</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sender_deliveries.sender_deliveries.create') }}" class="btn btn-success" title="Create New Sender Deliveries">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($senderDeliveriesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Sender Deliveries Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Delivery Company</th>
                            <th>Sender Company</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($senderDeliveriesObjects as $senderDeliveries)
                        <tr>
                            <td>{{ optional($senderDeliveries->deliveryCompany)->company_name }}</td>
                            <td>{{ optional($senderDeliveries->senderCompany)->company_name }}</td>
                            <td>{{ $senderDeliveries->status }}</td>

                            <td>

                                <form method="POST" action="{!! route('sender_deliveries.sender_deliveries.destroy', $senderDeliveries->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sender_deliveries.sender_deliveries.show', $senderDeliveries->id ) }}" class="btn btn-info" title="Show Sender Deliveries">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sender_deliveries.sender_deliveries.edit', $senderDeliveries->id ) }}" class="btn btn-primary" title="Edit Sender Deliveries">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sender Deliveries" onclick="return confirm(&quot;Delete Sender Deliveries?&quot;)">
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
            {!! $senderDeliveriesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection