@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Sender Companies' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sender_companies.sender_companies.destroy', $senderCompanies->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sender_companies.sender_companies.index') }}" class="btn btn-primary" title="Show All Sender Companies">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sender_companies.sender_companies.create') }}" class="btn btn-success" title="Create New Sender Companies">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sender_companies.sender_companies.edit', $senderCompanies->id ) }}" class="btn btn-primary" title="Edit Sender Companies">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sender Companies" onclick="return confirm(&quot;Delete Sender Companies??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Ref</dt>
            <dd>{{ $senderCompanies->ref }}</dd>
            <dt>Company Name</dt>
            <dd>{{ $senderCompanies->company_name }}</dd>
            <dt>Tva</dt>
            <dd>{{ $senderCompanies->tva }}</dd>
            <dt>Country</dt>
            <dd>{{ $senderCompanies->country }}</dd>
            <dt>City</dt>
            <dd>{{ $senderCompanies->city }}</dd>
            <dt>State</dt>
            <dd>{{ $senderCompanies->state }}</dd>
            <dt>Adress</dt>
            <dd>{{ $senderCompanies->adress }}</dd>
            <dt>Lat</dt>
            <dd>{{ $senderCompanies->lat }}</dd>
            <dt>Lng</dt>
            <dd>{{ $senderCompanies->lng }}</dd>
            <dt>Phone</dt>
            <dd>{{ $senderCompanies->phone }}</dd>
            <dt>Phone2</dt>
            <dd>{{ $senderCompanies->phone2 }}</dd>
            <dt>Fax</dt>
            <dd>{{ $senderCompanies->fax }}</dd>
            <dt>Logo</dt>
            <dd>{{ asset('storage/' . $senderCompanies->logo) }}</dd>
            <dt>Website</dt>
            <dd>{{ $senderCompanies->website }}</dd>
            <dt>Currency</dt>
            <dd>{{ optional($senderCompanies->currency)->name }}</dd>
            <dt>Sender Category</dt>
            <dd>{{ optional($senderCompanies->senderCategory)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $senderCompanies->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $senderCompanies->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection