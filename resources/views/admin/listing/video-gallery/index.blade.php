@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            {{-- <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div> --}}
            <h4>Listing Video Gallery</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">Listing</a></a></div>
                <div class="breadcrumb-item">Video Gallery</a></div>
            </div>
        </div>

        <div class="section-body">
            {{-- profile --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Video Gallery</h4>
                            {{-- <div class="card-header-action">
                                <a href="{{ route('admin.listing.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Create</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-video-gallery.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label for="">Video Url<code>*</code></label>
                                    <input type="text" name="video_url" class="form-control">
                                    <input type="hidden" value="{{ request()->id }}" name="listing_id">

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- All Images --}}
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
                        </div>
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
    </section>
@endsection
