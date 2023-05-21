<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlRequest;

class UrlRequestController extends Controller
{
    /**
     * Method to list Url shortening requests
     */
    public function index()
    {
        // @todo Add filters, Pagination, Sorting

        $urlRequests = UrlRequest::all();

        return response()->json([
            'success' => true,
            'data' => $urlRequests
        ]);

    }
    /**
     * Method to accept Url shortening request
     */
    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|string',
            'is_once' => 'nullable|boolean'
        ]);

        $newRequest = new UrlRequest;
        $newRequest->long_url = $request->long_url;
        $newRequest->is_once = $request->is_once?true:false;
        $newRequest->is_active = false;
        $newRequest->save();

        return response()->json([
            'success' => true,
            'message' => 'Url shortening in process.',
            'resource' => $newRequest->toArray()
        ]);
    }
    
}
