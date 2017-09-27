<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prueba;
use Illuminate\Http\Request;
use Session;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prueba = Prueba::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('apellido', 'LIKE', "%$keyword%")
				->orWhere('documento', 'LIKE', "%$keyword%")
				->orWhere('otros_datos', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $prueba = Prueba::paginate($perPage);
        }

        return view('admin.prueba.index', compact('prueba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.prueba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        

        $otros_datos=array('mascota'=> $request->mascota,'vehiculo'=> $request->vehiculo,'bicicleta'=>$request->bicicleta);
        $requestData = $request->all();
        $salida = array_slice($requestData,0,10);
        $salida['otros_datos'] =json_encode($otros_datos);  

        if ($request->hasFile('documento')) {
            foreach($request['documento'] as $file){
                $uploadPath = public_path('/uploads/documento');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['documento'] = $fileName;
            }
        }


        Prueba::create($salida);

        Session::flash('flash_message', 'Prueba added!');

        return redirect('admin/prueba');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $prueba = Prueba::findOrFail($id);

        return view('admin.prueba.show', compact('prueba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $prueba = Prueba::findOrFail($id);

        return view('admin.prueba.edit', compact('prueba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        

        if ($request->hasFile('documento')) {
            foreach($request['documento'] as $file){
                $uploadPath = public_path('/uploads/documento');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['documento'] = $fileName;
            }
        }

        $prueba = Prueba::findOrFail($id);
        $prueba->update($requestData);

        Session::flash('flash_message', 'Prueba updated!');

        return redirect('admin/prueba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Prueba::destroy($id);

        Session::flash('flash_message', 'Prueba ELiminada!');

        return redirect('admin/prueba');
    }
}
