@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h4>Packages</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.package.index') }}">Package</a></div>
                <div class="breadcrumb-item">Update</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Update Package <span class="text-danger">(For Unlimited Quantity Use -1)</span></h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.package.update', $package->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Package Type <span class="text-danger">*</span></label>
                                            <select name="type" id="" class="form-control">
                                                <option @selected($package->type === 'free') value="free">Free</option>
                                                <option @selected($package->type === 'paid') value="paid">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Package Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $package->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Package Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="price"
                                                value="{{ $package->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Days <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_days"
                                                value="{{ $package->number_of_days }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Listing <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_listings"
                                                value="{{ $package->number_of_listings }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Photo <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="number_of_photos"
                                                value="{{ $package->number_of_photos }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Videos <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_videos"
                                                value="{{ $package->number_of_videos }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Amenities <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_amenities"
                                                value="{{ $package->number_of_amenities }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Featured Listing <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="number_of_featured_listings"
                                                value="{{ $package->number_of_featured_listings }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Show At Home <span class="text-danger">*</span></label>
                                            <select name="show_at_home" id="" class="form-control">
                                                <option @selected($package->show_at_home === 0) value="0">No</option>
                                                <option @selected($package->show_at_home === 1) value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option @selected($package->status === 1) value="1">Active</option>
                                                <option @selected($package->status === 0) value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
