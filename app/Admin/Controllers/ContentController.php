<?php

namespace App\Admin\Controllers;

use App\Models\Content;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Content';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Content());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('hashtags', __('Hashtags'));
        $grid->column('image', __('Image'));
        $grid->column('content', __('Content'));
        $grid->column('author_id', __('Author id'));
        $grid->column('status', __('Status'));
        $grid->column('common_key', __('Common key'));
        $grid->column('cat_id', __('Cat id'));
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
        $show = new Show(Content::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('hashtags', __('Hashtags'));
        $show->field('image', __('Image'));
        $show->field('content', __('Content'));
        $show->field('author_id', __('Author id'));
        $show->field('status', __('Status'));
        $show->field('common_key', __('Common key'));
        $show->field('cat_id', __('Cat id'));
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
        $form = new Form(new Content());

        $form->text('title', __('Title'));
        $form->text('hashtags', __('Hashtags'));
        $form->image('image', __('Image'));
        $form->text('content', __('Content'));
        $form->number('author_id', __('Author id'));
        $form->text('status', __('Status'))->default('publish');
        $form->text('common_key', __('Common key'));
        $form->number('cat_id', __('Cat id'));

        return $form;
    }
}
