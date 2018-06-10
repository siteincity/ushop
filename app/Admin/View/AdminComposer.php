<?php

namespace App\Admin\View;

use Illuminate\View\View;
use App\Group;

class AdminComposer
{


    /**
     * @var string
     **/
    protected $group;


    public function __construct(Group $group)
    {

        $this->group = $group;
    }


    /**
     * @param  View $view
     * @return void
     **/
    public function compose(View $view)
    {

        $view->with('groupGetList', $this->group->getList());
    }


}