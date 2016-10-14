<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App\Models\Setting;

class SettingsComposer
{
    protected $setting;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Setting $setting)
    {
        // Dependencies automatically resolved by service container...
        $this->setting = $setting;
    }

	/**
	 * Bind data to the view
	 *
	 *@param View $view
	 *@return void
	 *
	 */

	public function compose(View $view)
	{
		$view->with('sets', $this->setting->first());
	}
}
