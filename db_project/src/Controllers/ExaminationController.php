<?php

namespace App\Controllers;

/* Kontroler badania */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class ExaminationController
{
    private $db;

    private $db_table;

    private $path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = "badanie";
        $this->path = 'examination';
    }

    public function indexAction()
    {
        $list = $this->db->select("SELECT * FROM {$this->db_table}");

        return view("{$this->path}/index", compact('list'));
    }

    public function addAction()
    {
        $nazwa = Request::createFromGlobals()->get('nazwa');
        $koszt = Request::createFromGlobals()->get('koszt');
        $refundacja = Request::createFromGlobals()->get('refundacja');

        if (isset($refundacja)){
            $refundacja = 1;
        } else {
            $refundacja = 0;
        }

        $this->db->insert("INSERT into {$this->db_table} VALUES('', '{$nazwa}', {$koszt}, {$refundacja})");

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }


}