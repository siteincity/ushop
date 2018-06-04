<?php

namespace App\Admin\View;

use Illuminate\View\View;
use App\Group;

class AdminComposer 
{
	

	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $group;


	public function __construct(Group $group)
	{

		$this->group = $group;
	}

	/**
	 * Привязка данных к представлению.
	 *
	 * @param  View  $view
	 * @return void
	 **/
	// public function compose(View $view)
	// {
	// 	$view->with('groupList', [1,2,3]);
	// }


	/**
	 * Привязка данных к представлению.
	 *
	 * @param  View  $view
	 * @return void
	 **/
	public function compose(View $view)
	{
		
		$view->with('groupGetList', $this->group->getList());
	}






}