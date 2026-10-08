<div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mt-4">Sensores</h2>
            <div class="d-flex gap-2">
                <a class="btn btn-info mt-4" href="{{ route('sensor.create') }}">Novo Sensor</a>
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
                    <th>Código</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($sensors as $sensor)
                    <tr>
                        <td><b>{{ $sensor->id }}</b></td>
                        <td>{{ $sensor->ambientes->nome }}</td>
                        <td>{{ $sensor->codigo }}</td>
                        <td>{{ $sensor->tipo }}</td>
                        <td>{{ $sensor->descricao }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" wire:model="status"
                                    id="switchCheckChecked" {{$sensor->status ? 'checked':''}}>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('sensor.edit', ['id' => $sensor->id]) }}"
                                class="btn btn-sm btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                            <button wire:click='delete({{ $sensor->id }})'
                                class="btn btn-sm btn-outline-danger"><i
                                    class="bi bi-trash3-fill"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>