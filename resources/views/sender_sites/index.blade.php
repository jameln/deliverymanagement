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
                <h4 class="mt-5 mb-5">Sender Sites</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sender_sites.sender_sites.create') }}" class="btn btn-success" title="Create New Sender Sites">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($senderSitesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Sender Sites Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Sender Company</th>
                            <th>Name</th>
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

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($senderSitesObjects as $senderSites)
                        <tr>
                            <td>{{ optional($senderSites->senderCompany)->company_name }}</td>
                            <td>{{ $senderSites->name }}</td>
                            <td>{{ $senderSites->country }}</td>
                            <td>{{ $senderSites->county }}</td>
                            <td>{{ $senderSites->city }}</td>
                            <td>{{ $senderSites->state }}</td>
                            <td>{{ $senderSites->address }}</td>
                            <td>{{ $senderSites->lat }}</td>
                            <td>{{ $senderSites->lng }}</td>
                            <td>{{ $senderSites->phone }}</td>
                            <td>{{ $senderSites->phone2 }}</td>
                            <td>{{ $senderSites->fax }}</td>

                            <td>

                                <form method="POST" action="{!! route('sender_sites.sender_sites.destroy', $senderSites->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sender_sites.sender_sites.show', $senderSites->id ) }}" class="btn btn-info" title="Show Sender Sites">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sender_sites.sender_sites.edit', $senderSites->id ) }}" class="btn btn-primary" title="Edit Sender Sites">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sender Sites" onclick="return confirm(&quot;Delete Sender Sites?&quot;)">
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
            {!! $senderSitesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection