<?php

use Component\Router\Route;
use Component\Router\RouteCollection;

$routeCollection = new RouteCollection();

$routeCollection->add(new Route('GET', '/other/{path}/{cos?}', 'HomeController@index', [
    'cos' => '\d',
    'path' => '(\w){1,}'
]));

$routeCollection->add(new Route('GET', '/', 'HomeController@index'));

$routeCollection->add(new Route('GET', '/examination', 'ExaminationController@index'));
$routeCollection->add(new Route('POST', 'examination/add', 'ExaminationController@add'));
$routeCollection->add(new Route('POST', '/examination/delete/{id}', 'ExaminationController@delete', [
    'id' => '\d',
]));

$routeCollection->add(new Route('GET', '/treatment', 'TreatmentController@index'));
$routeCollection->add(new Route('POST', 'treatment/add', 'TreatmentController@add'));
$routeCollection->add(new Route('POST', '/treatment/delete/{id}', 'TreatmentController@delete', [
    'id' => '\d',
]));

$routeCollection->add(new Route('GET', 'admin/patient', 'PatientAdminController@index'));
$routeCollection->add(new Route('POST', '/admin/patient/add', 'PatientAdminController@add'));
$routeCollection->add(new Route('POST', '/admin/patient/delete/{id}', 'PatientAdminController@delete', [
    'id' => '\d',
]));

$routeCollection->add(new Route('GET', 'admin/doctor', 'DoctorAdminController@index'));
$routeCollection->add(new Route('POST', '/admin/doctor/add', 'DoctorAdminController@add'));
$routeCollection->add(new Route('POST', '/admin/doctor/delete/{id}', 'DoctorAdminController@delete', [
    'id' => '\d',
]));

$routeCollection->add(new Route('GET', 'institution', 'InstitutionController@index'));
$routeCollection->add(new Route('POST', '/institution/add', 'InstitutionController@add'));
$routeCollection->add(new Route('POST', '/institution/delete/{id}', 'InstitutionController@delete', [
    'id' => '\d',
]));

$routeCollection->add(new Route('GET', 'contract', 'ContractController@index'));
$routeCollection->add(new Route('POST', '/contract/add', 'ContractController@add'));
$routeCollection->add(new Route('POST', '/contract/delete/{id}', 'ContractController@delete', [
    'id' => '\d',
]));

$routeCollection->add(new Route('GET', 'patient', 'PatientController@index'));
$routeCollection->add(new Route('POST', 'patient', 'PatientController@index'));
$routeCollection->add(new Route('GET', 'patient/profile', 'PatientController@profile'));

$routeCollection->add(new Route('GET', 'doctor', 'DoctorController@index'));
$routeCollection->add(new Route('POST', 'doctor', 'DoctorController@index'));
$routeCollection->add(new Route('POST', 'doctor/card/add', 'DoctorController@add'));
$routeCollection->add(new Route('GET', 'doctor/profile', 'DoctorController@profile'));
$routeCollection->add(new Route('GET', 'doctor/logout', 'DoctorController@logout'));
$routeCollection->add(new Route('POST', 'doctor/login', 'DoctorController@login'));
$routeCollection->add(new Route('GET', 'doctor/login', 'DoctorController@login'));





return $routeCollection;