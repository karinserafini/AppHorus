<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    protected $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = new Permission();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->permission->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->permission->create($request->all());
            return response('Curso criado com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = $this->find($id);
        if (!$course) {
            return response('Curso não encontrado');
        }
        return response($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = $this->permission->find($id);
        if (!$course) {
            return response('Curso não encontrado');
        }
        try {
            $dados = $request->all();
            $course->fill($dados)->save();
            return response('Curso atualizado');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = $this->find($id);
        if (!$course) {
            return response('Curso não encontrado');
        }
        try {
            $course->delete();
            return response('Curso excluído com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}