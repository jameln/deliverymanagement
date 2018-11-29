
<div class="form-group {{ $errors->has('delivery_request_id') ? 'has-error' : '' }}">
    <label for="delivery_request_id" class="col-md-2 control-label">Delivery Request</label>
    <div class="col-md-10">
        <select class="form-control" id="delivery_request_id" name="delivery_request_id">
        	    <option value="" style="display: none;" {{ old('delivery_request_id', optional($deliveryRequestItems)->delivery_request_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select delivery request</option>
        	@foreach ($deliveryRequests as $key => $deliveryRequest)
			    <option value="{{ $key }}" {{ old('delivery_request_id', optional($deliveryRequestItems)->delivery_request_id) == $key ? 'selected' : '' }}>
			    	{{ $deliveryRequest }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('delivery_request_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ref') ? 'has-error' : '' }}">
    <label for="ref" class="col-md-2 control-label">Ref</label>
    <div class="col-md-10">
        <input class="form-control" name="ref" type="text" id="ref" value="{{ old('ref', optional($deliveryRequestItems)->ref) }}" minlength="1" placeholder="Enter ref here...">
        {!! $errors->first('ref', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($deliveryRequestItems)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
    <label for="qty" class="col-md-2 control-label">Qty</label>
    <div class="col-md-10">
        <input class="form-control" name="qty" type="text" id="qty" value="{{ old('qty', optional($deliveryRequestItems)->qty) }}" minlength="1" placeholder="Enter qty here...">
        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($deliveryRequestItems)->price) }}" minlength="1" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
    <label for="total" class="col-md-2 control-label">Total</label>
    <div class="col-md-10">
        <input class="form-control" name="total" type="number" id="total" value="{{ old('total', optional($deliveryRequestItems)->total) }}" placeholder="Enter total here...">
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

