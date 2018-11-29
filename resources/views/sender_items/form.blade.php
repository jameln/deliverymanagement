
<div class="form-group {{ $errors->has('sender_company_id') ? 'has-error' : '' }}">
    <label for="sender_company_id" class="col-md-2 control-label">Sender Company</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_company_id" name="sender_company_id">
        	    <option value="" style="display: none;" {{ old('sender_company_id', optional($senderItems)->sender_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender company</option>
        	@foreach ($senderCompanies as $key => $senderCompany)
			    <option value="{{ $key }}" {{ old('sender_company_id', optional($senderItems)->sender_company_id) == $key ? 'selected' : '' }}>
			    	{{ $senderCompany }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sender_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ref') ? 'has-error' : '' }}">
    <label for="ref" class="col-md-2 control-label">Ref</label>
    <div class="col-md-10">
        <input class="form-control" name="ref" type="text" id="ref" value="{{ old('ref', optional($senderItems)->ref) }}" minlength="1" placeholder="Enter ref here...">
        {!! $errors->first('ref', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($senderItems)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($senderItems)->price) }}" minlength="1" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('img') ? 'has-error' : '' }}">
    <label for="img" class="col-md-2 control-label">Img</label>
    <div class="col-md-10">
        <input class="form-control" name="img" type="text" id="img" value="{{ old('img', optional($senderItems)->img) }}" minlength="1" placeholder="Enter img here...">
        {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
    </div>
</div>

