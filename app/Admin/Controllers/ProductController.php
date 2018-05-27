<?php

namespace App\Admin\Controllers;

use App\Product;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductController extends Controller
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

            $content->header('Tовары');
            $content->description('Все');

            // Breadcrumbs:
            $content->breadcrumb(
                ['text' => 'Товары']
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

            // Form:
            $form = $this->form()->edit($id);
            $model = $form->model();

            $content->header('Редактор товаров');

            // Breadcrumbs:
            $content->breadcrumb(
                ['text' => 'Товары', 'url' => '/products'],
                ['text'=> 'ID['.$model->id.']']
            );

            $content->body($form->setTitle($model->title));
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

            $content->header('Новый товар');

            // Breadcrumbs:
            $content->breadcrumb(
                ['text' => 'Товары', 'url' => '/products'],
                ['text'=> 'Добавление товара']
            );

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
        return Admin::grid(Product::class, function (Grid $grid) {

            // Columns:
            $grid->id('id')->sortable();
            $grid->column('title','Наименование')->display(function ($title) {
                return '<a href="products/'.$this->id.'/edit">'.$title.'</a>';
            });

            // Filter:
            $grid->filter(function($filter) {
                $filter->like('title', 'Наименование');
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
        return Admin::form(Product::class, function (Form $form) {


            // Tab:Default
            $form->tab('Общее', function ($form) {

                $form->text('title', 'Наименование');
                // $form->divider();
                $form->switch('published', 'Публиковать?')->states([
                    'on'  => ['value' => 1, 'text' => 'Да', 'color' => 'success'], 
                    'off' => ['value' => 0, 'text' => 'Нет', 'color' => 'danger'],
                ])->default(1);     

            });

            // Tab:Attributes
            $form->tab('Характеристики', function ($form) {

                       

            });
 
 
        });
    }
}
