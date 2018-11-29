
<div class="form-group {{ $errors->has('sender_company_id') ? 'has-error' : '' }}">
    <label for="sender_company_id" class="col-md-2 control-label">Sender Company</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_company_id" name="sender_company_id">
        	    <option value="" style="display: none;" {{ old('sender_company_id', optional($senderUsers)->sender_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender company</option>
        	@foreach ($senderCompanies as $key => $senderCompany)
			    <option value="{{ $key }}" {{ old('sender_company_id', optional($senderUsers)->sender_company_id) == $key ? 'selected' : '' }}>
			    	{{ $senderCompany }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sender_company_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($senderUsers)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cin') ? 'has-error' : '' }}">
    <label for="cin" class="col-md-2 control-label">Cin</label>
    <div class="col-md-10">
        <input class="form-control" name="cin" type="text" id="cin" value="{{ old('cin', optional($senderUsers)->cin) }}" minlength="1" placeholder="Enter cin here...">
        {!! $errors->first('cin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

