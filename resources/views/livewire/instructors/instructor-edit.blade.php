<div>
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            Edit Instructor
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item"><a href="/instructors">{{ __("Instructor") }}</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __("Edit") }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="/instructors" class="btn btn-primary">{{ __("Back to List") }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <livewire:instructors.instructor-form :instructor="$instructor" />
        </div>

    </section>

</div>
