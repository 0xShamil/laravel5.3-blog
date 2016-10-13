<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function showAboutUsPage()
	{
		return view('pages.about');
	}

	public function showPrivacyPage()
	{
		return view('pages.privacy');
	}

	public function showCopyrightPage()
	{
		return view('pages.copyright');
	}

    public function showContactUsForm()
    {
    	return view('pages.contact');
    }
}
