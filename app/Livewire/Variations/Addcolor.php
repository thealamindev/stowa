<?php

namespace App\Livewire\Variations;

use App\Models\Color;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Addcolor extends Component
{
    #[Validate('required')]
    public $color;
    #[Validate('required')]
    public $code;

    public function color_insert(){
        $this->validate();
        Color::create([
            'color' => $this->color,
            'color_code' => $this->code,
            'created_at' => now(),
        ]);
        $this->inputreset();
    }
    public function updateColor($id){
        Color::find($id)->update([
            'color' => $this->color,
            'color_code' => $this->code,
            'updated_at' => now(),
        ]);
        $this->inputreset();

    }

    public function inputreset(){
        $this->color = "";
        $this->code = "";
    }

    public function editColor($id){
        $editColors = Color::where('id',$id)->first();
        $this->color = $editColors->color;
        $this->code = $editColors->color_code;
    }


    public function render()
    {
        $colors = Color::all();
        return view('livewire.variations.addcolor',compact('colors'));
    }
}
