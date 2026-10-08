<div>
    <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form class="card p-4 shadow align-content-center" wire:submit.prevent="update">
                        <h2 class="d-flex align-items-center">
                            <i class="bi bi-qr-code text-info me-1 fs-3"></i>
                            Editar Sensor
                        </h2>
                        <select class="mb-2 form-select" wire:model="ambiente_id" aria-label="Default select example">
                            <option selected>Selecione o ambiente</option>
                            @foreach ($ambientes as $ambiente)
                                <option value="{{ $ambiente->id }}">{{ $ambiente->nome }}</option>
                            @endforeach
                        </select>
                        <div class="form-floating">
                            <textarea class="mb-2 form-control" wire:model="codigo" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Código</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="mb-2 form-control" wire:model="tipo" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Tipo</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="mb-2 form-control" wire:model="descricao" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Descrição</label>
                        </div>
                        <div>
                            <label class="form-check-label" for="switchCheckChecked">Status</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" wire:model="status"
                                id="switchCheckChecked" checked>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="button" class="btn btn-outline-danger">Cancelar</button>
                            <button class="btn btn-info" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>