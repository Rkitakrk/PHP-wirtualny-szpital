<?php

namespace App\Controllers;

/* Kontroler zabiegu */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class ContractController
{
    private $db;

    private $db_table;

    private $path;

    private $theme_path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = 'szpital_lekarz';
        $this->path = 'contract';
        $this->theme_path = $this->path;
    }

    public function indexAction()
    {
        $list = $this->db->select("SELECT
              {$this->db_table}.id,
              lekarz.imie,
              lekarz.nazwisko,
              placowka.nazwa
            FROM {$this->db_table} 
            JOIN lekarz ON lekarz_id=lekarz.id 
            JOIN placowka ON placowka_id=placowka.id 
            ");

        $doctors = $this->db->select("SELECT * FROM lekarz");
        $institutions = $this->db->select("SELECT * FROM placowka");

        return view("{$this->theme_path}/index", compact('list','doctors', 'institutions'));
    }

    public function addAction()
    {
        $lekarz = Request::createFromGlobals()->get('lekarz');
        $placowka = Request::createFromGlobals()->get('placowka');

        $this->db->insert("INSERT INTO {$this->db_table} VALUES('', '{$placowka}', '{$lekarz}')");

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }


}