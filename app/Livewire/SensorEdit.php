<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;
    public $sensorId;

    public function mount($id){
        $sensor = Sensor::find($id);

        if ($sensor == null) {
            session()->flash('error', 'Sensor não encontrado!');
            return redirect()->route('sensor.index');
        }

        $this->ambiente_id = $sensor->ambiente_id;
        $this->codigo = $sensor->codigo;
        $this->tipo = $sensor->tipo;
        $this->descricao = $sensor->descricao;
        $this->status = $sensor->status;
        $this->sensorId = $sensor->id;
    }

    public function update($id){
        $sensor = Sensor::find($this->sensorId);

        if ($sensor == null) {
            session()->flash('error', 'Sensor não encontrado!');
            return redirect()->route('sensor.index');
        }

        $sensor->ambiente_id = $this->ambiente_id;
        $sensor->codigo = $this->codigo;
        $sensor->tipo = $this->tipo;
        $sensor->descricao = $this->descricao;
        $sensor->status = $this->status;

        $sensor->save();

        session()->flash('success', 'Sensor cadastrado!');
        return redirect()->route('sensor.index');
    }
    public function render()
    {
        return view('livewire.sensor-edit');
    }
}
