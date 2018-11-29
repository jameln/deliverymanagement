
<div class="form-group {{ $errors->has('delivery_company_id') ? 'has-error' : '' }}">
    <label for="delivery_company_id" class="col-md-2 control-label">Delivery Company</label>
    <div class="col-md-10">
        <select class="form-control" id="delivery_company_id" name="delivery_company_id">
        	    <option value="" style="display: none;" {{ old('delivery_company_id', optional($senderDeliveries)->delivery_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select delivery company</option>
        	@foreach ($deliveryCompanies as $key => $deliveryCompany)
			    <option value="{{ $key }}" {{ old('delivery_company_id', optional($senderDeliveries)->delivery_company_id) == $key ? 'selected' : '' }}>
			    	{{ $deliveryCompany }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('delivery_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sender_company_id') ? 'has-error' : '' }}">
    <label for="sender_company_id" class="col-md-2 control-label">Sender Company</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_company_id" name="sender_company_id">
        	    <option value="" style="display: none;" {{ old('sender_company_id', optional($senderDeliveries)->sender_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender company</option>
        	@foreach ($senderCompanies as $key => $senderCompany)
			    <option value="{{ $key }}" {{ old('sender_company_id', optional($senderDeliveries)->sender_company_id) == $key ? 'selected' : '' }}>
			    	{{ $senderCompany }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sender_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($senderDeliveries)->status) }}" minlength="1" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
    <label for="note" class="col-md-2 control-label">Note</label>
    <div class="col-md-10">
        <textarea class="form-control" name="note" cols="50" rows="10" id="note" minlength="1" maxlength="1000">{{ old('note', optional($senderDeliveries)->note) }}</textarea>
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

