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
                <h4 class="mt-5 mb-5">Delivery Requests</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('delivery_requests.delivery_requests.create') }}" class="btn btn-success" title="Create New Delivery Requests">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($deliveryRequestsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Delivery Requests Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Ref</th>
                            <th>Sender Company</th>
                            <th>Sender Site</th>
                            <th>Sender Client</th>
                            <th>Sender Client Address</th>
                            <th>Delivery Company</th>
                            <th>Pricedelivery Price</th>
                            <th>Total To Pay</th>
                            <th>Currency</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryRequestsObjects as $deliveryRequests)
                        <tr>
                            <td>{{ $deliveryRequests->ref }}</td>
                            <td>{{ optional($deliveryRequests->senderCompany)->company_name }}</td>
                            <td>{{ optional($deliveryRequests->senderSite)->name }}</td>
                            <td>{{ optional($deliveryRequests->senderClient)->name }}</td>
                            <td>{{ optional($deliveryRequests->senderClientAddress)->name }}</td>
                            <td>{{ optional($deliveryRequests->deliveryCompany)->company_name }}</td>
                            <td>{{ $deliveryRequests->pricedelivery_price }}</td>
                            <td>{{ $deliveryRequests->total_to_pay }}</td>
                            <td>{{ optional($deliveryRequests->currency)->name }}</td>
                            <td>{{ optional($deliveryRequests->statuses)->label }}</td>

                            <td>

                                <form method="POST" action="{!! route('delivery_requests.delivery_requests.destroy', $deliveryRequests->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_requests.delivery_requests.show', $deliveryRequests->id ) }}" class="btn btn-info" title="Show Delivery Requests">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @if(Auth::user()->role_id != 4)
                                        <a href="{{ route('delivery_requests.delivery_requests.edit', $deliveryRequests->id ) }}" class="btn btn-primary" title="Edit Delivery Requests">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Requests" onclick="return confirm(&quot;Delete Delivery Requests?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endif
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
            {!! $deliveryRequestsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection