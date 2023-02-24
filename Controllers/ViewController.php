<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ViewController extends Controller
{
    public function escape()
    {
        return view('view.escape', [
            'msg' => '<img src="https://wings.msn.to/image/wings.jpg" title="ロゴ"/>
            <p>WINGSへようこそ</p>'
        ]);
    }

    public function comment()
    {
        return view('view.comment', [
            'msg' => 'これはコメントです
            クライアントには、送信されません'
        ]);
    }

    public function if()
    {
        return view('view.if', [
            'random' => random_int(0, 100)
        ]);
    }

    public function isset(int $id)
    {
        return 'id値 :' . $id;
    }

    public function switch()
    {
        return view('view.switch', [
            'random' => random_int(1, 5)
        ]);
    }

    public function while()
    {
        return view('view.while', [
            //
        ]);
    }

    public function for()
    {
        return view('view.for', [
            //
        ]);
    }

    public function foreach_assoc()
    {
        return view('view.foreach_assoc', [
            'member' => [
                'name' => 'MITSUDA, HIROYUKI',
                'sex' => '男',
                'birth' => '1982-05-04'
            ]
            ]);
    }

    public function foreach_loop()
    {
        return view('view.foreach_loop', [
            'weeks' => ['月','火','水','木','金','土','日']
        ]);
    }

    public function forelse()
    {
        return view('view.forelse', [
            'weeks' => ['月','火','水','木','金','土','日']
        ]);
    }

    public function style_class()
    {
        return view('view.style_class', [
            'isEnabled' => true
        ]);
    }

    public function checked()
    {
        return view('view.checked', [
            'isEnabled' => true
        ]);
    }

    public function master()
    {
        return view('view.master', [
            'msg' => 'こんにちは、うんこ'
        ]);
    }

    public function comp()
    {
        $data = [
            'title' => '今日は、うんち',
            'comp' => 'my-alert'
        ];

        return view('view.comp', $data);
    }

    public function list()
    {

       $data = [
        'records' => BOOK::all()
       ];
        return view('view.list', $data);
    }
}
