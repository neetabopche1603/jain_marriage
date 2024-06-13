<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $label, $value, $type,$disabled = false,$placeholder, $min,$required, $id, $class;
    public function __construct($name, $label, $value=null, $type="text",$disabled = false,$placeholder=null ,$min=null,$required=false, $id=null, $class=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->disabled = $disabled;
        $this->placeholder = $placeholder;
        $this->min = $min;
        $this->required = $required;
        $this->id = $id;
        $this->class = $class;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
