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
                            <h4 style="justify-content: space-between">Create Listing Schedule
                                <a href="{{ route('user.listing-schedule.create') }}" class="btn btn-primary">Create</a>
                            </h4>
                            <div class="card-body">
                                <form action="{{ route('user.listing-schedule.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="">Day<span class="text-danger">*</span></label>
                                        <select name="day" id="" class="form-control select2">
                                            <option value="">Choose</option>
                                            @foreach (config('listing-schedule.days') as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Start Time <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control timepicker" name="start_time">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">End Time <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control timepicker" name="end_time">
                                                <input type="hidden" value="{{ request()->id }}" name="listing_id">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary mt-3" type="submit">Save</button>
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
@endpush
