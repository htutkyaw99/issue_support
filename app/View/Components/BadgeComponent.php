<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BadgeComponent extends Component
{
    public $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function render()
    {
        return view('components.badge');
    }
}
