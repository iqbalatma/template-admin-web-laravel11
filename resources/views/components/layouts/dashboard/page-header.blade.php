<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Vertical Layout with Navbar</h3>
            <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    @foreach ($breadcrumbs as $key => $breadcrumb)
                        @if ($key == $lastBreadcrumbKey)
                            <li class="breadcrumb-item active">
                                {{ ucwords($key) }}
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $breadcrumb }}">{{ ucwords($key) }}</a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
