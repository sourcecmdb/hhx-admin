<?php

namespace App\Admin\Controllers;

use App\Models\Damai;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DamaiController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Damai);

        $grid->id('Id');
        $grid->actors('演艺人');
        $grid->cityname('城市名字');
        $grid->nameNoHtml('演唱会名字');
        $grid->price_str('价格区间');
        $grid->showtime('演绎时间');
        $grid->venue('场馆');
        $grid->showstatus('状态');
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');
        $grid->actions(function ($actions) {
            $actions->disableEdit();
        });

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
        $show = new Show(Damai::findOrFail($id));

        $show->id('Id');
        $show->actors('演艺人');
        $show->cityname('城市名字');
        $show->nameNoHtml('演唱会名字');
        $show->price_str('价格区间');
        $show->showtime('演绎时间');
        $show->venue('场馆');
        $show->showstatus('状态');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Damai);

        $form->text('actors', '演艺人');
        $form->text('cityname', '城市名字');
        $form->text('nameNoHtml', '演唱会名字');
        $form->text('price_str', '价格区间');
        $form->text('showtime', '演绎时间');
        $form->text('venue', '场馆');
        $form->text('showstatus', '状态');

        return $form;
    }
}
