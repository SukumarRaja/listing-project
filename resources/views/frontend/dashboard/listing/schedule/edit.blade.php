@extends('frontend.layouts.master')
@push('styles')
    <style>
        label {
            margin-top: 15px;
        }
    </style>
@endpush
@section('contents')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4 style="justify-content: space-between">Edit Listing Schedule
                                <a href="{{ route('user.listing-schedule.create') }}" class="btn btn-primary">Create</a>
                            </h4>
                            <div class="card-body">
                                <form action="{{ route('user.listing-schedule.update', $schedule->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Day<span class="text-danger">*</span></label>
                                        <select name="day" id="" class="form-control select2">
                                            <option value="">Choose</option>
                                            @foreach (config('listing-schedule.days') as $day)
                                                <option @selected($schedule->day === $day) value="{{ $day }}">
                                                    {{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Start Time <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control timepicker-1" name="start_time"
                                                    value="{{ $schedule->start_time }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">End Time <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control timepicker-2" name="end_time"
                                                    value="{{ $schedule->end_time }}">
                                                <input type="hidden" value="{{ $schedule->listing_id }}" name="listing_id">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="" class="form-control">
                                            <option @selected($schedule->status === 1) value="1">Active</option>
                                            <option @selected($schedule->status === 0) value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary mt-3" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.timepicker-1').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '{{ $schedule->start_time }}',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $('.timepicker-2').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '{{ $schedule->end_time }}',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
