@extends('layouts.app')
@section('content')
    
    <div style="padding:100px">
        <header>
            <h1 class="judul"><strong>ANTI THEFT INFORMATION SYSTEM</strong></h1>
            <h3 class="deskripsi"><strong>HADI KISWANTooO</strong></h3>
        </header>

        <div class="menu">
            <ul>
                <li><a href="{{route('index')}}">HOME</a></li>
                <li><a href="{{'data'}}">DATA</a></li>
            </ul>
        </div>

        <div class="loading">
                <div class="lds-dual-ring"> Loading...</div>
        </div>

        <div class="menu1" style="display:none">
            {{--  <div class="loading">
                <div class="lds-dual-ring"> Loading...</div>
            </div>  --}}
            <div id="lokasi"></div>

            @if (isset($umar))
            
                <table id="kendaraan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Plat</th>
                            <th>Merek</th>
                            <th>Type</th>
                            <th>Jenis</th>
                            <th>Model</th>
                            <th>Tahun</th>
                            <th>Kapasitas BBM</th>
                            <th>No Rangka</th>
                            <th>No Mesin</th>
                            <th>TGL FAK</th>
                            <th>Bahan Bakar</th>
                            <th>Warna</th>
                            <th>No Polisi Lama</th>
                            <th>Kepemilikan</th>
                            <th>No Dokumen</th>
                            <th>Masa STNK</th>
                        </tr>
                    </thead>
                </table>  

            @else
                {{--  <div class="tampil" style="display: none">  --}}
                    <table id="lokasi-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Foto</th>
                                <th>URL</th>
                                <th>Test</th>
                            </tr>
                        </thead>
                    </table>
                {{--  </div>    --}}

                <script type="text/javascript">
                    $(document).ready(function() {
                        if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function (position) {
                                tampilLokasi(position);
                        }, function (e) {
                            alert('Geolocation Tidak Mendukung Pada Browser Anda');
                        }, {
                            enableHighAccuracy: true
                        });
                        }
                    });
                    function tampilLokasi(posisi) {
                        //console.log(posisi);
                        var foto = 'foto';
                        var latitude 	= posisi.coords.latitude; //bisa diisi sesuai kemauan
                        var longitude 	= posisi.coords.longitude; //bisa diisi sesuai kemauan
                        $.ajax({
                            type 	: 'GET',
                            url		: '{{ route("lokasi") }}',
                            data 	: 'latitude='+latitude+'&longitude='+longitude+'&foto='+foto,
                            success	: function (e) {
                                if (e) {
                                    //var max = 0;
                                    //$('#lokasi-table tbody').each(function() {
                                    //    var value = parseInt($(this).data('id'));
                                    //    max = (value > max) ? value : max;
                                    //});
                                    //alert(max);
                                    var html='<tr>';
                                    html+=('<td>'+0+'</td>');
                                    $.each(e, function(i, item) {
                                            html+='<td>'+item+'</td>';
                                    });
                                    html+='</tr>';
                                    $('#lokasi-table tbody').append(html);
                                }else{
                                    $('#lokasi').html('Tidak Tersedia');
                                }
                            }
                        });
                    }
                </script> 
            @endif      
    </div>

    <script>
         //$(window).on('load',function() { 
          //  $('#kendaraan-table_wrapper').hide();
          //  $('#lokasi-table_wrapper').hide();
       //});
         $(document).ready( function () {
            
            //setInterval("$('.menu1').show();", 2000);

            //$('thead').show();
            // $('#kendaraan-table_wrapper').show();
             //$('#lokasi-table_wrapper').show();
            $('#kendaraan-table').DataTable({
                scrollX:true,
                processing: false,
                serverSide: true,
                ajax: '{!! route("lok", request()->all()) !!}',
                order: [[2, 'desc']],
                columns: [
                    { data: 'id', name: 'id', orderable: true},
                    { data: 'no_plat', name:'no_plat',orderable: false},
                    { data: 'merek', name: 'merek' },
                    { data: 'type', name: 'type'},
                    { data: 'jenis', name: 'jenis'},
                    { data: 'model', name: 'model'},
                    { data: 'tahun', name: 'tahun'},
                    { data: 'cc', name: 'cc'},
                    { data: 'no_rangka_nik', name: 'no_rangka_nik'},
                    { data: 'no_mesin', name: 'no_mesin'},
                    { data: 'tgl_fak', name: 'tgl_fak'},
                    { data: 'bahan_bakar', name: 'bahan_bakar', searchable: false},
                    { data: 'warna_tnkb', name: 'warna_tnkb'},
                    { data: 'no_pol_lama', name: 'no_pol_lama'},
                    { data: 'kepemilikan', name: 'kepemilikan'},
                    { data: 'no_dok', name: 'no_dok'},
                    { data: 'masa_stnk', name: 'masa_stnk'}
                ]
            });

            $('#lokasi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("index", request()->all()) !!}',
                order: [[2, 'desc']],
                columns: [
                    { data: 'id', name: 'id', orderable: true},
                    { data: 'longitude', name:'longitude',orderable: false},
                    { data: 'latitude', name: 'latitude',orderable: false },
                    { data: 'photo', name: 'foto',orderable: false},
                    { data: 'url', name: 'url',orderable: false},
                    { data: 'test', name: 'test',orderable: false}
                ]
            });
            $('.loading').show();
            $('.mwnu1').hide();
        });
         
         //$(window).on('load',function() { 
            //$('#kendaraan-table_wrapper').hide();
            //$('#lokasi-table_wrapper').hide();
       //});
    </script>

@endsection