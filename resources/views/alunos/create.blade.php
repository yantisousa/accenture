@extends('layout.default')
@section('content')
    <div class="container mt-5">
        <div class="row text-center">
            <h4>Cadastro</h4>
        </div>
        <div class="row">
            <div class="panel-body">
                <div class="col-lg-6 col-md-8 col-sm-12  mx-auto">
                    <form action="{{ route('alunos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="list-style: none">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class=" mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto <span
                                    class="text-danger">*</span></label>
                            <input required type="file" name="foto" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome <span
                                    class="text-danger">*</span></label>
                            <input required type="text" name="nome" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email <span
                                    class="text-danger">*</span></label>
                            <input required type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">CPF <span
                                    class="text-danger">*</span></label>
                            <input required type="text" id="cpf" name="cpf" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Data de Nascimento <span
                                    class="text-danger">*</span></label>
                            <input required name="data_nascimento" type="date" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
        });
    </script>
@endsection
