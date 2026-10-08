<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorIndex extends Component
{
    public $search = '';

    public function delete($id)
    {
        $sensor = Sensor::find($id);

        if ($sensor != null) {
            $sensor->delete();
            session()->flash('success', 'Sensor deletado!');
        }
    }

    public function render()
    {
        $sensors = Sensor::where('tipo', 'like', '%' . $this->search . '%')->get();
        return view('livewire.sensor-index', compact('sensors'));
    }
}
