<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Career;
use App\Models\Lawyer;
use App\Models\PracticeArea;
use Illuminate\Support\Facades\Artisan;

class ViewController extends Controller
{

    public function about()
    {
        return view('pages.about');
    }
    public function blog()
    {
        $blogs = News::where('category', 'blog')->get();
        $blog_first = News::where('category', 'blog')->orderBy('id', 'desc')->first();
        $blog_second = News::where('category', 'blog')->orderBy('id', 'desc')->limit(6)->offset(1)->get();
        $blog_last = News::where('category', 'blog')->orderBy('id', 'desc')->skip(7)->take(PHP_INT_MAX)->get();

        $blog_first_en = News::where('lang', 'en')->where('lang', 'en')->where('category', 'blog')->orderBy('id', 'desc')->first();
        $blog_second_en = News::where('lang', 'en')->where('category', 'blog')->orderBy('id', 'desc')->limit(6)->offset(1)->get();
        $blog_last_en = News::where('lang', 'en')->where('category', 'blog')->orderBy('id', 'desc')->skip(7)->take(PHP_INT_MAX)->get();

        $blog_first_id = News::where('lang', 'id')->where('category', 'blog')->orderBy('id', 'desc')->first();
        $blog_second_id = News::where('lang', 'id')->where('category', 'blog')->orderBy('id', 'desc')->limit(6)->offset(1)->get();
        $blog_last_id = News::where('lang', 'id')->where('category', 'blog')->orderBy('id', 'desc')->skip(7)->take(PHP_INT_MAX)->get();

        return view('pages.blog', compact(
            'blogs', 
            'blog_first', 
            'blog_second', 
            'blog_last',
            'blog_first_en', 
            'blog_second_en', 
            'blog_last_en',
            'blog_first_id', 
            'blog_second_id', 
            'blog_last_id'
        ));
    }

    public function blogdetail($slug)
    {
        $blog = News::where('slug', $slug)->get();
        return view('pages.blogdetail', compact('blog'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function practice_area()
    {
        $lang = app()->getLocale();
        $practices = PracticeArea::select('name', 'description')
            ->where('lang', $lang)
            ->orderBy('id', 'asc')
            ->get();
        return view('pages.practice_area', compact('practices'));
    }

    public function lawyer()
    {
        $lang = app()->getLocale();
        $lawyers = Lawyer::select('name', 'level', 'description', 'image', 'email')
            ->where('lang', $lang)
            ->orderBy('level', 'desc')
            ->get();
        return view('pages.lawyer', compact('lawyers'));
    }

    public function home()
    {
        $lang = app()->getLocale();
        $practices = PracticeArea::select('name', 'description')
            ->where('lang', $lang)
            ->orderBy('id', 'asc')
            ->get();
        return view('pages.home', compact('practices'));
    }

    public function news()
    {
        $lang = app()->getLocale();
        $news = News::where('lang', $lang)
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.news', compact('news'));
    }

    public function newsdetail($lang, $slug)
    {
        $news = News::where(['slug'=> $slug, 'lang' => $lang])->get();
        return view('pages.newsdetail', compact('news'));
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        return view('pages.gallery', compact('galleries'));
    }

    public function career()
    {
        $careers = Career::all();
        return view('pages.career', compact('careers'));
    }

    public function generateKey()
    {
        try {
            Artisan::call('key:generate');
            return response()->json(['message' => 'Application key generated successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error generating key', 'error' => $e->getMessage()], 500);
        }
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            return response()->json(['message' => 'Cache cleared successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error clearing cache', 'error' => $e->getMessage()], 500);
        }
    }

    public function storageLink()
    {
        try {
            Artisan::call('storage:link');
            return response()->json(['message' => 'Storage link created successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating storage link', 'error' => $e->getMessage()], 500);
        }
    }

    public function migrate()
    {
        try {
            Artisan::call('migrate');
            return response()->json(['message' => 'Migration completed successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error during migration', 'error' => $e->getMessage()], 500);
        }
    }


}