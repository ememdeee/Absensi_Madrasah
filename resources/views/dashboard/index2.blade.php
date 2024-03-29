@extends('layouts.main')

@section('container')

<!-- id tidak terdaftar -->
@if(session()->has('nameError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session ('nameError') }}
    <?php session()->forget('nameError'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('gantiLok'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session ('gantiLok') }}
        <?php session()->forget('gantiLok'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('updateData'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session ('updateData') }}
        <?php session()->forget('updateData'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<p class="fs-1 fw-bold">Untuk mengetahui informasi per-user, lakukan pencarian by name.</p>

<div class="badge bg-primary text-wrap mb-3" style="width: 21rem;">
    {{ $date ?? "Masukan Tanggal dan Nama untuk menampilkan hasil!" }}
</div>

<form action="/dashboard2" method="post">
    @csrf
    @if (session()->has('tampilkan'))
    <?php
    $totalJam=0;
    $totalHadir=0;
    $totalAbsen=0;
    session()->forget('tampilkan');
    ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td><b>Tanggal</b></td>
                <td><b>Id</b></td>
                <td><b>Nama</b></td>
                <td><b>Email</b></td>
                <td><b>Waktu Datang</b></td>
                <td><b>Waktu Pulang</b></td>
                <td><b>Lama di Kantor</b></td>
            </tr>
            @foreach ($date as $dt)
            <?php
                $presensi = App\Presensi::whereDate('waktu_datang', $dt)
                    ->where('user_id',$user->id)
                    ->first();
            ?>
            <tr>
                <td>
                    {{$dt->format("Y-m-d")}}
                </td>

                <td>
                    {{$user->id}}
                </td>
    
                <td>
                    {{$user->name}}
                </td>
    
                <td>
                    {{$user->email}}
                </td>
    
                @if ($presensi && $presensi->waktu_datang !== null)
                    <?php
                    $totalHadir=$totalHadir+1;
                    ?>
                    <td class="text-success">{{ $presensi->waktu_datang->format('d F Y, h:i:s A') }}</td>
                @else
                    <?php
                    $totalAbsen=$totalAbsen+1;
                    ?>
                    <td class="text-danger">Belum Absen</td>
                @endif
    
                @if ($presensi && $presensi->waktu_pulang !== null)
                    <td class="text-success">{{ $presensi->waktu_pulang->format('d F Y, h:i:s A') }}</td>
                @else
                    <td class="text-danger">Belum Pulang</td>
                @endif
                
                @if ($presensi && $presensi !== null && $presensi->waktu_pulang !== null)
                    <?php 
                        $datangTimestamp = $presensi->waktu_datang->timestamp;
                        $pulangTimestamp = $presensi->waktu_pulang->timestamp;
                        $diff = $pulangTimestamp - $datangTimestamp;
                        $totalJam=$totalJam+$diff;
                    ?>
                    <td class="text-success">{{ floor($diff/3600) }} jam, {{floor(fmod($diff,3600)/60)}} menit, {{fmod($diff,60)}} detik</td>
                    <!-- <td class="text-success">{{ $presensi->waktu_pulang->diffForHumans($presensi->waktu_datang) }}</td> -->
                @else
                    <td class="text-danger">Belum Pulang</td>
                @endif
            </tr>

            {{-- @foreach ($date as $dt)
            {{$dt->format("Y-m-d")}}
            <?php
            echo $dt->format("Y-m-d") . "<br>\n";
            ?> --}}
            @endforeach
        </table>
        <button type="button" class="btn btn-lg btn-primary" disabled>Total Jam: {{ floor($totalJam/3600) }} jam, {{floor(fmod($totalJam,3600)/60)}} menit, {{fmod($totalJam,60)}} detik</button>
        <button type="button" class="btn btn-success btn-lg" disabled>Total Hadir: {{ $totalHadir }} kali</button>
        <button type="button" class="btn btn-secondary btn-lg" disabled>Total Tidak Hadir: {{ $totalAbsen }} kali</button>
    </div>
    @endif
    <div class="mb-4">
        <label class="badge bg-primary text-wrap" style="width: 8rem;" for="tanggal">dari tanggal:</label>
        <input class="form-control" style="width:11rem;" type="date" id="startTanggal" name="startTanggal" required value = "{{old('startTanggal')}}">
        <label class="badge bg-primary text-wrap mt-2" style="width: 8rem;" for="tanggal">sampai tanggal:</label>
        <input class="form-control" style="width:11rem;" type="date" id="endTanggal" name="endTanggal" required value = "{{old('endTanggal')}}">
        {{-- <input type="month" id="bulan" name="bulan" min="2018-03"> --}}
        <BR>
        <label class="badge bg-primary text-wrap" style="width: 8rem;" for="userName">User Name:</label>
        <input type="userName" id="userName" name="userName" required value = "{{old('userName')}}">
        <input type="submit" value="Submit" class="btn btn-primary btn-lg">
    </div>
</form>

<p class="fs-1 fw-bold">More Setting</p>
<p class="fs-2 fw-normal">Change Location</p>
<!-- gantilokasi -->
<form action="/dashboard2" method="post">
    @csrf
    <label class="badge bg-primary text-wrap" style="width: 10rem;" for="Lokasi">Lokasi Kantor (Lat, Lon):</label>
    <input type="lat" id="lat" name="lat" required>
    <input type="lon" id="lon" name="lon" required>
    <!-- <input type="submit" name="gantiLok">
        <p class="text-danger">Masukan lokasi yang valid!</p> -->
        
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ganti Lokasi Kantor
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Perubahan Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin? input akan disimpan dan tidak bisa dikembalikan lagi!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="gantiLok">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- <h1>hallo</h1> -->

<p class="fs-2 fw-normal">User Info</p>
<!-- userInfo -->
<form action="/user" method="post">
    @csrf
    <label class="badge bg-primary text-wrap" style="width: 10rem;" for="userInfoId">Username</label>
    <input type="number" id="userInfoId" name="userInfoId" required>
        
    <input type="submit" class="btn btn-primary btn-lg">
</form>


@endsection