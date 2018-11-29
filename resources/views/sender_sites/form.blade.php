
<div class="form-group {{ $errors->has('sender_company_id') ? 'has-error' : '' }}">
    <label for="sender_company_id" class="col-md-2 control-label">Sender Company</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_company_id" name="sender_company_id">
        	    <option value="" style="display: none;" {{ old('sender_company_id', optional($senderSites)->sender_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender company</option>
        	@foreach ($senderCompanies as $key => $senderCompany)
			    <option value="{{ $key }}" {{ old('sender_company_id', optional($senderSites)->sender_company_id) == $key ? 'selected' : '' }}>
			    	{{ $senderCompany }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sender_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($senderSites)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
    <label for="country" class="col-md-2 control-label">Country</label>
    <div class="col-md-10">
        <input class="form-control" name="country" type="number" id="country" value="{{ old('country', optional($senderSites)->country) }}" placeholder="Enter country here...">
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('county') ? 'has-error' : '' }}">
    <label for="county" class="col-md-2 control-label">County</label>
    <div class="col-md-10">
        <input class="form-control" name="county" type="number" id="county" value="{{ old('county', optional($senderSites)->county) }}" placeholder="Enter county here...">
        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($senderSites)->city) }}" minlength="1" placeholder="Enter city here...">
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
    <label for="state" class="col-md-2 control-label">State</label>
    <div class="col-md-10">
        <input class="form-control" name="state" type="text" id="state" value="{{ old('state', optional($senderSites)->state) }}" minlength="1" placeholder="Enter state here...">
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($senderSites)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
    <label for="lat" class="col-md-2 control-label">Lat</label>
    <div class="col-md-10">
        <input class="form-control" name="lat" type="text" id="lat" value="{{ old('lat', optional($senderSites)->lat) }}" minlength="1" placeholder="Enter lat here...">
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
    <label for="lng" class="col-md-2 control-label">Lng</label>
    <div class="col-md-10">
        <input class="form-control" name="lng" type="text" id="lng" value="{{ old('lng', optional($senderSites)->lng) }}" minlength="1" placeholder="Enter lng here...">
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($senderSites)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone2') ? 'has-error' : '' }}">
    <label for="phone2" class="col-md-2 control-label">Phone2</label>
    <div class="col-md-10">
        <input class="form-control" name="phone2" type="text" id="phone2" value="{{ old('phone2', optional($senderSites)->phone2) }}" minlength="1" placeholder="Enter phone2 here...">
        {!! $errors->first('phone2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
    <label for="fax" class="col-md-2 control-label">Fax</label>
    <div class="col-md-10">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ old('fax', optional($senderSites)->fax) }}" minlength="1" placeholder="Enter fax here...">
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

