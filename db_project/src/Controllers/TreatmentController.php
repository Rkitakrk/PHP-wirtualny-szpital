<?php

namespace App\Controllers;

/* Kontroler zabiegu */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class TreatmentController
{
    private $db;

    private $db_table;

    private $path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = 'zabieg';
        $this->path = "treatment";
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