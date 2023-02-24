<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RecordController extends Controller
{
    public function find()
    {
        return Book::find(1)->price;
    }

    public function where()
    {
        //$result = Book::where('publisher', '総長社')->get();
        //return view('hello.list', ['records' => $result]);
        //$result = Book::where('publisher', '総長社')->first();
        //$result = Book::where('price', '<', 3000)->get();
        //return view('hello.list', ['records' => $result]);
        $result = Book::groupBy('publisher')
        ->having('price_avg', '<', 2500)
        ->selectRaw('publisher, AVG(price) AS price_avg')->dump()->get();
        return view('record.where', ['records' => $result]);
    }

    public function hasmany()
    {
        return view('record.hasmany', [
            'book' => Book::find(1)
        ]);
    }
}
