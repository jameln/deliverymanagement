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
                <h4 class="mt-5 mb-5">Delivery Deposits</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('delivery_deposits.delivery_deposits.create') }}" class="btn btn-success" title="Create New Delivery Deposits">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($deliveryDepositsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Delivery Deposits Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Delivery Company</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>County</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Address</th>
                            <th>Lat</th>
                            <th>Lng</th>
                            <th>Phone</th>
                            <th>Fax</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryDepositsObjects as $deliveryDeposits)
                        <tr>
                            <td>{{ optional($deliveryDeposits->deliveryCompany)->company_name }}</td>
                            <td>{{ $deliveryDeposits->name }}</td>
                            <td>{{ $deliveryDeposits->country }}</td>
                            <td>{{ $deliveryDeposits->county }}</td>
                            <td>{{ $deliveryDeposits->city }}</td>
                            <td>{{ $deliveryDeposits->state }}</td>
                            <td>{{ $deliveryDeposits->address }}</td>
                            <td>{{ $deliveryDeposits->lat }}</td>
                            <td>{{ $deliveryDeposits->lng }}</td>
                            <td>{{ $deliveryDeposits->phone }}</td>
                            <td>{{ $deliveryDeposits->fax }}</td>

                            <td>

                                <form method="POST" action="{!! route('delivery_deposits.delivery_deposits.destroy', $deliveryDeposits->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_deposits.delivery_deposits.show', $deliveryDeposits->id ) }}" class="btn btn-info" title="Show Delivery Deposits">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('delivery_deposits.delivery_deposits.edit', $deliveryDeposits->id ) }}" class="btn btn-primary" title="Edit Delivery Deposits">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Deposits" onclick="return confirm(&quot;Delete Delivery Deposits?&quot;)">
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
            {!! $deliveryDepositsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection