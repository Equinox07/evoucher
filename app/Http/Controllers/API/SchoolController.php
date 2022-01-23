<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SchoolResource;
use App\Models\Schools;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public $schools;
    public function __construct(Schools $schools )
    {
        $this->schools = $schools;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = $this->schools::all();
        return SchoolResource::collection($schools);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = $this->schools::create($request->all());
        return new SchoolResource($school);
    }
}
