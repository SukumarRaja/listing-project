@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h4>Packages</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.package.index') }}">Package</a></div>
                <div class="breadcrumb-item">Create</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Add Package <span class="text-danger">(For Unlimited Quantity Use -1)</span></h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.package.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Package Type <span class="text-danger">*</span></label>
                                            <select name="type" id="" class="form-control">
                                                <option value="free">Free</option>
                                                <option value="paid">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Package Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Package Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="price" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Days <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_days" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Listing <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_listings"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Photo <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="number_of_photos"
                                                value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Videos <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_videos"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Amenities <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="number_of_amenities"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Number of Featured Listing <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="number_of_featured_listings"
                                                value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Show At Home <span class="text-danger">*</span></label>
                                            <select name="show_at_home" id="" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
