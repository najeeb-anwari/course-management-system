<div>
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            {{ __('Students') }}
                            <span class="fs-5">{{ $totalStudents }}</span>
                        </h1>
                        <!-- Breadcrumb  -->
                        <livewire:breadcrumb :items="$breadcrumbItems" />
                    </div>
                    <div>
                        <a wire:navigate href="{{ route('students.create') }}" class="btn btn-primary">{{ __("Add New Student") }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-4">
                <input wire:model.live="search" type="search" class="form-control" placeholder="Search Student">
            </div>

            <div class="row">
                @if ($students?->isNotEmpty())
                    @foreach ($students as $item)
                        <div wire:key="{{ $item->id }}" class="col-xl-4 col-lg-6 col-md-6 col-12 d-flex">
                            <!-- Card -->
                            <div class="card mb-4 flex-fill">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ $item->photo_url ? asset('storage' . $item->photo_url) : '/assets/images/avatar/no-profile-pic.jpg' }}"
                                            class="rounded-circle avatar-xl mb-3" alt="">
                                        <h4 class="mb-0">{{ $item->name }}</h4>
                                        <p class="mb-0">{{ $item->email }}</p>
                                        <p class="mb-0">{{ $item->phone_number }}</p>
                                    </div>

                                </div>
                                <div class="card-footer d-flex justify-content-center gap-1">
                                    <a wire:navigate href="{{ route('students.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i>&nbsp{{ __("Edit") }}</a>
                                    <a wire:navigate href="{{ route('students.view', $item->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i>&nbsp{{ __("View") }}</a>
                                    <button wire:confirm wire:click="destroy({{ $item->id }})" class="btn btn-sm text-bg-danger"><i class="bi bi-trash"></i>&nbsp{{ __("Delete") }}</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="">
                        {{ $students->links(data: ['scrollTo' => false]) }}
                    </div>
                @else
                    <div class="alert alert-info">
                        No records where found
                    </div>
                @endif

            </div>
        </div>
    </section>
</div>
