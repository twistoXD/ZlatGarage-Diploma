<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Mark;
use App\Models\Stock;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $marks = Mark::all();
        $categories = Category::all()->take(3);
        $types = Type::all();
        $comments = Comment::getFour();
        $stocks = Stock::all()->take(3);
        $stocks = $stocks->where('start_date', '<=', now())
            ->where('end_date', '>=', now())->take(3);

        return view('home', compact('categories', 'stocks', 'marks', 'types', 'comments'));
    }

    public function getTypes($id)
    {
        echo json_encode(DB::table('types')->where('mark_id', $id)->get());
    }
}
