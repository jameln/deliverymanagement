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
                <h4 class="mt-5 mb-5">Statuses</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('statuses.statuses.create') }}" class="btn btn-success" title="Create New Statuses">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($statusesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Statuses Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Label</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($statusesObjects as $statuses)
                        <tr>
                            <td>{{ $statuses->name }}</td>
                            <td>{{ $statuses->label }}</td>

                            <td>

                                <form method="POST" action="{!! route('statuses.statuses.destroy', $statuses->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('statuses.statuses.show', $statuses->id ) }}" class="btn btn-info" title="Show Statuses">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('statuses.statuses.edit', $statuses->id ) }}" class="btn btn-primary" title="Edit Statuses">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Statuses" onclick="return confirm(&quot;Delete Statuses?&quot;)">
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
            {!! $statusesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection