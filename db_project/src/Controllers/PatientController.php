<?php

namespace App\Controllers;

/* Kontroler pacjenta */
use Component\Container;
use Symfony\Component\HttpFoundation\Request;

class PatientController
{
    private $db;

    private $db_table;

    private $path;

    private $theme_path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->db_table = 'pacjent';
        $this->path = 'patient';
        $this->theme_path = $this->path;
    }

    public function indexAction()
    {
        if(Request::createFromGlobals()->getMethod() == 'POST'){
            $pesel = Request::createFromGlobals()->get('pesel');
            $haslo = Request::createFromGlobals()->get('haslo');

            $patient = $this->db->select("SELECT * FROM {$this->db_table} WHERE pesel='{$pesel}' AND haslo='{$haslo}'");

            if(!empty($patient)) {
                $id = $patient[0]['id'];
                $histories = $this->db->select
                ("
                    SELECT badanie.nazwa as 'badanie', zabieg.nazwa as 'zabieg', 
                           historia_leczenia.opis, historia_leczenia.data, historia_leczenia.id,
                           lekarz.imie, lekarz.nazwisko, placowka.nazwa as 'placowka'
                    FROM historia_leczenia
                    JOIN szpital_lekarz AS kontrakt ON historia_leczenia.szpital_lekarz_id=kontrakt.id
                    LEFT JOIN lekarz ON kontrakt.lekarz_id=lekarz.id
                    LEFT JOIN placowka ON kontrakt.placowka_id=placowka.id
                    LEFT JOIN zabieg ON historia_leczenia.zabieg_id=zabieg.id
                    LEFT JOIN badanie ON historia_leczenia.badanie_id=badanie.id
                    WHERE pacjent_id={$id} 
                    ORDER BY historia_leczenia.data DESC
                ");

                return view("{$this->theme_path}/profile", compact('patient', 'histories'));
            }
        }

        return view("{$this->theme_path}/index");
    }

    public function addAction()
    {
        $imie = Request::createFromGlobals()->get('imie');
        $nazwisko = Request::createFromGlobals()->get('nazwisko');

        $this->db->insert("INSERT INTO {$this->db_table} VALUES('', '{$imie}', '{$nazwisko}')");

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }


}