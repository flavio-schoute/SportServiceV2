<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;
    public bool $isActive;

    public int $myKey;

    public function mount() {
        $theAttribute = $this->model->find($this->myKey)->getAttribute($this->field);
        $this->isActive = (bool) $theAttribute;
    }

    public function render() {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value) {
        $this->model->find($this->myKey)->setAttribute($this->field, $value)->save();
        $this->emit('saved');
    }
}
