<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App\Models\Category;

class CategoriesComposer
{
	/**
	 * Bind data to the view
	 *
	 *@param View $view
	 *@return void
	 *
	 */

	public function compose(View $view)
	{
		$view->with('cats', Category::all());
	}
}
