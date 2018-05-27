<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class DashboardController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('');

            $content->breadcrumb(
                ['text' => 'Dashboard']
            );
            
            $content->row(function (Row $row) {
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::environment());
                });
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });

        });
    }


   
}
