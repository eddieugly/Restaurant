<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\General;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Reserve;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sliders = Slider::all();
        $menus = Menu::orderBy('id', 'DESC')->limit(8)->get();
        $general = '';

        return view('home', compact('sliders', 'menus', 'general'));
    }

    public function menu()
    {

        
        $starters = Menu::orderBy('price')->limit(4)->get();
        $menus = Menu::orderBy('id', 'DESC')->get();

        return view('frontend.menu', compact('menus', 'starters'));
    }

    public function reserve(Request $request)
    {

        Reserve::create([
            'date' => $request->date,
            'time' => $request->time,
            'people' => $request->people,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'status' => 0
        ]);

        return back()->with('success', "Reservation Request Submitted!");

    }

    public function gallery($type)
    {
        $general = '';
        if ($type === 'photo') {
            $data = Gallery::where('type', 0)->get();
            return view('frontend.gallery.photo', compact('data', 'general'));
        }

        $data = Gallery::where('type', 1)->get();
        return view('frontend.gallery.video', compact('data', 'general'));

    }

    public function blog()
    {
        $page_title = "Blogs";
        $blogs = Blog::all();
        $categories = Category::where('type', 1)->get();
        $latests = Blog::latest('created_at')->limit(3)->get();
        return view('frontend.blog.index', compact('page_title', 'blogs', 'categories', 'latests'));

    }

    public function getBlog(Blog $blog)
    {
        $page_title = "Blogs";

        $categories = Category::where('type', 1)->get();
        $latests = Blog::latest('created_at')->limit(3)->get();
        
        return view('frontend.blog.details', compact('page_title', 'categories', 'latests', 'blog'));

    }

    public function getCategoryBlog($id)
    {
        $page_title = "Blogs";

        $blogs = Blog::where('category_id', $id)->get();
        $latests = Blog::latest('created_at')->limit(3)->get();
        $categories = Category::where('type', 1)->get();
        
        return view('frontend.blog.index', compact('page_title', 'categories', 'latests', 'blogs'));

    }

    public function about()
    {
        $page_title = "About Us";
        $services = Service::limit(4)->get();
        $staffs = Staff::all();
        return view('frontend.about', compact('page_title', 'services', 'staffs'));

    }

    public function contact()
    {
        $page_title = "Contact Us";
        return view('frontend.contact', compact('page_title'));

    }

    public function mail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $general = General::latest('created_at')->first();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to($general->email)->send(new Contact($data));

        return back()->with('success', 'Message Sent Successfully!');

    }
}
