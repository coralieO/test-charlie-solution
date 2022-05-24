<?php

namespace App\Http\Controllers;

use App\Models\Fact;
use Inertia\Inertia;
use GuzzleHttp\Client;
use Inertia\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class dogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facts = new Client();


        $url = "https://www.dogfactsapi.ducnguyen.dev/api/v1/facts/all";


        $response = $facts->request('GET', $url, [
            'verify'  => false,
        ]);

        $factsdatas = json_decode($response->getBody()->getContents(), true);
        $factsdatas = $factsdatas["facts"];


        foreach($factsdatas as $Facts){

            $newFact = new Fact();
            $newFact->Facts = $Facts;
            $newFact->save();
            return Inertia::render("Facts", [
                "facts" => $newFact
            ]);
            unset($newFact);

        }


       // return Inertia::render('Facts');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('NewFact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $request->validate([
            'Facts' => 'required',
        ]);

        Fact::create([
            "Facts" => $request->Facts,
        ]);

        return Inertia::render('Facts');



        // return  $newFact;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facts = Fact::findOrFail($id);

            return Inertia::render("FactDetails", [
                "facts" => $facts
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facts = Fact::findOrFail($id);

        return Inertia::render('UpdateFact', [
            "facts" => $facts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fact = Fact::findOrFail($id);

        $request->validate([
            'Facts' => 'required',
        ]);

        $fact->update($request->only("Facts"));

        return Inertia::render('Facts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fact = Fact::findOrFail($id);
        $fact->delete();
        return Inertia::render('Facts');
    }
}
