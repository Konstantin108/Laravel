<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Unloading;
use Illuminate\Http\Request;

class UnloadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.admin-unloading');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Unloading $request
     * @return \Illuminate\Http\Response
     */
    public function store(Unloading $request)
    {
        $res = $request->except('_token');
        function getContent($arr)
        {
            return implode(" ", $arr);
        }

       echo $content = getContent($res);

        function writeRes($myFile, $res){     //<-- функция для записи результата в файл

            $result = $res;

            file_put_contents($myFile, $result);
        }

        writeRes('/home/vagrant/code/laravel/app/Http/Controllers/Admin/res.txt', $content);

        return response()->download('/home/vagrant/code/laravel/app/Http/Controllers/Admin/res.txt');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
