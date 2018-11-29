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
                <h4 class="mt-5 mb-5">Sender Items</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sender_items.sender_items.create') }}" class="btn btn-success" title="Create New Sender Items">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($senderItemsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Sender Items Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Sender Company</th>
                            <th>Ref</th>
                            <th>Price</th>
                            <th>Img</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($senderItemsObjects as $senderItems)
                        <tr>
                            <td>{{ optional($senderItems->senderCompany)->company_name }}</td>
                            <td>{{ $senderItems->ref }}</td>
                            <td>{{ $senderItems->price }}</td>
                            <td>{{ $senderItems->img }}</td>

                            <td>

                                <form method="POST" action="{!! route('sender_items.sender_items.destroy', $senderItems->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sender_items.sender_items.show', $senderItems->id ) }}" class="btn btn-info" title="Show Sender Items">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sender_items.sender_items.edit', $senderItems->id ) }}" class="btn btn-primary" title="Edit Sender Items">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sender Items" onclick="return confirm(&quot;Delete Sender Items?&quot;)">
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
            {!! $senderItemsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection