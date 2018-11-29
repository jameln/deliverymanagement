
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($statuses)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Label</label>
    <div class="col-md-10">
        <input class="form-control" name="label" type="text" id="label" value="{{ old('label', optional($statuses)->label) }}" minlength="1" maxlength="255" placeholder="Enter label here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>

