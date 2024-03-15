<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">All Data Role</h4>
            <x-button-create :create-url="route('management.roles.create')"></x-button-create>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Guard Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td class="text-bold-500">{{$role->name}}</td>
                                <td>{{$role->guard_name}}</td>
                                <td>
                                    @if($role->is_mutable)
                                        <x-button-edit :edit-url="route('management.roles.edit', $role->id)"></x-button-edit>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard.layout>
