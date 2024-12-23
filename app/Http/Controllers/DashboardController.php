<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\News;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [
            'practice' => PracticeArea::distinct('name')->count(),
            'lawyer' => Lawyer::distinct('name')->count()
        ];

        $news = News::limit(5)->orderBy('created_at','desc')->get();
        return view('pages.dashboard', compact('data','news'));
    }
}
