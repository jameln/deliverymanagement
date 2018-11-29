
<div class="form-group {{ $errors->has('delivery_company_id') ? 'has-error' : '' }}">
    <label for="delivery_company_id" class="col-md-2 control-label">Delivery Company</label>
    <div class="col-md-10">
        <select class="form-control" id="delivery_company_id" name="delivery_company_id">
        	    <option value="" style="display: none;" {{ old('delivery_company_id', optional($deliveryAgents)->delivery_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select delivery company</option>
        	@foreach ($deliveryCompanies as $key => $deliveryCompany)
			    <option value="{{ $key }}" {{ old('delivery_company_id', optional($deliveryAgents)->delivery_company_id) == $key ? 'selected' : '' }}>
			    	{{ $deliveryCompany }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('delivery_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($deliveryAgents)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cin') ? 'has-error' : '' }}">
    <label for="cin" class="col-md-2 control-label">Cin</label>
    <div class="col-md-10">
        <input class="form-control" name="cin" type="text" id="cin" value="{{ old('cin', optional($deliveryAgents)->cin) }}" minlength="1" placeholder="Enter cin here...">
        {!! $errors->first('cin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dln') ? 'has-error' : '' }}">
    <label for="dln" class="col-md-2 control-label">Dln</label>
    <div class="col-md-10">
        <input class="form-control" name="dln" type="text" id="dln" value="{{ old('dln', optional($deliveryAgents)->dln) }}" minlength="1" placeholder="Enter dln here...">
        {!! $errors->first('dln', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="photo" id="photo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($deliveryAgents->photo) && !empty($deliveryAgents->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $deliveryAgents->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

