<?php

namespace App\Admin\Controllers;

use App\Models\Analytic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnalyticController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Analytic';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Analytic());

        $grid->column('id', __('Id'));
        $grid->column('content_id', __('Content id'));
        $grid->column('view', __('View'));
        $grid->column('share', __('Share'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Analytic::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('content_id', __('Content id'));
        $show->field('view', __('View'));
        $show->field('share', __('Share'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Analytic());

        $form->number('content_id', __('Content id'));
        $form->text('view', __('View'));
        $form->text('share', __('Share'));

        return $form;
    }
}
