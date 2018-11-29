<div class="col-md-6">

<div class="form-group {{ $errors->has('ref') ? 'has-error' : '' }}">
    <label for="ref" class="col-md-2 control-label">Ref</label>
    <div class="col-md-10">
        <input class="form-control" name="ref" type="text" id="ref" value="{{ isset($deliveryRequests) ? old('ref', optional($deliveryRequests)->ref):$ref }}" minlength="1" placeholder="Enter ref here..." readonly>
        {!! $errors->first('ref', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sender_company_id') ? 'has-error' : '' }}">
    <label for="sender_company_id" class="col-md-2 control-label">Sender Company</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_company_id" name="sender_company_id">
                <option value="" style="display: none;" {{ old('sender_company_id', optional($deliveryRequests)->sender_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender company</option>
            @foreach ($senderCompanies as $key => $senderCompany)
                <option value="{{ $key }}" {{ old('sender_company_id', optional($deliveryRequests)->sender_company_id) == $key ? 'selected' : '' }}>
                    {{ $senderCompany }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('sender_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sender_site_id') ? 'has-error' : '' }}">
    <label for="sender_site_id" class="col-md-2 control-label">Sender Site</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_site_id" name="sender_site_id">
                <option value="" style="display: none;" {{ old('sender_site_id', optional($deliveryRequests)->sender_site_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender site</option>
            @foreach ($senderSites as $key => $senderSite)
                <option value="{{ $key }}" {{ old('sender_site_id', optional($deliveryRequests)->sender_site_id) == $key ? 'selected' : '' }}>
                    {{ $senderSite }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('sender_site_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sender_client_id') ? 'has-error' : '' }}">
    <label for="sender_client_id" class="col-md-2 control-label">Sender Client</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_client_id" name="sender_client_id">
                <option value="" style="display: none;" {{ old('sender_client_id', optional($deliveryRequests)->sender_client_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender client</option>
            @foreach ($senderClients as $key => $senderClient)
                <option value="{{ $key }}" {{ old('sender_client_id', optional($deliveryRequests)->sender_client_id) == $key ? 'selected' : '' }}>
                    {{ $senderClient }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('sender_client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sender_client_address_id') ? 'has-error' : '' }}">
    <label for="sender_client_address_id" class="col-md-2 control-label">Sender Client Address</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_client_address_id" name="sender_client_address_id">
                <option value="" style="display: none;" {{ old('sender_client_address_id', optional($deliveryRequests)->sender_client_address_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender client address</option>
            @foreach ($senderClientAddresses as $key => $senderClientAddress)
                <option value="{{ $key }}" {{ old('sender_client_address_id', optional($deliveryRequests)->sender_client_address_id) == $key ? 'selected' : '' }}>
                    {{ $senderClientAddress }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('sender_client_address_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('delivery_company_id') ? 'has-error' : '' }}">
    <label for="delivery_company_id" class="col-md-2 control-label">Delivery Company</label>
    <div class="col-md-10">
        <select class="form-control" id="delivery_company_id" name="delivery_company_id">
                <option value="" style="display: none;" {{ old('delivery_company_id', optional($deliveryRequests)->delivery_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select delivery company</option>
            @foreach ($deliveryCompanies as $key => $deliveryCompany)
                <option value="{{ $key }}" {{ old('delivery_company_id', optional($deliveryRequests)->delivery_company_id) == $key ? 'selected' : '' }}>
                    {{ $deliveryCompany }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('delivery_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pricedelivery_price') ? 'has-error' : '' }}">
    <label for="pricedelivery_price" class="col-md-2 control-label">Pricedelivery Price</label>
    <div class="col-md-10">
        <input class="form-control" name="pricedelivery_price" type="text" id="pricedelivery_price" value="{{ old('pricedelivery_price', optional($deliveryRequests)->pricedelivery_price) }}" minlength="1" placeholder="Enter pricedelivery price here...">
        {!! $errors->first('pricedelivery_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_to_pay') ? 'has-error' : '' }}">
    <label for="total_to_pay" class="col-md-2 control-label">Total To Pay</label>
    <div class="col-md-10">
        <input class="form-control" name="total_to_pay" type="text" id="total_to_pay" value="{{ old('total_to_pay', optional($deliveryRequests)->total_to_pay) }}" placeholder="Enter total to pay here...">
        {!! $errors->first('total_to_pay', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('currencies_id') ? 'has-error' : '' }}">
    <label for="currencies_id" class="col-md-2 control-label">Currency</label>
    <div class="col-md-10">
        <select class="form-control" id="currencies_id" name="currencies_id">
                <option value="" style="display: none;" {{ old('currencies_id', optional($deliveryRequests)->currencies_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select currency</option>
            @foreach ($currencies as $key => $currency)
                <option value="{{ $key }}" {{ old('currencies_id', optional($deliveryRequests)->currencies_id) == $key ? 'selected' : '' }}>
                    {{ $currency }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('currencies_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('statuses_id') ? 'has-error' : '' }}">
    <label for="statuses_id" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select class="form-control" id="statuses_id" name="statuses_id">
        	    <option value="" style="display: none;" {{ old('statuses_id', optional($deliveryRequests)->statuses_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select status</option>
        	@foreach ($statuses as $key => $status)
			    <option value="{{ $key }}" {{ old('statuses_id', optional($deliveryRequests)->statuses_id) == $key ? 'selected' : '' }}>
			    	{{ $status }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('statuses_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($deliveryRequests)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

</div>
