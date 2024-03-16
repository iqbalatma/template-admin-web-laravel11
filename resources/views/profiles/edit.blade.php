<x-layouts.dashboard.layout>
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Your Profile</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('profiles.update')}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="mb-2">First Name</label>
                                        <input type="text" class="form-control" id="first_name" placeholder="First name"
                                               name="first_name" value="{{$user->first_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="mb-2">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" placeholder="Last Name"
                                               name="last_name" value="{{$user->last_name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                               name="email"
                                               disabled value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                    <x-button-submit></x-button-submit>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Your Password</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('profiles.update.password')}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="old_password" class="mb-2">Old Password</label>
                                        <input type="password" class="form-control" id="old_password" placeholder="Old Password"
                                               name="old_password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="new_password" class="mb-2">New Password</label>
                                        <input type="password" class="form-control" id="new_password" placeholder="New Password"
                                               name="new_password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="new_password_confirmation" class="mb-2">New Password Confirmation</label>
                                        <input type="password" class="form-control" id="new_password_confirmation" placeholder="New Password Confirmation"
                                               name="new_password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end gap-2 mt-4">
                                    <x-button-submit></x-button-submit>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.dashboard.layout>
