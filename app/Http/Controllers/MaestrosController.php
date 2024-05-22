<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\Maestros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $maestro=Maestros::select('*')->orderBy('id','ASC');
        $limit=(isset($request->limit))?$request->limit:10;

        if(isset($request->search)) {
           $maestro=$maestro->where('id','like','%'.$request->search.'%')
           ->orWhere('Apellidos','like','%'.$request->search.'%')
           ->orWhere('Nombres','like','%'.$request->search.'%')
           ->orWhere ('CI','like','%'.$request->search.'%')
           ->orWhere('Direccion','like','%'.$request->search.'%')
           ->orWhere('Celular','like','%'.$request->search.'%')
           ->orWhere('Correo','like','%'.$request->search.'%')
           ->orWhere('curriculum','like','%'.$request->search.'%');
        }
       $maestro=$maestro->paginate($limit)->appends($request->all());
        return view('Maestro.index',compact('maestro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Maestro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $campos=[
            'Apellidos'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'CI'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
            'curriculum'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];
        
        $this->validate($request,$campos,$mensaje);

        $datosMaestro = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosMaestro['Foto']=$request->file('Foto')->store('uploads','public');
        } 
        Maestros::insert($datosMaestro);
        //return response()->json($datosAlumno);
        return redirect('Maestro')->with('mensaje','Maestro agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maestros $maestro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $maestros=Maestros::findOrFail($id);

        return view('Maestro.edit',compact('maestros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Apellidos'=>'required|string|max:100',
            'Nombres'=>'required|string|max:100',
            'CI'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Celular'=>'required|string|max:100',
            'Correo'=>'required|email',
            'curriculum'=>'required|string|max:100',
         ];
         $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        
        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto requerida'];
        }
        $this->validate($request,$campos,$mensaje);
        //
        $datosMaestro = request()->except(['_token','_method']);
         
        if($request->hasFile('Foto')){
            $maestros=Maestros::findOrFail($id);
            Storage::delete('public/'.$maestros->Foto);
            $datosMaestro['Foto']=$request->file('Foto')->store('uploads','public');
        } 
        
        Maestros::where('id','=',$id)->update($datosMaestro);

         $maestros=Maestros::findOrFail($id);
       // return view('Alumno.edit',compact('alumnos'));
       return redirect('Maestro')->with('mensaje','El maestro fue modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $maestros=Maestros::findOrFail($id);
        if(Storage::delete('public/'.$maestros->Foto)){
           
            Maestros::destroy($id);
        } 
        
        return redirect('Maestro')->with('mensaje','El maestro fue borrado correctamente');
    }
}
