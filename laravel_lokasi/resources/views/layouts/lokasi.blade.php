@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	{{--  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->  --}}
    {{--  <!-- <script
			  src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous">
    </script> -->  --}}
    <!-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
        
    <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300);
    body{
        background-color:#f9f9f9;
        font-size:16px
        color:#444;
        font-family: sans-serif;
    }

    .content{
        width: 80%;
        margin: 10px auto;
    }

    /*header*/
    header{
        background-color: white;
        padding: 20px 10px;
        border-radius: 5px;
        border: 1px solid #f0f0f0;
        margin-bottom: 10px;
    }

    header h1.judul,
    header h3.deskripsi{
        text-align: center;	
    }

    /*menu navigasi*/
    .menu1{
        border: 1px solid #f0f0f0;
        border-radius: 8px;	
    }

    .footer{
        background-color: #87CEFA;
        border: 1px solid #f0f0f0;
        border-radius: 8px;	
        margin-top: 10px;
        text-align:center;
        padding: 20px;
        font-weight: 900;
    }

    .menu{
        background-color: #87CEFA;
        border: 1px solid #f0f0f0;
        border-radius: 8px;	
        margin-bottom: 10px;
        padding-top: 20px;
    }

    div.menu ul {
        list-style:none;
        overflow: hidden;
    }


    div.menu ul li {
        float:left;		
        text-transform:uppercase;
    }

    div.menu ul li a {
        display:block;	
        padding:0 20px;
        text-decoration:none;
        color:#2c2c2c;
        font-family: sans-serif;
        font-size:13px;
        font-weight:400;
        transition:all 0.3s ease-in-out;
    }

    div.menu ul li a:hover,
    div.menu ul li a.hoverover {	
        cursor: pointer;	
        color:#fff;
    }


    div.badan{
        background-color: white;
        border-radius: 5px;
        border: 1px solid #f0f0f0;
        margin-bottom: 10px;
    }

    div.halaman{
        text-align: center;
        padding: 30px 20px;	
    }

    .d{
        /* margin-right: 90px; */
        position: relative;
        z-index: 999;
    }
  </style>
</head>
<body>
    
<div style="padding:100px">
	<header>
		<h1 class="judul"><strong>ANTI THEFT INFORMATION SYSTEM</strong></h1>
		<h3 class="deskripsi"><strong>HADI KISWANTooO</strong></h3>
	</header>

	<div class="menu">
		<ul>
			<li><a href="{{'lokasi'}}">HOME</a></li>
			<li><a href="{{'data'}}">DATA</a></li>
		</ul>
	</div>

    {{--  <div class="loading">
            <div class="lds-dual-ring"> Loading...</div>
        </div>  --}}
	<div class="menu1">
        <div class="loading">
            <div class="lds-dual-ring"> Loading...</div>
        </div>
          <div id="lokasi"></div>
        
        @if (isset($data))
            
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
                                alert(e);
                                $('#lokasi').html(e);
                            }else{
                                $('#lokasi').html('Tidak Tersedia');
                            }
                        }
                    });
                }
            </script> 
        
        @elseif (isset($umar))
           
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
                                alert(e);
                                $('#lokasi').html(e);
                            }else{
                                $('#lokasi').html('Tidak Tersedia');
                            }
                        }
                    });
                }
            </script> 

        @endif        
    @php
    @endphp

    <footer class="footer">
        CopyRight@2019 Fatkhul Umar || CV.GLOBAL SOLUSINDO
    </footer>
</div>

</body>
</html>
{{--  
    <div class="container">
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
    </div>
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
                url		: '{{ route("lokasidata") }}',
                data 	: 'latitude='+latitude+'&longitude='+longitude+'&foto='+foto,
                success	: function (e) {
                    if (e) {
                        alert(e);
                        $('.lokasi').html(e);
                        $('.loka').html(e);
                    }else{
                        $('.lokasi').html('Tidak Tersedia');
                    }
                }
            })
        }
        $(function() {
        $('#kendaraan-table').DataTable({
            scrollX:true,
            processing: true,
            serverSide: true,
            ajax: '{!! route("lokasi", request()->all()) !!}',
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
    });
    </script>  --}}

    <script>
        $(function() {
        $('#kendaraan-table').DataTable({
            scrollX:true,
            processing: true,
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
    });
            $(document).ready( function () {
                $('.loading').hide();
            });
    </script>
@endsection