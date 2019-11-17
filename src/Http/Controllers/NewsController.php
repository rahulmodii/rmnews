<?php

namespace RM\News\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use RM\News\models\Rmnews;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Rmnews::all();
        return view('news::index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $image=$request->file('image')->store('/public/newsimage');
            Rmnews::create(array_merge($request->except('_csrf'),['image'=>$image]));
            return redirect('/news')->with('msg','news created succesfully');
        } catch (\Throwable $th) {
            $this->handelerrors($th);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data=Rmnews::find($id);
            return view('news::show')->with('data',$data);
        } catch (\Throwable $th) {
            $this->handelerrors($th);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data= Rmnews::find($id);
            return view('news::edit')->with('data',$data);
        } catch (\Throwable $th) {
            $this->handelerrors($th);
        }

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
        try {
            if($request->hasFile('image')){
                $image=$request->file('image')->store('/public/newsimage');
                Rmnews::find($id)->update(array_merge($request->except('_method','_csrf'),['image'=>$image]));
            }
                Rmnews::find($id)->update($request->except('_method','_csrf'));
                return redirect('/news')->with('msg','news edit succesfully');
        } catch (\Throwable $th) {
            $this->handelerrors($th);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Rmnews::destroy($id);
            return redirect('/news')->with('msg','news delete succesfully');
        } catch (\Throwable $th) {
            $this->handelerrors($th);
        }

    }
}
