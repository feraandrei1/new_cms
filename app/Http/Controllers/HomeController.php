<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use DB;
use View;

use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        // ASTA ERA SA ARATE TOATE POSTARILE FARA PAGINATION
        // $posts = Post::all();

        // ASTA E SA ARATE CU PAGINATION CATE 5 PE PAGINA
        $posts = Post::paginate(5);

        return view('home', ['posts'=>$posts]);

    }

    //
    //
    //

    // ASTEA 3 FUNCTII DE VIEW LA CATEGORII SE POT FACE CUMVA
    // PRINTR-UN CONTROLLER / ROUTE / VARIABLE CUMVA SA O IA AUTOMATIZAT

    public function html()
    {
        return view('categories.html');
    }

    public function php()
    {
        return view('categories.php');
    }

    public function javascript()
    {
        return view('categories.javascript');
    }

}