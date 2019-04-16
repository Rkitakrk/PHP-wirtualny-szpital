<?php

    use Component\Container;

    $base_path = Container::get('config')['main']['base_path'];

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Test theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./web/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Projekt RBD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $base_path; ?>">Strona główna<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu" aria-labelledby="admin">
                    <a class="dropdown-item" href="<?php echo $base_path; ?>examination">Badania</a>
                    <a class="dropdown-item" href="<?php echo $base_path; ?>treatment">Zabiegi</a>
                    <a class="dropdown-item" href="<?php echo $base_path; ?>admin/patient">Pacjenci</a>
                    <a class="dropdown-item" href="<?php echo $base_path; ?>admin/doctor">Lekarze</a>
                    <a class="dropdown-item" href="<?php echo $base_path; ?>institution">Placówki</a>
                    <a class="dropdown-item" href="<?php echo $base_path; ?>contract">Kontrakt</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="doctor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lekarz</a>
                <div class="dropdown-menu" aria-labelledby="doctor">
                    <a class="dropdown-item" href="<?php echo $base_path; ?>doctor">Logowanie</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path; ?>patient">Pacjent</a>
            </li>
        </ul>
    </div>
</nav>

<main style="margin-top: 80px;" role="main" class="container">