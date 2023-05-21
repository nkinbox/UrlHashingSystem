<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\Analytics;
use App\Events\NewIncomingRequest;

class UrlController extends Controller
{
    /**
     * Method to capture incoming slug
     * @param $request Request
     * @param $short_url String
     * 
     * @return 301 Redirect or 404 Not Found
     */
    public function index(Request $request, $short_url)
    {
        // save incoming request data to Analytics for further processing
        NewIncomingRequest::dispatch([
            'short_url' => $short_url,
            'full_url' => $request->fullUrl(),
            'request_headers' => $request->header()
        ]);

        // check if short url exists and is Active
        $url = Url::where('short_url', $short_url)->first();
        if (!empty($url) && $url->is_active) {

            // if URL is clickable only once then inactivate it
            if ($url->is_once) {
                $url->is_active = false;
                $url->save();
            }
            return redirect($url->long_url);
        }
        // Abort if no Url is found
        // @todo Add tracking to not found URLs
        abort(404);
    }
}
