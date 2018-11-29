@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($statuses->name) ? $statuses->name : 'Statuses' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('statuses.statuses.destroy', $statuses->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('statuses.statuses.index') }}" class="btn btn-primary" title="Show All Statuses">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('statuses.statuses.create') }}" class="btn btn-success" title="Create New Statuses">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('statuses.statuses.edit', $statuses->id ) }}" class="btn btn-primary" title="Edit Statuses">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Statuses" onclick="return confirm(&quot;Delete Statuses??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $statuses->name }}</dd>
            <dt>Label</dt>
            <dd>{{ $statuses->label }}</dd>

        </dl>

    </div>
</div>

@endsection