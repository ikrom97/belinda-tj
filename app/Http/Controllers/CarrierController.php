<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Vacancy;

class CarrierController extends Controller
{
  public function index()
  {
    $data = Helper::getContents('carrier');
    $data['vacancies'] = Vacancy::latest()->get();

    return view('pages.carrier.index', compact('data'));
  }

  public function apply($id)
  {
    $vacancy = Vacancy::find($id);

    return view('pages.carrier.apply', compact('vacancy'));
  }
}
