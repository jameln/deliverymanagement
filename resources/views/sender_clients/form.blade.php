
<div class="form-group {{ $errors->has('sender_company_id') ? 'has-error' : '' }}">
    <label for="sender_company_id" class="col-md-2 control-label">Sender Company</label>
    <div class="col-md-10">
        <select class="form-control" id="sender_company_id" name="sender_company_id">
        	    <option value="" style="display: none;" {{ old('sender_company_id', optional($senderClients)->sender_company_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sender company</option>
        	@foreach ($senderCompanies as $key => $senderCompany)
			    <option value="{{ $key }}" {{ old('sender_company_id', optional($senderClients)->sender_company_id) == $key ? 'selected' : '' }}>
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
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($senderClients)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($senderClients)->last_name) }}" minlength="1" placeholder="Enter last name here...">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($senderClients)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($senderClients)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone2') ? 'has-error' : '' }}">
    <label for="phone2" class="col-md-2 control-label">Phone2</label>
    <div class="col-md-10">
        <input class="form-control" name="phone2" type="text" id="phone2" value="{{ old('phone2', optional($senderClients)->phone2) }}" minlength="1" placeholder="Enter phone2 here...">
        {!! $errors->first('phone2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cin') ? 'has-error' : '' }}">
    <label for="cin" class="col-md-2 control-label">Cin</label>
    <div class="col-md-10">
        <input class="form-control" name="cin" type="text" id="cin" value="{{ old('cin', optional($senderClients)->cin) }}" minlength="1" placeholder="Enter cin here...">
        {!! $errors->first('cin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

