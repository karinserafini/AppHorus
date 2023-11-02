<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    protected $subject;
    public function __construct(Subjects $subject)
    {
        $this->subject = new Subjects();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->subject->all());
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

            $this->subject->create($request->all());
            return response('Disciplina criada com sucesso');
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
        $subject = $this->find($id);
        if (!$subject) {
            return response('Curso não encontrado');
        }
        return response($subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = $this->subject->find($id);
        if (!$subject) {
            return response('Disciplina não encontrada');
        }
        try {
            $dados = $request->all();
            $subject->fill($dados)->save();
            return response('Disciplina atualizada');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = $this->find($id);
        if (!$subject) {
            return response('Disciplina não encontrada');
        }
        try {
            $subject->delete();
            return response('Disciplina excluída com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}