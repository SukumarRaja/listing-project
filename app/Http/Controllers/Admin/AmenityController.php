<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityStoreRequest;
use App\Models\Amenity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AmenityDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.amenity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityStoreRequest $request): RedirectResponse
    {
        $amenity = new Amenity();

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->status = $request->status;
        $amenity->slug = Str::slug($request->name);
        $amenity->save();

        toastr()->success('Created Successfully');
        return to_route('admin.amenity.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $amenity = Amenity::findOrFail($id);

        return view('admin.amenity.edit',compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amenity =  Amenity::findOrFail($id);

        $amenity->name = $request->name;
        $amenity->icon = $request->filled('icon') ? $request->icon : $amenity->icon;
        $amenity->status = $request->status;
        $amenity->slug = Str::slug($request->name);
        $amenity->save();

        toastr()->success('Updated Successfully');
        return to_route('admin.amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $amenity =  Amenity::findOrFail($id);
            $amenity->delete();

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
