<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">All Data User</h4>
            @can(\App\Enums\Permission::MANAGEMENT_USERS_STORE->value)
                <x-button-create :create-url="route('management.users.create')"></x-button-create>
            @endcan
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-bold-500">{{ucfirst($user->first_name)}}</td>
                                <td class="text-bold-500">{{ucfirst($user->last_name)}}</td>
                                <td class="text-bold-500">{{$user->email}}</td>
                                <td class="text-bold-500">
                                    @can(\App\Enums\Permission::MANAGEMENT_USERS_UPDATE->value)
                                    <x-button-edit
                                        :edit-url="route('management.users.edit', $user->id)"></x-button-edit>
                                    @endcan

                                    @can(\App\Enums\Permission::MANAGEMENT_USERS_DESTROY->value)
                                        <x-button-delete :id="$user->id"></x-button-delete>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>

    @can(\App\Enums\Permission::MANAGEMENT_USERS_DESTROY->value)
        <x-modal-delete :delete-url="route('management.users.destroy', ':id')"></x-modal-delete>
    @endcan
</x-layouts.dashboard.layout>
