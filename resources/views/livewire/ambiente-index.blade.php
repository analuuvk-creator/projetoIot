<div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Ambientes</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-info mt-4" href="{{ route('ambiente.create') }}">Novo Ambiente</a>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-3">
            <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ambiente</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ambientes as $ambiente)
                    <tr>
                        <td>{{ $ambiente->id }}</td>
                        <td>{{ $ambiente->nome }}</td>
                        <td>{{ $ambiente->descricao }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" wire:model="status"
                                    id="switchCheckChecked" {{$ambiente->status ? 'checked':''}}>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('ambiente.edit', ['id' => $ambiente->id]) }}"
                                class="btn btn-sm btn-outline-info"><i class="bi bi-pencil-square"></i></a>

                            <button wire:click='delete({{ $ambiente->id }})' class="btn btn-sm btn-outline-danger"><i
                                    class="bi bi-trash3-fill"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
