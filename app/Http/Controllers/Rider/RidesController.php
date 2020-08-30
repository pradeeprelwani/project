<?php

namespace App\Http\Controllers\Rider;

use App\Rides;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RidesRepository;

class RidesController extends Controller {

    protected $base;

    public function __construct() {
        $this->base = new RidesRepository(new Rides());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            return datatables($this->base->getRidesByRiderId(Auth::user()->id))
                            ->addColumn('driver', function ($rides) {
                                return ucwords($rides->driver[0]->name);
                            })
                            ->addColumn('driver_email', function ($rides) {
                                return $rides->driver[0]->email;
                            })
                            ->addColumn('status', function ($rides) {
                                return ucfirst($rides->status);
                            })
                            ->rawColumns(['driver', 'status'])
                            ->make(true);
        }
        return view('rider.rides.index');
    }

    public function create() {
        return view('rider.rides.create');
    }

    public function store(Request $request) {

        if ($request->ajax()) {
            $this->validate($request, [
                'source_address' => 'required',
                'destination_address' => 'required'
            ]);
            try {
                $request['rider_id'] = Auth::user()->id;
              
                if (Rides::create($request->all())) {
                    return ['message' => 'Ride booked', 'status' => true];
                }
                throw new Exception("Something went wrong");

            } catch (\Exception $e) {
                return ['message' => $e->getMessage(), 'status' => false];
            }
        } else {
            return ['message' => "Invalid access", 'status' => false];
        }
    }

}
