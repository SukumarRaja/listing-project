<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PackageDataTable;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PackageDataTable $dataTable)
    {
        return $dataTable->render('admin.package.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:free,paid',
            'name' => 'required',
            'price' => 'required',
            'number_of_days' => 'required',
            'number_of_listings' => 'required',
            'number_of_photos' => 'required',
            'number_of_videos' => 'required',
            'number_of_amenities' => 'required',
            'number_of_featured_listings' => 'required',
            'show_at_home' => 'required',
            'status' => 'required',
        ]);
        $package = new Package();
        $package->type = $request->type;
        $package->name = $request->name;
        $package->price = $request->price;
        $package->number_of_days = $request->number_of_days;
        $package->number_of_listings = $request->number_of_listings;
        $package->number_of_photos = $request->number_of_photos;
        $package->number_of_videos = $request->number_of_videos;
        $package->number_of_amenities = $request->number_of_amenities;
        $package->number_of_featured_listings = $request->number_of_featured_listings;
        $package->show_at_home = $request->show_at_home;
        $package->status = $request->status;

        $package->save();

        toastr()->success('Created Successfully');

        return redirect()->route('admin.package.index');
    }


    public function edit(string $id)
    {
        $package = Package::findOrFail($id);

        return view('admin.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|in:free,paid',
            'name' => 'required',
            'price' => 'required',
            'number_of_days' => 'required',
            'number_of_listings' => 'required',
            'number_of_photos' => 'required',
            'number_of_videos' => 'required',
            'number_of_amenities' => 'required',
            'number_of_featured_listings' => 'required',
            'show_at_home' => 'required',
            'status' => 'required',
        ]);
        $package =  Package::findOrFail($id);
        $package->type = $request->type;
        $package->name = $request->name;
        $package->price = $request->price;
        $package->number_of_days = $request->number_of_days;
        $package->number_of_listings = $request->number_of_listings;
        $package->number_of_photos = $request->number_of_photos;
        $package->number_of_videos = $request->number_of_videos;
        $package->number_of_amenities = $request->number_of_amenities;
        $package->number_of_featured_listings = $request->number_of_featured_listings;
        $package->show_at_home = $request->show_at_home;
        $package->status = $request->status;

        $package->save();

        toastr()->success('Updated Successfully');

        return to_route('admin.package.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $package =  Package::findOrFail($id);
            $package->delete();

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
