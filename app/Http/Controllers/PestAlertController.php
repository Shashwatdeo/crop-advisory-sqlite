<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PestAlert;

class PestAlertController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->input('location');
        $crop = $request->input('crop');

        $query = PestAlert::query();

        if ($location) {
            $query->where('location', 'like', "%$location%");
        }

        if ($crop) {
            $query->where('crop', 'like', "%$crop%");
        }

        $alerts = $query->get();

        return view('pest_alerts.index', compact('alerts', 'location', 'crop'));
    }

    public function filter(Request $request)
    {
        // Get the filter parameters from the request
        $region = $request->input('location');
        $crop = $request->input('crop');
        $severity = $request->input('severity');

        // Query the database based on filters
        $alerts = PestAlert::query()
            ->when($region && $region != 'All Regions', function($query) use ($region) {
                return $query->where('region', $region);
            })
            ->when($crop && $crop != 'All Crops', function($query) use ($crop) {
                return $query->where('crop_type', $crop);
            })
            ->when($severity && $severity != 'All Levels', function($query) use ($severity) {
                return $query->where('severity', $severity);
            })
            ->get();

        // Return the filtered results to the view
        return view('pest_alerts.index', compact('alerts'));
    }

}
