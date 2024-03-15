<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Data Role</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{route('management.roles.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="mb-2">Role Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Role Name" name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="permission mt-4">
                                @foreach ($permissions as $key => $permissionGroup)
                                    <h5>{{ucwords($key)}}</h5>
                                    <hr>
                                    @foreach($permissionGroup as $subKey => $permission)
                                        <div class="form-check form-switch form-check-inline mb-4">
                                            <input name="permissions[]" class="form-check-input" type="checkbox"
                                                   value="{{ $permission->id }}" @if($permission->is_active) checked
                                                   @endif id="permission{{ $permission->id }}">
                                            <label class="form-check-label"
                                                   for="permission{{ $permission->id }}">{{ $permission->description }}</label>
                                        </div>
                                    @endforeach
                                    <br>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <x-button-submit></x-button-submit>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.dashboard.layout>
