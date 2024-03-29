@extends('layouts.main')

@section('container')

<div class="badge bg-primary text-wrap mb-3" style="width: 9rem;">
    {{ $date }}
</div>

<form action="/dashboard" method="post">
    @csrf
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td><b>No</b></td>
                <td><b>Nama</b></td>
                <td><b>Email</b></td>
                <td><b>Waktu Datang</b></td>
                <td><b>Waktu Pulang</b></td>
                <td><b>Lama di Kantor</b></td>
            </tr>
            @foreach($users as $i => $user)
            <?php
                $presensi = App\Presensi::whereDate('waktu_datang', $date)
                    ->where('user_id',$user->id)
                    ->first();
            ?>
            <tr>
                <td>
                    {{$i+1}}
                </td>
    
                <td>
                    {{$user->name}}
                </td>
    
                <td>
                    {{$user->email}}
                </td>
    
                @if ($presensi && $presensi !== null)
                    <td class="text-success">{{ $presensi->waktu_datang->format('d F Y, h:i:s A') }}</td>
                @else
                    <td class="text-danger">Belum Absen</td>
                @endif
    
                @if ($presensi && $presensi->waktu_pulang !== null)
                    <td class="text-success">{{ $presensi->waktu_pulang->format('d F Y, h:i:s A') }}</td>
                @else
                    <td class="text-danger">Belum Pulang</td>
                @endif
                
                @if ($presensi !== null && $presensi->waktu_pulang !== null)
                    <?php 
                        $datangTimestamp = $presensi->waktu_datang->timestamp;
                        $pulangTimestamp = $presensi->waktu_pulang->timestamp;
                        $diff = $pulangTimestamp - $datangTimestamp;
                    ?>
                    <td class="text-success">{{ floor($diff/3600) }} jam, {{floor(fmod($diff,3600)/60)}} menit, {{fmod($diff,60)}} detik</td>
                    <!-- <td class="text-success">{{ $presensi->waktu_pulang->diffForHumans($presensi->waktu_datang) }}</td> -->
                @else
                    <td class="text-danger">Belum Pulang</td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    <div class="my-4">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required>
        <input type="submit">
    </div>
</form>

<a href="/dashboard2"><button type="button" class="btn btn-secondary btn-lg">Advanced search</button></a>
<!-- 
<h1>hallo</h1> -->



@endsection