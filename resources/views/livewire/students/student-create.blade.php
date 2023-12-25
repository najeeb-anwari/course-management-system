<div>
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            {{ __("Create Student") }}
                        </h1>
                        <!-- Breadcrumb  -->
                        <livewire:breadcrumb :items="$breadcrumbItems" />
                    </div>
                    <div>
                        <a wire:navigate href="{{ route('students.index') }}" class="btn btn-primary">{{ __("Back to List") }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <livewire:students.student-form />
        </div>

    </section>

</div>
