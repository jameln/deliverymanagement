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
                <h4 class="mt-5 mb-5">Delivery Companies</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('delivery_companies.delivery_companies.create') }}" class="btn btn-success" title="Create New Delivery Companies">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($deliveryCompaniesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Delivery Companies Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Ref</th>
                            <th>Company Name</th>
                            <th>Tva</th>
                            <th>Country</th>
                            <th>County</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Address</th>
                            <th>Lat</th>
                            <th>Lng</th>
                            <th>Phone</th>
                            <th>Phone2</th>
                            <th>Fax</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Currency</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryCompaniesObjects as $deliveryCompanies)
                        <tr>
                            <td>{{ $deliveryCompanies->ref }}</td>
                            <td>{{ $deliveryCompanies->company_name }}</td>
                            <td>{{ $deliveryCompanies->tva }}</td>
                            <td>{{ $deliveryCompanies->country }}</td>
                            <td>{{ $deliveryCompanies->county }}</td>
                            <td>{{ $deliveryCompanies->city }}</td>
                            <td>{{ $deliveryCompanies->state }}</td>
                            <td>{{ $deliveryCompanies->address }}</td>
                            <td>{{ $deliveryCompanies->lat }}</td>
                            <td>{{ $deliveryCompanies->lng }}</td>
                            <td>{{ $deliveryCompanies->phone }}</td>
                            <td>{{ $deliveryCompanies->phone2 }}</td>
                            <td>{{ $deliveryCompanies->fax }}</td>
                            <td>{{ $deliveryCompanies->logo }}</td>
                            <td>{{ $deliveryCompanies->website }}</td>
                            <td>{{ optional($deliveryCompanies->currency)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('delivery_companies.delivery_companies.destroy', $deliveryCompanies->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_companies.delivery_companies.show', $deliveryCompanies->id ) }}" class="btn btn-info" title="Show Delivery Companies">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('delivery_companies.delivery_companies.edit', $deliveryCompanies->id ) }}" class="btn btn-primary" title="Edit Delivery Companies">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Companies" onclick="return confirm(&quot;Delete Delivery Companies?&quot;)">
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
            {!! $deliveryCompaniesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection