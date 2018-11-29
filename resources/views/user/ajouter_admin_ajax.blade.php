    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="radio" >
                    <label>{{ __('user.type_compte')}}</label>
                    <label><input type="radio" name="parent[gender]"> Administrateur </label>
                    <label><input type="radio" name="parent[gender]"> Visiteur </label>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label class="label-control">{{ __('user.name')}}</label>
                <input type="text" class="form-control" value="" placeholder="">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label class="label-control">{{ __('user.last_name')}}</label>
                <input type="text" class="form-control" value="" placeholder="">
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label class="label-control">{{ __('user.email')}}</label>
                <input type="number" class="form-control" value=""  min="0" max="99999999">
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group">
                <label class="label-control">{{ __('user.pwd')}}</label>
                <input type="number" class="form-control" value="" min="0" max="99999999">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label class="label-control">{{ __('user.cpwd')}}</label>
                <input type="number" class="form-control" value="" min="0" max="99999999">
            </div>
        </div>

    </div>

