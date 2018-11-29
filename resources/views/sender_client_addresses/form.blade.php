
<div class="form-group {{ $errors->has('sender_client_id') ? 'has-error' : '' }}">
    <label for="sender_client_id" class="col-md-2 control-label">Sender Client</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_client_id" name="sender_client_id">
        	    <option value="" style="display: none;" {{ old('sender_client_id', optional($senderClientAddresses)->sender_client_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender client</option>
        	@foreach ($senderClients as $key => $senderClient)
			    <option value="{{ $key }}" {{ old('sender_client_id', optional($senderClientAddresses)->sender_client_id) == $key ? 'selected' : '' }}>
			    	{{ $senderClient }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sender_client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($senderClientAddresses)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
    <label for="country" class="col-md-2 control-label">Country</label>
    <div class="col-md-10">
        <input class="form-control" name="country" type="number" id="country" value="{{ old('country', optional($senderClientAddresses)->country) }}" placeholder="Enter country here...">
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('county') ? 'has-error' : '' }}">
    <label for="county" class="col-md-2 control-label">County</label>
    <div class="col-md-10">
        <input class="form-control" name="county" type="number" id="county" value="{{ old('county', optional($senderClientAddresses)->county) }}" placeholder="Enter county here...">
        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($senderClientAddresses)->city) }}" minlength="1" placeholder="Enter city here...">
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
    <label for="state" class="col-md-2 control-label">State</label>
    <div class="col-md-10">
        <input class="form-control" name="state" type="text" id="state" value="{{ old('state', optional($senderClientAddresses)->state) }}" minlength="1" placeholder="Enter state here...">
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($senderClientAddresses)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
    <label for="lat" class="col-md-2 control-label">Lat</label>
    <div class="col-md-10">
        <input class="form-control" name="lat" type="text" id="lat" value="{{ old('lat', optional($senderClientAddresses)->lat) }}" minlength="1" placeholder="Enter lat here...">
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lng') ? 'has-error' : '' }}">
    <label for="lng" class="col-md-2 control-label">Lng</label>
    <div class="col-md-10">
        <input class="form-control" name="lng" type="text" id="lng" value="{{ old('lng', optional($senderClientAddresses)->lng) }}" minlength="1" placeholder="Enter lng here...">
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
</div>

