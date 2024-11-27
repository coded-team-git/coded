<?php

namespace App\Http\Controllers;

use App\Models\Row;
use App\Models\Project;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Section;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function homePage()
    {
        $services = Service::all();
        $sections = Section::wherePage('home')->get();
        // dd($sections);
        return view('coded.home', compact('services', 'sections'));
    }


    public function aboutUsPage()
    {
        $sections = Section::wherePage('about us')->get();
        $count = Project::count();
        $countEmp = User::count();

        return view('coded.pages.about-us', compact('sections', 'count', 'countEmp'));
    }


    public function servicesPage()
    {
        $sections = Section::wherePage('services')->get();
        $services = Service::all();
        return view('coded.pages.services', compact('services', 'sections'));
    }



    public function projectsPage()
    {

        $services = Service::with('projects')->get();

        

        return view('coded.pages.projects', compact('services'));
    }




    public function contactUsPage()
    {
        $sections = Section::wherePage('contact us')->get();
        return view('coded.pages.contact-us', compact('sections'));
    }





}
