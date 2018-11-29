<div  class="text-left">

    <div class="form-group">
        <label class="label-control"><b>{{__('user.email')}} : </b> {{ $user->email }}</label>
    </div>
    <div class="form-group">
        <label class="label-control"><b>{{__('user.name')}} : </b> {{ $user->name }}</label>
    </div>
    <div class="form-group">
        <label class="label-control"><b>{{__('user.status')}} : </b> {{ $user->status == 1 ? __('user.enabled') : __('user.disabled') }}</label>
    </div>
    <div class="form-group">
        <label class="label-control"><b>{{__('global.default_language')}} : </b> {{ __('sidebar.'.$user->language->name) }}</label>
    </div>
    <div class="form-group">
        <label class="label-control"><b>{{__('user.role')}} : </b> {{ $user->role->name }}</label>
    </div>
    <div class="form-group">
        <label class="label-control"><b>{{__('global.created_at')}} : </b> {{ $user->created_at }}</label>
    </div>
    <div class="form-group">
        <label class="label-control"><b>{{__('global.updated_at')}} : </b> {{ $user->updated_at }}</label>
    </div>

</div>