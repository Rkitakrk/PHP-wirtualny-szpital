<?php

namespace App\Controllers;

/* Kontroler zarządzania lekarzami */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class DoctorAdminController
{
    private $db;

    private $db_table;

    private $path;

    private $theme_path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = 'lekarz';
        $this->path = 'admin/doctor';
        $this->theme_path = 'doctor/admin';
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
        $login = Request::createFromGlobals()->get('login');
        $haslo = Request::createFromGlobals()->get('haslo');

        $this->db->insert("INSERT INTO {$this->db_table} VALUES('', '{$imie}', '{$nazwisko}', '{$login}', '{$haslo}')");

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }


}