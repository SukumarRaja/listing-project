<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    function index(): View
    {
        // $setting = Setting::first();
        return view('admin.setting.index');
    }

    function updateGeneralSetting(Request $request): RedirectResponse
    {
        $data =  $request->validate([
            'site_name' => 'required',
            'site_email' => 'required|email',
            'site_phone' => 'required',
            'site_default_currency' => 'required',
            'site_currency_icon' => 'required',
            'site_currency_position' => 'required|in:right,left',
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // cleard the cache
        $settingService = app(SettingService::class);
        $settingService->clearCachedSettings();

        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
}
