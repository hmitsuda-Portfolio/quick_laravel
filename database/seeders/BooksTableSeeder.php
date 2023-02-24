<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        //DB::insert('INSERT INTO books(isbn,title,price,publisher,published)VALUES("9784822253998","VisualC#超入門",2000,"ジャパンIT","20220822")');
        Book::factory()->count(50)->create();
    }
}
