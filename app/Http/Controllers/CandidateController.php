<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

use App\Http\Requests;


class CandidateController extends Controller
{

    public function create(){

        return view('candidates.create');
    }


    public function store(Requests\createCandidateRequest $requests){

        $input=$requests->all();

        $candidate=Candidate::create($input);


        return $candidate;


    }

}
