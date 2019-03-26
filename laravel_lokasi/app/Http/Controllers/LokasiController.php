<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Kendaraan;
use Illuminate\Http\Request;
use Yajra\DataTables\CollectionDataTable;
use Yajra\Datatables\Facades\Datatables;

class LokasiController extends Controller
{
    protected $kendaraan;

    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        if ($request->ajax()) {
            // return Datatables::collection(Kendaraan::all()->toJson())
            //     ->setRowID('id')
            //     // ->setRowData(['IDStatusDokumen'=>'IDStatusDokumen'])
            //     // ->addColumn('URL', '<input type="checkbox" name="id[]" value="{{ $id }}">')
            //     // ->addColumn('G', 'backends.kpi.rencana.actionbuttons')
            //     // ->rawColumns(['checkall', 'Aksi'])
            //     ->make(true);
            $collection = Kendaraan::all();

            return (new CollectionDataTable($collection))->toJson();
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
