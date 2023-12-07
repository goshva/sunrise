<?php

namespace App\View\Components;

use App\Models\Position;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ClientSideBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = Auth::user();
        $position = Position::find($user->position_id);
        return view('components.client-side-bar', ["user"=>$user, "position"=>$position]);
    }
}
