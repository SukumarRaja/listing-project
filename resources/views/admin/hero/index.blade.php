@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            {{-- <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div> --}}
            <h4>Hero</h4>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Hero</a></div>
        </div>
        </div>

        <div class="section-body">
            {{-- profile --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Hero</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Background</label>
                                    <div id="image-preview" class="image-preview avatar-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="background" id="image-upload" />
                                        <input type="hidden" name="old_background" value="{{ @$hero->background }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ @$hero->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Title <span class="text-danger">*</span></label>
                                    <textarea name="sub_title" class="form-control">{{ @$hero->sub_title }}</textarea>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.avatar-preview').css({
                'background-image': 'url({{ asset(@$hero->background) }})',
                'background-size': 'cover',
                'background-position': 'center center',
            });
        })
    </script>
@endpush
