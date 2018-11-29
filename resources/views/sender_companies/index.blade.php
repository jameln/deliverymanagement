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
                <h4 class="mt-5 mb-5">Sender Companies</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sender_companies.sender_companies.create') }}" class="btn btn-success" title="Create New Sender Companies">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($senderCompaniesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Sender Companies Available!</h4>
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
                            <th>City</th>
                            <th>State</th>
                            <th>Adress</th>
                            <th>Lat</th>
                            <th>Lng</th>
                            <th>Phone</th>
                            <th>Phone2</th>
                            <th>Fax</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Currency</th>
                            <th>Sender Category</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($senderCompaniesObjects as $senderCompanies)
                        <tr>
                            <td>{{ $senderCompanies->ref }}</td>
                            <td>{{ $senderCompanies->company_name }}</td>
                            <td>{{ $senderCompanies->tva }}</td>
                            <td>{{ $senderCompanies->country }}</td>
                            <td>{{ $senderCompanies->city }}</td>
                            <td>{{ $senderCompanies->state }}</td>
                            <td>{{ $senderCompanies->adress }}</td>
                            <td>{{ $senderCompanies->lat }}</td>
                            <td>{{ $senderCompanies->lng }}</td>
                            <td>{{ $senderCompanies->phone }}</td>
                            <td>{{ $senderCompanies->phone2 }}</td>
                            <td>{{ $senderCompanies->fax }}</td>
                            <td>{{ $senderCompanies->logo }}</td>
                            <td>{{ $senderCompanies->website }}</td>
                            <td>{{ optional($senderCompanies->currency)->name }}</td>
                            <td>{{ optional($senderCompanies->senderCategory)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('sender_companies.sender_companies.destroy', $senderCompanies->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sender_companies.sender_companies.show', $senderCompanies->id ) }}" class="btn btn-info" title="Show Sender Companies">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sender_companies.sender_companies.edit', $senderCompanies->id ) }}" class="btn btn-primary" title="Edit Sender Companies">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sender Companies" onclick="return confirm(&quot;Delete Sender Companies?&quot;)">
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
            {!! $senderCompaniesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection