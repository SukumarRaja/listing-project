<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\AgentListingSceduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingSchedule;
use Illuminate\Http\Request;

class AgentListingScheduleController extends Controller
{
    public function index(AgentListingSceduleDataTable $dataTable, Request $request)
    {
        $dataTable->with('listingId', $request->id);
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();
        return $dataTable->render('frontend.dashboard.listing.schedule.index', compact('listingTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.dashboard.listing.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AgentListingSceduleDataTable $dataTable)
    {
        // dd($request->all());
        $request->validate([
            'listing_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule = new ListingSchedule();
        $schedule->day = $request->day;
        $schedule->listing_id = $request->listing_id;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        toastr()->success("Created Successfully");

        // return redirect()->back();

        return to_route('user.listing-schedule.index', ['id' => $schedule->listing_id]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule  = ListingSchedule::findOrFail($id);


        return view('frontend.dashboard.listing.schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'listing_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule =  ListingSchedule::findOrFail($id);
        $schedule->day = $request->day;
        $schedule->listing_id = $request->listing_id;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        toastr()->success("Updated Successfully");

        // return redirect()->back();
        return to_route('user.listing-schedule.index', ['id' => $schedule->listing_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = ListingSchedule::findOrFail($id);
        $schedule->delete();

        return response([
            'status' => 'success',
            'message' => 'Item deleted successfully'
        ]);
    }
}
