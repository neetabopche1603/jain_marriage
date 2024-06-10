<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class radio extends Component
{
    /**
     * Create a new component instance.
     */
    public $name ,$value,$label,$checked;

    public function __construct($name, $value, $label, $checked = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.radio');
    }
}
