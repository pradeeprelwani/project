<?php

namespace App\Http\Controllers\Rider;

use App\RiderCard;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class CardController extends Controller {

    protected $base;

    public function __construct() {
        $this->base = new BaseRepository(new RiderCard());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            return datatables($this->base->listing(['rider_id'=>Auth::user()->id]))
                            ->addColumn('action', function ($cars) {
                                return '<a href="#"    class="btn btn-primary" title="Edit">Button</a>';
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('rider.card.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('rider.card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if ($request->ajax()) {
            $this->validate($request, [
                'card_number' => 'required|digits_between:16,16|numeric',
                'card_holder' => 'required',
                'expiry_month' => 'required|numeric|numeric|min:1|max:2',
                'expiry_year' => 'required||digits_between:4,4|numeric',
                'cvv' => 'required|min:3|max:3',
            ]);
            try {
                $request['rider_id'] = Auth::user()->id;
                if ($this->base->create($request->all())) {
                    
                    return ['message' => 'Card create', 'status' => true];
                }
            } catch (\Exception $e) {
                return ['message' => $e->getMessage(), 'status' => false];
            }
        } else {
            return ['message' =>"Invalid access", 'status' => false];
        }
    }

   

}
