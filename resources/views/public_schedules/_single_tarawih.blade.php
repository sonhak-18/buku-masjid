<div class="col-12 col-md-12 col-lg-6 col-xl-4">
    <div class="text-secondary fs-5 row">
        <div class="col-auto"><i class="ti">&#xea52;</i> {{ $lecturing->day_name }}, {{ $lecturing->full_date }} </div>
        <div class="col-auto"><i class="ti">&#xf319;</i> {{ $lecturing->time }}</div>
    </div>
    <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
        <div class="timeline-text">
            <div class="lh-1">
                <h6 class="text-secondary m-0 text-uppercase">{{ __('lecturing.imam_name') }}</h6>
                <div class="text-secondary fw-bold">{{ $lecturing->imam_name }}</div>
            </div>
            <div class="lh-1 pt-3">
                <h6 class="text-secondary mb-1 text-uppercase">{{ __('lecturing.lecturer_name') }}</h6>
                <p class="bm-txt-primary fw-bold">{{ $lecturing->lecturer_name }}</p>
            </div>
        </div>
    </div>
</div>
