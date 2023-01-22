@extends('layouts.main')

@section('container')

@if (session()->has('updateData'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session ('updateData') }}
        <?php session()->forget('updateData'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h1>hallo {{ $user->name }}</h1>

<form action="/user" method="post">
    @csrf
    <label class="badge bg-primary text-wrap" style="width: 10rem;" for="userInfoId">Id</label>
    <input type="number" id="userInfoId" name="userInfoId" value={{ $user->id }} readonly>
    <label class="badge bg-primary text-wrap" style="width: 10rem;" for="newPass">New Password</label>
    <input type="text" id="newPass" name="newPass" required>

    {{-- <input type="submit" class="btn btn-primary btn-lg"> --}}

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ganti Password
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
                    <button type="submit" class="btn btn-primary" name="newPass">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- 
<h1>hallo</h1> -->



@endsection