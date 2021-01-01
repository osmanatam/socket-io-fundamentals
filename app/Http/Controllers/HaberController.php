<?php

namespace App\Http\Controllers;

use App\Models\HaberModel;
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;
use Illuminate\Http\Request;

class HaberController extends Controller
{
    public function index(){

        $news = HaberModel::orderByDesc('created_at')->get();
        return view('news',compact('news'));

    }

    public function create(){
        return view('create_news');
    }

    public function store(){
        \request()->validate(array(
            "baslik"=>"required",
            "icerik"=>"required"
        ));

        $haber=HaberModel::create(\request()->all());

        $socket = new Client(new Version2X("http://localhost:3000"));
        $socket->initialize();
        $socket->emit("add_news",$haber->toArray());

        return redirect()->back();
    }
}
