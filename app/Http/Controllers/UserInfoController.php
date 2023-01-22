<?php

namespace App\Http\Controllers;
use Auth;

use App\User;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        // $hasil= Auth::user();
        // return view ('dashboard.index3', ['user' => $hasil]);
        return redirect ('/dashboard2');
    }

    public function userInfo(Request $request)
    {
        if ($request->has('newPass')) {       
            $hasil=User::where('id', $request->userInfoId)->First();
            $hasil-> password = bcrypt($request->newPass);
            $hasil->save();
            // $lokasi = Config::first();
            // $lokasi-> lat = $request->lat;
            // $lokasi-> lon = $request->lon;
            // $lokasi-> save();

            $request->session()->flash('updateData',"Data user berhasil diupdate!");
            return redirect('/dashboard2');
        }
        $hasil=User::where('id', $request->userInfoId)->First();
        if($hasil==null)
        {
            return back()->with('nameError', 'Name not registered!');
        }
        return view('dashboard.index3', ['user' => $hasil]);
    }

    // update data
    public function updateData(Request $request)
    {
        $request->session()->flash('updateData',"put!");
        return redirect ('/dashboard2');
    }
}
