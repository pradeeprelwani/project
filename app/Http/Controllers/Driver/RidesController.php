<?php

namespace App\Http\Controllers\Driver;

use App\Rides;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Repositories\RidesRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RidesController extends Controller {

    protected $base, $rides;

    public function __construct() {
        $this->base = new BaseRepository(new Rides());
        $this->rides = new RidesRepository(new Rides());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $driver_id = Auth::guard('drivers')->user()->id;
            return datatables($this->rides->getNearByRides())
                            ->addColumn('id', function ($rides) {
                                return '<input  onclick="selectCheckbox(this)" class="rides_checkbox dt-body-center" type="checkbox" value="' . $rides->id . '" name="rides[]">';
                            })
                            ->addColumn('rider', function ($rides) {
                                return $rides->rider[0]->name;
                            })
                            ->addColumn('rider_phone', function ($rides) {
                                return $rides->rider[0]->phone;
                            })
                            ->addColumn('status', function ($rides) {
                                return $status = '<span class="badge badge badge-info">' . ucfirst($rides->status) . '</span>';
                            })
                            ->addColumn('action', function ($rides) {
                                return '<a href="javascript:void()" data-id="' . $rides->id . '" data-type="accepted"  onclick="changeRideStatus(this)"  title="Accept"><i class="btn btn-success btn-sm fa fa-check" aria-hidden="true"></i></a>'
                                        . ' <a href="javascript:void()" data-id="' . $rides->id . '" data-type="rejected"   onclick="changeRideStatus(this)"  title="Reject"><i class="btn btn-danger btn-sm fa fa-trash" aria-hidden="true"></i></a>';
                            })
                            ->rawColumns(['id', 'status', 'rider', 'rider_email', 'rider_phone', 'action'])
                            ->make(true);
        }
        return view('driver.rides.index');
    }

    public function changeRideStatus(Request $request) {
        if ($request->ajax()) {

            $this->validate($request, [
                'status' => 'in:rejected,accepted',
            ]);
            try {
                $condition = ['driver_id' => Auth::guard('drivers')->user()->id, 'status' => $request->status];
                $this->base->updateMultiple($condition, explode(",",$request->id));
                return ['message' => 'Ride ' . ucfirst($request->status) . '  successfully', 'status' => true, 'url' => route('rides.index')];
            } catch (\Exception $e) {
                return ['message' => $e->getMessage(), 'status' => false];
            }
        } else {
            return ['message' => 'Invalid access', 'status' => false];
        }
    }

}
