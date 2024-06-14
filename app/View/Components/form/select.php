<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    public $name;
    public $label;
    public $options;
    public $required;
    public $selectClass;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $options, $required = false,$selectClass=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->required = $required;
        $this->selectClass = $selectClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
