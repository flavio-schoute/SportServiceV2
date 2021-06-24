<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;
    public string $field;
    public bool $isActive;

    public int $myKey;

    public function mount() {
        // Problem is this:  $this->model->getAttribute($this->field);

//        dd($this->model->getOriginal(), $this->model->getMutatedAttributes());

//        dd(User::find('34')->getAttribute('is_active'));
//        dd($this->model->find($this->myKey)->getAttributes());


        $theAttribute = $this->model->find($this->myKey)->getAttribute('is_active');

        $this->isActive = (bool) $theAttribute;
//        dd($this->isActive, $this->model->getAttribute($this->field), $this->field, $this->model->getAttributes());
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value) {
        // Hier ook de find gebruiken
        $this->model->find($this->myKey)->setAttribute($this->field, $value)->save();
    }
}
