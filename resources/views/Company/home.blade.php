@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>{{ __('Dashboard') }}</h4>
                  <div class="btn-group pull-right" role="group">
                    <a href="{{ route('delivery_requests.delivery_requests.create') }}" class="btn btn-success" title="Create New Delivery Requests" style="margin-bottom: 5px;">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">{{ __('New Delivery') }}</span>
                    </a>
                </div>
               </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  
    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          {{__('Livraisons')}}
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
       <div class="panel-body">
          <!-- <div class="card text-white bg-primary col-md-4" style="max-width: 18rem;">
            <div class="card-header">{{__('Livraisons')}}</div>
            <div class="card-body">
              <h5 class="card-title">You have</h5>
              <p class="card-text" id="sender_deliveries" value="{{ $sender_deliveries }}">{{ $sender_deliveries }} {{__('Livraisons')}}</p>
            </div>
          </div> -->

          <div class="card text-white bg-success col-md-4" style="max-width: 18rem;">
            <div class="card-header">{{__('Articles')}}</div>
            <div class="card-body">
              <h5 class="card-title">You have</h5>
              <p class="card-text">{{ $sender_items }} {{__('Articles')}}</p>
            </div>
          </div>

          <div class="card text-white bg-danger col-md-4" style="max-width: 18rem;">
            <div class="card-header">{{__('Clients')}}</div>
            <div class="card-body">
              <h5 class="card-title">You have</h5>
              <p class="card-text">{{ $sender_clients }} {{__('Clients')}}</p>
            </div>
          </div>
          <div class="card text-white bg-info col-md-4" style="max-width: 18rem;">
              <div class="card-header">{{__('Etablissements')}}</div>
              <div class="card-body">
                <h5 class="card-title">You have</h5>
                <p class="card-text">{{ $delivery_companies }} {{__('Etablissements')}}</p>
              </div>
            </div>

            <div class="card text-white bg-light col-md-4" style="max-width: 18rem;">
              <div class="card-header">{{__('Deposits')}}</div>
              <div class="card-body">
                <h5 class="card-title">You have</h5>
                <p class="card-text">{{ $delivery_deposits }} {{__('Deposits')}}</p>
              </div>
            </div>

            <div class="card text-white bg-warning col-md-4" style="max-width: 18rem;">
              <div class="card-header">{{__('Livraisons')}}</div>
              <div class="card-body">
                <h5 class="card-title">You have</h5>
                <p class="card-text" id="delivery_requests" value="{{ $delivery_requests }}">{{ $delivery_requests }} {{__('Livraisons')}}</p>
              </div>
            </div>
      </div>
      </div>
    </div>
  </div>
  <!-- <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          {{__('Statistiques')}}
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="panel-body">
      
      </div>
      </div>
    </div>
  </div>

</div> -->

<ul class="nav nav-tabs">
@foreach($statuses as $key=>$status)

        <li @if ($key === 0) class="active" @endif><a data-toggle="tab" href="#{{$status->name}}">{{$status->label}}</a></li>

@endforeach
</ul>
<div class="tab-content">
@foreach($statuses as $key=>$status)
<?php $data=[
        'deliveryrequests' => $alldeliveryrequests,
        'allstatus' => $statuses,
        'status' => $status
    ]  
?>
   <div id="{{$status->name}}" @if ($key === 0) class="tab-pane fade in active" @else class="tab-pane fade" @endif>
        @include('Company.status',$data) 
    </div>
        
@endforeach
</div>

<!-- <div>@include('Company.chart')</div>
 --></div>
@endsection
