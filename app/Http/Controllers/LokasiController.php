<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Kendaraan;
use Illuminate\Http\Request;
use DataTables;
use \Softon\LaravelFaceDetect\Facades\FaceDetect;
use App\AppServices\Lokasi\StoreLokasiService;

class LokasiController extends Controller
{
    protected $kendaraan;
    protected $lokasi;
    protected $storeLokasiService;

    public function __construct(Kendaraan $kendaraan, StoreLokasiService $storeLokasiService)
    {
        $this->kendaraan = $kendaraan;
        $this->storeLokasiService = $storeLokasiService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lok(Request $request)
    {
        $filter = $request->all();
        if ($request->ajax()) {
             return DataTables::of(Kendaraan::get())
                 ->setRowID('id')
                 ->make(true);
        }
        return view('layouts.lokasi');
    }


    public function index(Request $request)
    {
        $filter = $request->all();
        if ($request->ajax()) {
            return DataTables::of(Lokasi::get())
                ->setRowID('id')
                ->setRowData(['longitude'=>'longitude','latitude'=>'latitude','id'=>'id'])
                ->addColumn('url', 
                '<a href="https://www.google.co.id/maps/place/7%C2%B056\'46.9%22S+112%C2%B036\'48.0%22E/@-7.9442466,112.6092563,15z/data=!4m5!3m4!1s0x0:0x0!8m2!3d{{$latitude}}{{$longitude}}">Click Me</a>')
                ->editColumn('photo', 
                '<a href="#img{{$id}}"><img class="thumbnail" height="100px" src="{{asset(\'assets/pp.jpg\')}}"></img></a>
                <a href="#_" class="lightbox" id="img{{$id}}"><img height="100%" src="{{asset(\'assets/pp.jpg\')}}"></img></a>')
                ->addColumn('test', $this->storeLokasiService->getCropParams())
                ->rawColumns(['url','photo'])
                ->make(true);
        }
        return view('layouts.lokasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi $lokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $lokasi)
    {
        //
    }

    public function data(Request $request)
    {
        return view('layouts.lokasi');
    }

    public function lokasi(Request $request)
    {
        $data = null;
        $result=false;
        try {
            if ($request->ajax()) {
                $result = $this->storeLokasiService->call($request->except('_token'));
                return response( /*flash()->success('Lokasi berhasil disimpan')->important()*/)->json([
                    $request->latitude,
                    $request->longitude,
                    $request->foto,
                ]);
            }
            
        } catch (\Exception $e) {
            flash()->error('h'.$e->getMessage())->important();
            return view('layouts.lokasi');
        }
        if($result){
            flash()->success('Lokasi berhasil disimpan')->important();
        }
        return view('layouts.lokasi',['data'=>$request->all()]);
    }
    
}
