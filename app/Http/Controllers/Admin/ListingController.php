<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListingStoreRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class ListingController extends Controller
{

    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ListingDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.listing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();
        return view('admin.listing.create', compact('categories', 'locations', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|unique:listings,title'
        ]);

        $imagePath = $this->uploadImage($request, 'image');
        $thumbnailImagePath = $this->uploadImage($request, 'thumbnail_image');
        $attachmentPath = $this->uploadImage($request, 'attachment');

        $listing = new Listing();
        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->email = $request->email;
        $listing->image = $imagePath;
        $listing->thumbnail_image = $thumbnailImagePath;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->website = $request->website;
        $listing->facebook_link = $request->facebook_link;
        $listing->x_link = $request->x_link;
        $listing->linkedin_link = $request->linkedin_link;
        $listing->whatsapp_link = $request->whatsapp_link;
        $listing->file = $attachmentPath;
        $listing->description = $request->description;
        $listing->goolge_map_embed_code = $request->goolge_map_embed_code;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_featured = $request->is_featured;
        $listing->is_verified = $request->is_verified;
        $listing->expire_date = date('Y-m-d');
        $listing->save();

        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('Created Successfully');
        return to_route('admin.listing.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::findOrFail($id);

        $listingAmenities = ListingAmenity::where('listing_id', $listing->id)->pluck('amenity_id')->toArray();

        $categories = Category::all();
        $amenities = Amenity::all();
        $locations = Location::all();

        return view('admin.listing.edit', compact('categories', 'amenities', 'locations', 'listing', 'listingAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required', 'string', 'max:255', 'unique:listings,title,'.$request->title,
        ]);

        $imagePath = $this->uploadImage($request, 'image', $request->old_image);
        $thumbnailImagePath = $this->uploadImage($request, 'thumbnail_image', $request->old_thumbnail_image);
        $attachmentPath = $this->uploadImage($request, 'attachment', $request->old_attachment);

        $listing =  Listing::findOrFail($id);
        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->email = $request->email;
        $listing->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $listing->thumbnail_image = !empty($thumbnailImagePath) ? $thumbnailImagePath : $request->old_thumbnail_image;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->website = $request->website;
        $listing->facebook_link = $request->facebook_link;
        $listing->x_link = $request->x_link;
        $listing->linkedin_link = $request->linkedin_link;
        $listing->whatsapp_link = $request->whatsapp_link;
        $listing->file = !empty($attachmentPath) ? $attachmentPath : $request->old_attachment;
        $listing->description = $request->description;
        $listing->goolge_map_embed_code = $request->goolge_map_embed_code;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_featured = $request->is_featured;
        $listing->is_verified = $request->is_verified;
        $listing->expire_date = date('Y-m-d');
        $listing->save();

        ListingAmenity::where('listing_id', $listing->id)->delete();

        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('Updated Successfully');
        return to_route('admin.listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $listing =  Listing::findOrFail($id);
            $listing->delete();

            return response([
                'status' => 'success',
                'message' => 'Item deleted successfully'
            ]);
        } catch (\Exception $e) {
            logger($e);
            return response([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
