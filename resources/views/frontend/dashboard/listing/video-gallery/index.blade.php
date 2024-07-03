@extends('frontend.layouts.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                            <h4>Video Gallery - {{ $listingTitle->title }}</h4>
                            <div class="card-body">
                                <form action="{{ route('user.listing-video-gallery.store') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="form-group">
                                        <label for="">Video Url<code>*</code></label>
                                        <input type="text" name="video_url" class="form-control">
                                        <input type="hidden" value="{{ request()->id }}" name="listing_id">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-3">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="my_listing mt-5">
                            <h4>All Videos</h4>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Video Url</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <th>{{ ++$loop->index }}</th>
                                                <td><img src="{{ getYtThumbnail($video->video_url) }}" alt=""
                                                        width="100px" class="m-2 rounded"></td>
                                                <td><a target="_blank"
                                                        href="{{ $video->video_url }}">{{ $video->video_url }}</a></td>
                                                <td>
                                                    <a href="{{ route('admin.listing-video-gallery.destroy', $video->id) }}"
                                                        class="btn btn-danger btn-sm delete-item"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script></script>
@endpush
