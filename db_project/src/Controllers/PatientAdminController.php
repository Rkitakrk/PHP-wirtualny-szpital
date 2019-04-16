<?php

namespace App\Controllers;

/* Kontroler zabiegu */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class PatientAdminController
{
    private $db;

    private $db_table;

    private $path;

    private $theme_path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = 'pacjent';
        $this->path = 'admin/patient';
        $this->theme_path = 'patient/admin';
    }

    public function indexAction()
    {
        $list = $this->db->select("SELECT * FROM {$this->db_table}");

        return view("{$this->theme_path}/index", compact('list'));
    }

    public function addAction()
    {
        $imie = Request::createFromGlobals()->get('imie');
        $nazwisko = Request::createFromGlobals()->get('nazwisko');
        $haslo = Request::createFromGlobals()->get('haslo');
        $pesel = Request::createFromGlobals()->get('pesel');

        $this->db->insert("INSERT INTO {$this->db_table} VALUES('', '{$imie}', '{$nazwisko}', '{$pesel}', '{$haslo}')");

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }


}