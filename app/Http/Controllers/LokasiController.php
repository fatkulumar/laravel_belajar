<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Kendaraan;
use Illuminate\Http\Request;
use DataTables;
use \Softon\LaravelFaceDetect\Facades\FaceDetect;

class LokasiController extends Controller
{
    protected $kendaraan;
    protected $lokasi;

    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
        // $this->lokasi = $lokasi;
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
            //     // ->setRowData(['IDStatusDokumen'=>'IDStatusDokumen'])
            //     // ->addColumn('URL', '<input type="checkbox" name="id[]" value="{{ $id }}">')
            //     // ->addColumn('G', 'backends.kpi.rencana.actionbuttons')
            //     // ->rawColumns(['checkall', 'Aksi'])
                 ->make(true);
        }
        return view('layouts.lokasi');
    }


    public function index(Request $request)
    {
        $filter = $request->all();
        
        if ($request->ajax()) {
            //FaceDetect::extract($imagefilepath)->save($savefilepath);
            $crop_params = (FaceDetect::extract('assets/c.jpg')->face_found)=='1'?'true':'false';
             return DataTables::of(Lokasi::get())
                ->setRowID('id')
                ->setRowData(['longitude'=>'longitude','latitude'=>'latitude'])
                ->addColumn('url', '<a href="http://maps.googleapis.com/maps/api/geocode/json?latlng={{trim($latitude)}},{{$longitude}}&sensor=false">Click Me</a>')
                ->editColumn('photo', '<img height="100px" src="{{asset(\'assets/pp.jpg\')}}"></img>')
                ->addColumn('test', $crop_params)
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
        $data = 'lorem';
        return view('layouts.lokasi', ['umar' => $data]);
    }

    public function lokasi(Request $request)
    {  
        // $lokasi = 'lokasi';
        // $loka = response()->json($lokasi);
        $data = null;
        if ($request->ajax()) {
            $data= $request->all();
            return response()->json([
            // json_encode($data)
            $request->latitude,
            $request->longitude,
            $request->foto,
            ]
        );
        //return view('layouts.lokasi')->with('data',$data);
        }
        return view('layouts.lokasi',['data'=>$request->all()]);
    }
}
