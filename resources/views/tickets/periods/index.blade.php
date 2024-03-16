<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">All Data Role</h4>
            @can(\App\Enums\Permission::TICKETS_PERIODS_STORE->value)
                <x-button-create :create-url="route('tickets.periods.create')"></x-button-create>
            @endcan
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quota</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($periods as $period)
                            <tr>
                                <td class="text-bold-500">{{$period->name}}</td>
                                <td class="text-bold-500">{{$period->quota}}</td>
                                <td class="text-bold-500">{{$period->start_date}}</td>
                                <td class="text-bold-500">{{$period->end_date}}</td>
                                <td class="text-bold-500">
                                    <span class="badge @if($period->is_active) bg-success @else bg-danger @endif ">
                                        @if($period->is_active)
                                            Active
                                        @else
                                            Non-Active
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <x-button-edit :edit-url="route('tickets.periods.edit', $period->id)"></x-button-edit>
                                    <x-button-delete :id="$period->id"></x-button-delete>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @can(\App\Enums\Permission::TICKETS_PERIODS_DESTROY->value)
        <x-modal-delete :delete-url="route('tickets.periods.destroy', ':id')"></x-modal-delete>
    @endcan
</x-layouts.dashboard.layout>
