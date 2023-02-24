<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//a.Controllerクラスを継承
use App\Models\Book;
class HelloController extends Controller
{
    //b.アクションメソッドを定義
    public function view()
    {
        //c.出力を戻り値に
        $data = [
        'msg' => 'こんにちは、世界！'
        ];
        return view('hello.view', $data);
    }

    public function list()
    {
        //c.出力を戻り値に
        $data = [
        'records' => Book::all()
        ];
        return view('hello.list', $data);
    }
}
