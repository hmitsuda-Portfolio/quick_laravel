<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CtrlController extends Controller
{
    public function plain()
    {
        return response('こんにちは、世界！', 200)
        ->header('Content-Type', 'text/plain');
    }

    public function header()
    {
        return response()
        ->view('ctrl.header', ['msg' => 'こんにちは、世界！'], 200)
        ->withHeaders(['Content-Type' => 'text/xml', 'X-Powered-FW' => 'Laravel/9']);
    }

    public function outJson()
    {
        return [
            'name' => 'YOshihiro, YAMADA',
            'sex' => 'male',
            'age' => 18,
        ];
    }

    public function outFile()
    {
        $filePath = Storage::path('/private/data_log.csv');
        return response()
        ->download($filePath, 'download.csv', ['content-type' => 'text/csv']);
    }

    public function outCsv()
    {
        return response()
        ->streamDownload(function() {
            print(
                "1,2022/10/1,123\n".
                "2,2022/10/2,116\n".
                "3,2022/10/3,98\n".
                "4,2022/10/4,102\n".
                "5,2022/10/5,134\n"
            );
        }, 'download.csv', ['content-type' => 'text/csv']);
    }

    public function outImage()
    {
        return response()
        ->file('/Users/mitsudahiroyuki/Desktop/logo.png', ['content-type' => 'image/png']);
    }

    public function redirectBasic()
    {
        return redirect()->away('https://wings.msn.to/');
    }

    public function index()
    {
        return 'リクエストパス : '.request()->userAgent();
    }

    public function form()
    {
        return view('ctrl.form', ['result' => '']);
    }

    public function result(Request $req)
    {
        $name = $req->name;
        if(empty($name) || mb_strlen($name) > 10) {
            return redirect('ctrl/form')
            ->withInput()
            ->with('alert', '名前は必須、または、十文字以内で入力して下さい。');
        } else {
            return view('ctrl.form', ['result' => 'こんにちは、'.$name.'さん！']);
        }
    }

    public function upload()
    {
        return view('ctrl.upload', ['result' => '']);
    }

    public function uploadfile(Request $req)
    {
        if(!$req->hasFile('upfile'))
        {
            return 'ファイルを指定して下さい。';
        }

        $file = $req->upfile;
        if(!$file->isValid()){
            return 'アップロードに失敗しました。';
        }

        $name = $file->getClientOriginalName();
        $file->storeAs('files', $name);
        return view('ctrl.upload', ['result' => $name.'をアップロードしました。']);
    }

    public function middle()
    {
        return 'log is recorded!!';
    }
}
