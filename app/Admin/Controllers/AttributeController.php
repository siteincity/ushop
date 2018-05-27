<?php

namespace App\Admin\Controllers;

use App\Attribute;
use App\Group;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AttributeController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Характеристики');
            $content->description('товаров');

            // Breadcrumbs:
            $content->breadcrumb(
                ['text' => 'Характеристики']
            );

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Редактирование характеристики');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Новая характеристика');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Attribute::class, function (Grid $grid) {

            // Columns:
            $grid->id('id')->sortable();
            $grid->column('caption','Название')->display(function ($title) {
                return '<a href="attributes/'.$this->id.'/edit">'.$title.'</a>';
            });
            $grid->column('type','Тип')->sortable();
            $grid->column('slug','Системное имя')->sortable();

            // Filter:
            $grid->filter(function($filter) {
                $filter->like('type', 'Тип');
                $filter->like('slug', 'Системное имя');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Attribute::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('caption', 'Название')->rules('required');
            $form->select('type', 'Тип')->options(['text','select','checkbox','radio','color','number','image','file']);
            $form->text('slug', 'Системное имя');
            $form->multipleSelect('group', 'Группы')
                ->options(Group::all()->pluck('title','id'))
                ->rules('required');
            
        });
    }
}
