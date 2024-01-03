@extends('layout.default')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @elseif (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Lista de Alunos</h4>
                        <div class="panel-heading-btn">
                            <a href="{{ route('alunos.create') }}" class="btn btn-primary">Cadastro de Alunos</a>
                            <div class="col-lg-6 col-md-8 col-sm-12 mx-auto mt-4">
                                <input type="text" id="input-nome" placeholder="Pesquisa:"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group mr-5">
                            <div class="d-flex align-items-center justify-content-center mr-10 mb-3">

                            </div>
                        </div>
                        <div style="overflow-x:auto;">
                            <table id="data-table-combine"
                                class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">Foto</th>
                                        <th class="text-nowrap">Nome</th>
                                        <th class="text-nowrap">Email</th>
                                        <th class="text-nowrap">CPF</th>
                                        <th class="text-nowrap">Data de Nascimento</th>
                                        <th class="text-nowrap">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alunos as $aluno)
                                        <tr>
                                            <td><img style="width: 60px" src="{{ asset('/storage/' . $aluno->foto) }}"
                                                    alt=""></td>
                                            <td>{{ $aluno->nome }}</td>
                                            <td>{{ $aluno->email }}</td>
                                            <td>{{ $aluno->cpf }}</td>
                                            <td>{{ date('d/m/Y', strtotime($aluno->data_nascimento)) }}</td>
                                            <td>
                                                <div class="flex gap-2 justify-center">
                                                    <a href="{{ route('alunos.edit', $aluno->id) }}">
                                                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                                            Editar</button>
                                                    </a>
                                                    <form class="mt-2" action="{{ route('alunos.destroy', $aluno->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm atencao"><i
                                                                class="fa fa-trash-alt"></i>
                                                            Excluir</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#input-nome').on('keyup', function() {
                var nome = $(this).val().toLowerCase();
                $('#data-table-combine tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(nome) > -1)
                });
            });
        });
    </script>
@endsection
