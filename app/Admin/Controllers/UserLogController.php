<?php

namespace App\Admin\Controllers;

use App\Models\UserLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserLog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserLog());

        $grid->column('id', __('Id'));
        $grid->column('author_id', __('Author id'));
        $grid->column('content', __('Content'));
        $grid->column('log_type', __('Log type'));
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
        $show = new Show(UserLog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('author_id', __('Author id'));
        $show->field('content', __('Content'));
        $show->field('log_type', __('Log type'));
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
        $form = new Form(new UserLog());

        $form->number('author_id', __('Author id'));
        $form->textarea('content', __('Content'));
        $form->text('log_type', __('Log type'));

        return $form;
    }
}
