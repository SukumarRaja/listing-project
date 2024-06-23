<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingVideoGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ListingVideoGalleryController extends Controller
{

    use FileUploadTrait;
    public function index(Request $request)
    {
        $videos = ListingVideoGallery::where('listing_id', $request->id)->get();
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();
        return view('admin.listing.video-gallery.index', compact('videos', 'listingTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_url' => ['required', 'url'],
            'listing_id' => ['required']
        ]);

        $video = new ListingVideoGallery();
        $video->video_url = $request->video_url;
        $video->listing_id = $request->listing_id;
        $video->save();

        toastr()->success("Created Successfully");

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $video = ListingVideoGallery::findOrFail($id);
        $video->delete();

        return response([
            'status' => 'success',
            'message' => 'Item deleted successfully'
        ]);
    }
}
