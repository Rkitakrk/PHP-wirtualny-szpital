<?php

namespace App\Controllers;

/* Kontroler placówki */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class InstitutionController
{
    private $db;

    private $db_table;

    private $path;

    private $theme_path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = 'placowka';
        $this->path = 'institution';
        $this->theme_path = $this->path;
    }

    public function indexAction()
    {
        $list = $this->db->select("SELECT * FROM {$this->db_table}");

        return view("{$this->theme_path}/index", compact('list'));
    }

    public function addAction()
    {
        $nazwa = Request::createFromGlobals()->get('nazwa');

        $this->db->insert("INSERT INTO {$this->db_table} VALUES('', '{$nazwa}')");

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }


}