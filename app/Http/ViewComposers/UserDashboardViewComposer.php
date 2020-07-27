<?php


namespace App\Http\ViewComposers;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\GenericUserMetaController;

class UserDashboardViewComposer
{

    public function compose(View $view): void
    {
        $view->with('user_metas', json_decode((new GenericUserMetaController)->handle(Auth::user()->getAuthIdentifier())->content()));
    }
}
