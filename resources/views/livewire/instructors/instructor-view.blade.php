<div>
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            {{ __('View Instructor') }}
                        </h1>
                        <!-- Breadcrumb  -->
                        <livewire:breadcrumb :items="$breadcrumbItems" />
                    </div>
                    <div>
                        <a wire:navigate href="{{ route('instructors.index') }}"
                            class="btn btn-primary">{{ __('Back to List') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="card col-md-8">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-4">
                            @if ($instructor->photo_path)
                                <img class="rounded-circle" style="max-width: 150px"
                                    src="{{ asset('storage' . $instructor->photo_path . $instructor->photo_name) }}"
                                    alt="Instructor photo">
                            @else
                                <p>{{ __('No photo available') }}</p>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h1>{{ $instructor->name }}</h1>
                            <p>{{ __("Father's Name") }}: {{ $instructor->father_name }}</p>
                            <p>{{ __('Position') }}: {{ $instructor->position }}</p>
                            <p>{{ __('Phone Number') }}: {{ $instructor->phone_number }}</p>
                            <p>{{ __('Email') }}: {{ $instructor->email }}</p>
                            <p>{{ __('Joined at') }}: {{ $instructor->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

</div>
