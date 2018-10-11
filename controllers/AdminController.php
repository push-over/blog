<?php 

namespace controllers;

use models\Admin;

class AdminController{
    /**
     * 显示首页
     *
     * @access public
     */
    public function index()
    {
        view('admin.index.index');
    }


    public function welcome()
    {
        view('admin.index.welcome');
    }

    /**
     * 显示数据列表页
     */
    public function list()
    {
        $model = new Admin;
        $data = $model->findAll();
        view('admin.istrators.admin_list',$data);
    }

    /**
     * 显示数据的添加页
     *
     * @access public
     */
    public function create()
    {
        view('admin.admin.create');
    }

    /**
     * 处理要添加的数据
     *
     * @access public
     */
    public function insert()
    {
        $model = new Admin;
        $model->fill($_POST);
        $model->insert();
        redirect('/admin/admin/index');
    }

    /**
     * 显示数据的修改页
     *
     * @access public
     */
    public function edit()
    {
        $model = new Admin;
        $data = $model->findOne($_GET['id']);
        view('admin.admin.edit',[
            'data' => $data,
        ]);
    }

    /**
     * 处理要修改的数据
     *
     * @access public
     */
     public function update()
     {
         $model = new Admin;
         $model->fill($_POST);
         $model->update($_GET['id']);
         redirect('/admin/admin/index');
     }

    /**
     * 处理要删除的数据
     *
     * @access public
     */
     public function delete()
     {
         $model = new Admin;
         $model->delete($_GET['id']);
         redirect('/admin/admin/index');
     }
}