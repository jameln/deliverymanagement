
<div class="form-group {{ $errors->has('ref') ? 'has-error' : '' }}">
    <label for="ref" class="col-md-2 control-label">Ref</label>
    <div class="col-md-10">
        <input class="form-control" name="ref" type="text" id="ref" value="{{ old('ref', optional($currency)->ref) }}" minlength="1" placeholder="Enter ref here...">
        {!! $errors->first('ref', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($currency)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('symbol') ? 'has-error' : '' }}">
    <label for="symbol" class="col-md-2 control-label">Symbol</label>
    <div class="col-md-10">
        <input class="form-control" name="symbol" type="text" id="symbol" value="{{ old('symbol', optional($currency)->symbol) }}" minlength="1" placeholder="Enter symbol here...">
        {!! $errors->first('symbol', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('vallue') ? 'has-error' : '' }}">
    <label for="vallue" class="col-md-2 control-label">Vallue</label>
    <div class="col-md-10">
        <input class="form-control" name="vallue" type="text" id="vallue" value="{{ old('vallue', optional($currency)->vallue) }}" minlength="1" placeholder="Enter vallue here...">
        {!! $errors->first('vallue', '<p class="help-block">:message</p>') !!}
    </div>
</div>

