<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ListingImageGalleryController extends Controller
{
    use FileUploadTrait;
    public function index(Request $request)
    {
        $images = ListingImageGallery::where('listing_id', $request->id)->get();
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();
        return view('admin.listing.image-gallery.index', compact('images', 'listingTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => ['required'],
            'listing_id' => ['required'],
            'images.*' => ['image', 'max:3000'],
        ], [
            'images.*.image' => 'One or more selected files are not valid images',
            'images.*.max' => 'One or more images exceed the maximum file size (3MB)',
        ]);

        $imagePaths = $this->uploadMultipleImage($request, 'images');

        foreach ($imagePaths as $path) {
            $image = new ListingImageGallery();
            $image->listing_id = $request->listing_id;
            $image->image = $path;
            $image->save();
        }

        toastr()->success('Updated Successfully');

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $image = ListingImageGallery::findOrFail($id);
        $this->deleteFile($image->image);
        $image->delete();

        return response([
            'status' => 'success',
            'message' => 'Item deleted successfully'
        ]);
    }
}
