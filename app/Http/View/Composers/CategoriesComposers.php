<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoriesComposers
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categoryData = DB::table('categories')->select('id', 'name')->get();
        $view->with('categoryData', $categoryData);
    }
}
