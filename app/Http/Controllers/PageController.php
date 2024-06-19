<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function training()
    {
        return view('pages.training');
    }

    public function blog()
    {
        return view('blog');
    }



    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('pages.faq');
    }


    public function testimonials()
    {
        return view('pages.testimonials');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}