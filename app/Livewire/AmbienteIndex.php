<?php

namespace App\Livewire;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $ambiente = Ambiente::find($id);

        if ($ambiente != null) {
            $ambiente->delete();
            session()->flash('success', 'Ambiente deletado!');
        }
    }
    public function render()
    {
        $ambientes = Ambiente::where('nome', 'like', '%' . $this->search . '%')->get();
        return view('livewire.ambiente-index', compact('ambientes'));
    }
}
