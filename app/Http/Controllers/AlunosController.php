<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Models\Alunos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::orderBy('nome' )->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(StoreAlunosRequest $request)
    {
        try {
            $aluno = new Alunos($request->all());
            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $aluno['foto'] = $request->file('foto')->store('fotos', 'public');
            }
            $aluno->save();
            return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('alunos.index')->with('error', 'Erro ao cadastrar aluno!');
        }

    }

    public function edit($id)
    {
        $aluno = Alunos::find($id);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(UpdateAlunosRequest $request, $id)
    {
        try {
            $aluno = Alunos::find($id);
            $aluno->fill($request->all());
            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $aluno['foto'] = $request->file('foto')->store('fotos', 'public');
            }
            $aluno->save();
            return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('alunos.index')->with('error', 'Erro ao atualizar aluno!');
        }
    }

    public function destroy($id)
    {
        try {
            $aluno = Alunos::find($id);
            $aluno->delete();
            return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('alunos.index')->with('error', 'Erro ao excluir aluno!');
        }
    }
}
