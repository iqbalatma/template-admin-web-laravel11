<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Data Role</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Guard Name</th>
                            <th>Description</th>
                            <th>Feature Group</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $role)
                            <tr>
                                <td class="text-bold-500">{{$role->name}}</td>
                                <td>{{$role->guard_name}}</td>
                                <td>{{$role->description}}</td>
                                <td>{{$role->feature_group}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard.layout>
