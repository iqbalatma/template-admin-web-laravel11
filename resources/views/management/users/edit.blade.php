<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Data User</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{route('management.users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="mb-2">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="First name" name="first_name" value="{{$user->first_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="mb-2">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{$user->last_name}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="mb-2">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" disabled value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="row mt-4">
                            @foreach($roles as $role)
                                <div class="col-md-2">
                                    <div class="form-check form-switch form-check-inline mb-4">
                                        <input name="role_ids[]" class="form-check-input" type="checkbox"
                                               value="{{ $role->id }}" id="role_{{ $role->id }}">
                                        <label class="form-check-label"
                                               for="role_{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                            <x-button-back :back-url="route('management.users.index')"></x-button-back>
                            <x-button-submit></x-button-submit>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.dashboard.layout>
