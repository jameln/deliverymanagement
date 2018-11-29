<div class="clearfix"></div>
<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{__('List of all users')}}</h4>
        </div>

    </div>
    
    @if(count($users) == 0)
        <div class="panel-body text-center">
            <h4>No user found!</h4>
        </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>language</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->language->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>        
    @endif
</div>