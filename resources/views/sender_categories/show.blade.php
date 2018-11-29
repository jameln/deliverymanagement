@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($senderCategory->name) ? $senderCategory->name : 'Sender Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sender_categories.sender_category.destroy', $senderCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sender_categories.sender_category.index') }}" class="btn btn-primary" title="Show All Sender Category">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sender_categories.sender_category.create') }}" class="btn btn-success" title="Create New Sender Category">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sender_categories.sender_category.edit', $senderCategory->id ) }}" class="btn btn-primary" title="Edit Sender Category">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sender Category" onclick="return confirm(&quot;Delete Sender Category??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $senderCategory->name }}</dd>

        </dl>

    </div>
</div>

@endsection