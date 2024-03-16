<x-layouts.dashboard.layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Data Period</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{route('tickets.periods.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="mb-2">Period Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Period name" name="name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="quota" class="mb-2">Quota</label>
                                <input type="number" class="form-control" id="quota" placeholder="Quota" name="quota">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date" class="mb-2">Start Date</label>
                                <input type="date" class="form-control" id="start_date" placeholder="Quota" name="start_date">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date" class="mb-2">End Date</label>
                                <input type="date" class="form-control" id="end_date" placeholder="Quota" name="end_date">
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-end gap-2">
                            <x-button-back :back-url="route('tickets.periods.index')"></x-button-back>
                            <x-button-submit></x-button-submit>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.dashboard.layout>
