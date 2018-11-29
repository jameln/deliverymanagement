<div class="message"></div>

<input id="count-status" value="{{count($allstatus)}}" type="hidden">

<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{__('Commande')}} {{ $status->label }}</h4>
        </div>
        <div class="pull-left clearfix" style="margin-left: 30px;">
            <select class="form-control" id="select-status-{{$status->id}}">
                <option value="0" disabled selected>{{__('Changer le status')}}</option>
                    @foreach($allstatus as $key=>$value)
                        <option value="{{ $value->id }}">{{ $value->label }}</option>
                    @endforeach
            </select>
        </div>

        <div class="btn-group btn-group-sm pull-right" role="group">
            <a href="{{ route('delivery_requests.delivery_requests.create') }}" class="btn btn-success" title="Create New Delivery Requests">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>

    </div>
    
    @if(count($deliveryrequests) == 0)
        <div class="panel-body text-center">
            <h4>No Delivery Requests Available!</h4>
        </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

            <table  class="table tab-{{$status->id}} table-striped ">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>#</th>
                        <th>Ref</th>
                        <th>Sender Company</th>
                        <th>Sender Site</th>
                        <th>Sender Client</th>
                        <th>Sender Client Address</th>
                        <th>Delivery Company</th>
                        <th>Pricedelivery Price</th>
                        <th>Total To Pay</th>
                        <!-- <th>Currency</th> -->
                        <th>Status</th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($deliveryrequests as $deliveryrequest)
                    @if($deliveryrequest->statuses_id == $status->id)
                        <tr>
                            <td style="display:none;">{{ route('delivery_requests.delivery_requests.setstatus', $deliveryrequest->id) }}</td>
                            <td>{{ $deliveryrequest->id }}</td>
                            <td>{{ $deliveryrequest->ref }}</td>
                            <td>{{ optional($deliveryrequest->senderCompany)->company_name }}</td>
                            <td>{{ optional($deliveryrequest->senderSite)->name }}</td>
                            <td>{{ optional($deliveryrequest->senderClient)->name }}</td>
                            <td>{{ optional($deliveryrequest->senderClientAddress)->name }}</td>
                            <td>{{ optional($deliveryrequest->deliveryCompany)->company_name }}</td>
                            <td>{{ $deliveryrequest->pricedelivery_price }}</td>
                            <td>{{ $deliveryrequest->total_to_pay }}</td>
                            <!-- <td>{{ optional($deliveryrequest->currency)->name }}</td> -->
                            <td>{{ $status->label }}</td>
                            
                                
                            <td>
                            
                                <form method="POST" action="{!! route('delivery_requests.delivery_requests.destroy', $deliveryrequest->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_requests.delivery_requests.show', $deliveryrequest->id ) }}" class="btn btn-info" title="Show Delivery Requests">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('delivery_requests.delivery_requests.edit', $deliveryrequest->id ) }}" class="btn btn-primary" title="Edit Delivery Requests">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @if(Auth::user()->role_id < 4)
                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Requests" onclick="return confirm(&quot;Delete Delivery Requests?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endif
                                        <a href="{{ route('delivery_requests.delivery_requests.print', $deliveryrequest->id) }}" class="btn btn-success" target="_blank" title="Print Delivery Requests">
                                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                        </a>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>        
    @endif
</div>
<script type="text/javascript">
let counttab = $('#count-status').val();
$( document ).ready(function() {
    var table = $('.table').DataTable();
    for (var i = 1 ; i <=counttab;i++)
    {
        var selector = '.tab-'+i+' tbody';
        var SelectStatus = "#select-status-"+i;
        $(selector).on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
        } );

    $(SelectStatus).on('change',function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = $(this).val();
        var urls = $.map(table.rows('.selected').data(), function (item) {
            return item[0]
        });

        $.each(urls, function( index, value ) {      
            $.ajax({
            url: value,
            type: "patch",
            data: {
                _token: CSRF_TOKEN,
                'statuses_id': status
            },
            success: function() {
                $('.message').show();
                $('.message').html('<div class="alert alert-success" role="alert">Success updated status!</div>');
                $('#statussetted').html($(SelectStatus).val()); 
                setTimeout(function(){
                    $('.message').hide();
                   location.reload();
                }, 2000);

            },
            error: function(){
                $('.message').html('<div class="alert alert-danger" role="alert">Failed updated status!</div>');
                setTimeout(function(){
                    $('.message').hide();
                }, 2000);

            }
        });
        });

    }) }
});
</script>
