<?php

namespace App\Http\Controllers;

use App\Models\WorkUrl;
use Illuminate\Http\Request;

class WorksUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workUrl = new WorkUrl;
        $works = $workUrl->get();
        return $works;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workUrl = new WorkUrl;
        $workUrl->works_id = $request->works_id;
        $workUrl->url_name = $request->url_name;
        $workUrl->url = $request->url;
        $workUrl->created_at = date("Y-m-d H:i:s");
        $workUrl->updated_at = date("Y-m-d H:i:s");
        $workUrl->save();
        return $workUrl->find($workUrl->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workUrl = new WorkUrl;
        return $workUrl->find($id);
        // return ["test","test"];
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
        $workUrl = WorkUrl::find($id);
        $workUrl->works_id = $request->works_id;
        $workUrl->url_name = $request->url_name;
        $workUrl->url = $request->url;
        $workUrl->updated_at = date("Y-m-d H:i:s");
        $workUrl->save();
        return $workUrl;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workUrl = WorkUrl::find($id);
        $workUrl->deleted_at = date("Y-m-d H:i:s");
        $workUrl->save();
        return $workUrl;
    }
}
