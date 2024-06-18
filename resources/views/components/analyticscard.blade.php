@php
    $heading = $heading ?? 'Heading';
    $value = $value ?? '0';
    $icon = $icon ?? 'bx bx-user-circle';
    $color = $color ?? 'success';
    $desc = $desc ?? '';
    $action = $action ?? '#';
@endphp

<div class="col-xl-3 col-md-6">
    <!-- card -->
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">{{ $heading }}</p>
                </div>
            </div>
            <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <span class="counter-value" data-target="{{ $value }}">{{ $value }}</span>
                    </h4>
                    <a href="{{ $action }}" class="text-decoration-underline">{{ $desc }}</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-soft-{{ $color }} rounded fs-3">
                        <i class="{{ $icon }} font-size-24 text-{{ $color }}"></i>
                    </span>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->
