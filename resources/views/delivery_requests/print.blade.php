 <!-- Styles -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Latest datatable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest datatable JavaScript -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<div class="container">


<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Delivery Requests N° ' }}{{ $deliveryRequests->ref }}</h4>
        </span>
       


    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Ref</dt>
            <dd>{{ $deliveryRequests->ref }}</dd>
            <dt>Sender Company</dt>
            <dd>{{ optional($deliveryRequests->senderCompany)->company_name }}</dd>
            <dt>Sender Site</dt>
            <dd>{{ optional($deliveryRequests->senderSite)->name }}</dd>
            <dt>Sender Client</dt>
            <dd>{{ optional($deliveryRequests->senderClient)->name }}</dd>
            <dt>Sender Client Address</dt>
            <dd>{{ optional($deliveryRequests->senderClientAddress)->name }}</dd>
            <dt>Delivery Company</dt>
            <dd>{{ optional($deliveryRequests->deliveryCompany)->company_name }}</dd>
            <dt>Pricedelivery Price</dt>
            <dd>{{ $deliveryRequests->pricedelivery_price }}</dd>
            <dt>Total To Pay</dt>
            <dd>{{ $deliveryRequests->total_to_pay }}</dd>
            <dt>Currency</dt>
            <dd>{{ optional($deliveryRequests->currency)->name }}</dd>
            <dt>Status</dt>
            <dd >{{ optional($deliveryRequests->statuses)->label }}</dd>
            <dt>Created At</dt>
            <dd>{{ $deliveryRequests->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $deliveryRequests->updated_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $deliveryRequests->description }}</dd>

        </dl>

    </div>
</div>
<script type="text/javascript">
   window.print();
</script>
</div>
