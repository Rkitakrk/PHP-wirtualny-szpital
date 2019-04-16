<?php

namespace App\Controllers;

/* Kontroler lekarza */
use Component\Container;
use Component\DatabaseManager\ConnectionManager;
use Symfony\Component\HttpFoundation\Request;

class DoctorController
{
    private $db;

    private $db_table;

    private $path;

    private $theme_path;

    public function __construct()
    {
        $this->db = Container::get('query_builder');
        $this->pdo = (new ConnectionManager)->connect(Container::get('config')['db']);
        $this->db_table = 'lekarz';
        $this->path = 'doctor';
        $this->theme_path = $this->path;
    }

    public function loginAction()
    {
        if (Request::createFromGlobals()->getMethod() == 'POST') {

            $login = Request::createFromGlobals()->get('login');
            $haslo = Request::createFromGlobals()->get('haslo');

            $doctor = $this->db->select("SELECT * FROM {$this->db_table} WHERE login='{$login}' AND haslo='{$haslo}'");

            if (!empty($doctor)) {
                $_SESSION['doctor_login'] = $doctor[0]['id'];
                return redirect("doctor");
            }
        }
        return view("{$this->theme_path}/index");
    }

    public function indexAction()
    {
        if ($_SESSION['doctor_login']) {

            $id = $_SESSION['doctor_login'];

            $doctor = $this->db->select("SELECT * FROM {$this->db_table} WHERE id={$id}");

            $contracts = $this->db->select("SELECT placowka.nazwa, placowka.id FROM szpital_lekarz
            RIGHT JOIN placowka ON szpital_lekarz.placowka_id=placowka.id 
            WHERE szpital_lekarz.lekarz_id={$id}");

            $patients = $this->db->select("SELECT * FROM pacjent");

            $treatments = $this->db->select("SELECT * FROM zabieg");

            /* badania */
            $examinations = $this->db->select("SELECT * FROM badanie");

            return view("{$this->theme_path}/profile", compact(
                'doctor', 'contracts', 'patients', 'examinations', 'treatments'
            ));
        } else {
            redirect('doctor/login');
        }
    }

    public function addAction()
    {
        $lekarz = Request::createFromGlobals()->get('lekarz');
        $pacjent = Request::createFromGlobals()->get('pacjent');
        $placowka = Request::createFromGlobals()->get('placowka');
        $badanie = Request::createFromGlobals()->get('badanie') ? : 'null' ;
        $zabieg = Request::createFromGlobals()->get('zabieg')  ? : 'null' ;
        $opis = Request::createFromGlobals()->get('opis');
        $data = Request::createFromGlobals()->get('data');

        $kontrakt = $this->db->select("SELECT id FROM szpital_lekarz WHERE lekarz_id={$lekarz} AND placowka_id={$placowka}");
        $kontrakt = $kontrakt[0]['id'];

        $this->db->insert("INSERT INTO historia_leczenia VALUES(
              '', {$pacjent}, {$kontrakt}, {$badanie}, {$zabieg}, '{$opis}', '{$data}')"
        );

        return redirect("{$this->path}");
    }
    public function deleteAction()
    {
        $id = Request::createFromGlobals()->get('id');

        $this->db->query("DELETE FROM {$this->db_table} WHERE id={$id}");

        redirect("{$this->path}");
    }

    public function logoutAction()
    {
        session_unset();
        session_destroy();
        return redirect('doctor');
    }

}