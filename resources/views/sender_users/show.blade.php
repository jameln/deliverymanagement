@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Sender Users' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sender_users.sender_users.destroy', $senderUsers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sender_users.sender_users.index') }}" class="btn btn-primary" title="Show All Sender Users">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sender_users.sender_users.create') }}" class="btn btn-success" title="Create New Sender Users">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sender_users.sender_users.edit', $senderUsers->id ) }}" class="btn btn-primary" title="Edit Sender Users">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sender Users" onclick="return confirm(&quot;Delete Sender Users??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Sender Company</dt>
            <dd>{{ optional($senderUsers->senderCompany)->company_name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $senderUsers->phone }}</dd>
            <dt>Cin</dt>
            <dd>{{ $senderUsers->cin }}</dd>
            <dt>Created At</dt>
            <dd>{{ $senderUsers->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $senderUsers->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection