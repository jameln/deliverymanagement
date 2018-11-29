
<div class="form-group {{ $errors->has('ref') ? 'has-error' : '' }}">
    <label for="ref" class="col-md-2 control-label">Ref</label>
    <div class="col-md-10">
        <input class="form-control" name="ref" type="text" id="ref" value="{{ old('ref', optional($deliveryCompanies)->ref) }}" minlength="1" placeholder="Enter ref here...">
        {!! $errors->first('ref', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
    <label for="company_name" class="col-md-2 control-label">Company Name</label>
    <div class="col-md-10">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($deliveryCompanies)->company_name) }}" minlength="1" placeholder="Enter company name here...">
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tva') ? 'has-error' : '' }}">
    <label for="tva" class="col-md-2 control-label">Tva</label>
    <div class="col-md-10">
        <input class="form-control" name="tva" type="text" id="tva" value="{{ old('tva', optional($deliveryCompanies)->tva) }}" minlength="1" placeholder="Enter tva here...">
        {!! $errors->first('tva', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
    <label for="country" class="col-md-2 control-label">Country</label>
    <div class="col-md-10">
        <input class="form-control" name="country" type="number" id="country" value="{{ old('country', optional($deliveryCompanies)->country) }}" placeholder="Enter country here...">
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('county') ? 'has-error' : '' }}">
    <label for="county" class="col-md-2 control-label">County</label>
    <div class="col-md-10">
        <input class="form-control" name="county" type="number" id="county" value="{{ old('county', optional($deliveryCompanies)->county) }}" placeholder="Enter county here...">
        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($deliveryCompanies)->city) }}" minlength="1" placeholder="Enter city here...">
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
    <label for="state" class="col-md-2 control-label">State</label>
    <div class="col-md-10">
        <input class="form-control" name="state" type="text" id="state" value="{{ old('state', optional($deliveryCompanies)->state) }}" minlength="1" placeholder="Enter state here...">
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($deliveryCompanies)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
    <label for="lat" class="col-md-2 control-label">Lat</label>
    <div class="col-md-10">
        <input class="form-control" name="lat" type="text" id="lat" value="{{ old('lat', optional($deliveryCompanies)->lat) }}" minlength="1" placeholder="Enter lat here...">
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
    <label for="lng" class="col-md-2 control-label">Lng</label>
    <div class="col-md-10">
        <input class="form-control" name="lng" type="text" id="lng" value="{{ old('lng', optional($deliveryCompanies)->lng) }}" minlength="1" placeholder="Enter lng here...">
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($deliveryCompanies)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone2') ? 'has-error' : '' }}">
    <label for="phone2" class="col-md-2 control-label">Phone2</label>
    <div class="col-md-10">
        <input class="form-control" name="phone2" type="text" id="phone2" value="{{ old('phone2', optional($deliveryCompanies)->phone2) }}" minlength="1" placeholder="Enter phone2 here...">
        {!! $errors->first('phone2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
    <label for="fax" class="col-md-2 control-label">Fax</label>
    <div class="col-md-10">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ old('fax', optional($deliveryCompanies)->fax) }}" minlength="1" placeholder="Enter fax here...">
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
    <label for="logo" class="col-md-2 control-label">Logo</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="logo" id="logo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($deliveryCompanies->logo) && !empty($deliveryCompanies->logo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_logo" class="custom-delete-file" value="1" {{ old('custom_delete_logo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $deliveryCompanies->logo }}
                </span>
            </div>
        @endif
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
    <label for="website" class="col-md-2 control-label">Website</label>
    <div class="col-md-10">
        <input class="form-control" name="website" type="text" id="website" value="{{ old('website', optional($deliveryCompanies)->website) }}" minlength="1" placeholder="Enter website here...">
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('currencies_id') ? 'has-error' : '' }}">
    <label for="currencies_id" class="col-md-2 control-label">Currency</label>
    <div class="col-md-10">
        <select class="form-control" id="currencies_id" name="currencies_id">
        	    <option value="" style="display: none;" {{ old('currencies_id', optional($deliveryCompanies)->currencies_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select currency</option>
        	@foreach ($currencies as $key => $currency)
			    <option value="{{ $key }}" {{ old('currencies_id', optional($deliveryCompanies)->currencies_id) == $key ? 'selected' : '' }}>
			    	{{ $currency }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('currencies_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

