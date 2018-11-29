@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Delivery Companies' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_companies.delivery_companies.destroy', $deliveryCompanies->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_companies.delivery_companies.index') }}" class="btn btn-primary" title="Show All Delivery Companies">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_companies.delivery_companies.create') }}" class="btn btn-success" title="Create New Delivery Companies">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_companies.delivery_companies.edit', $deliveryCompanies->id ) }}" class="btn btn-primary" title="Edit Delivery Companies">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Companies" onclick="return confirm(&quot;Delete Delivery Companies??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Ref</dt>
            <dd>{{ $deliveryCompanies->ref }}</dd>
            <dt>Company Name</dt>
            <dd>{{ $deliveryCompanies->company_name }}</dd>
            <dt>Tva</dt>
            <dd>{{ $deliveryCompanies->tva }}</dd>
            <dt>Country</dt>
            <dd>{{ $deliveryCompanies->country }}</dd>
            <dt>County</dt>
            <dd>{{ $deliveryCompanies->county }}</dd>
            <dt>City</dt>
            <dd>{{ $deliveryCompanies->city }}</dd>
            <dt>State</dt>
            <dd>{{ $deliveryCompanies->state }}</dd>
            <dt>Address</dt>
            <dd>{{ $deliveryCompanies->address }}</dd>
            <dt>Lat</dt>
            <dd>{{ $deliveryCompanies->lat }}</dd>
            <dt>Lng</dt>
            <dd>{{ $deliveryCompanies->lng }}</dd>
            <dt>Phone</dt>
            <dd>{{ $deliveryCompanies->phone }}</dd>
            <dt>Phone2</dt>
            <dd>{{ $deliveryCompanies->phone2 }}</dd>
            <dt>Fax</dt>
            <dd>{{ $deliveryCompanies->fax }}</dd>
            <dt>Logo</dt>
            <dd>{{ asset('storage/' . $deliveryCompanies->logo) }}</dd>
            <dt>Website</dt>
            <dd>{{ $deliveryCompanies->website }}</dd>
            <dt>Currency</dt>
            <dd>{{ optional($deliveryCompanies->currency)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $deliveryCompanies->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $deliveryCompanies->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection