<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class analyticscard extends Component
{
    /**
     * Create a new component instance.
     */
    public $heading, $value, $icon, $color,$desc,$action;
    public function __construct( $heading="Heading", $value="0", $icon="bx bx-user-circle" , $color="success", $desc="",$action="#")
    {
        $this->heading = $heading;
        $this->value = $value;
        $this->icon = $icon;
        $this->color = $color;
        $this->desc = $desc;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.analyticscard');
    }
}
