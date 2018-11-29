
<div class="form-group {{ $errors->has('ref') ? 'has-error' : '' }}">
    <label for="ref" class="col-md-2 control-label">Ref</label>
    <div class="col-md-10">
        <input class="form-control" name="ref" type="text" id="ref" value="{{ old('ref', optional($language)->ref) }}" minlength="1" placeholder="Enter ref here...">
        {!! $errors->first('ref', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($language)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($language)->slug) }}" minlength="1" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rtl') ? 'has-error' : '' }}">
    <label for="rtl" class="col-md-2 control-label">Rtl</label>
    <div class="col-md-10">
        <input class="form-control" name="rtl" type="text" id="rtl" value="{{ old('rtl', optional($language)->rtl) }}" minlength="1" placeholder="Enter rtl here...">
        {!! $errors->first('rtl', '<p class="help-block">:message</p>') !!}
    </div>
</div>

