<?php getBaseThemeHeader(); ?>


<h1 class="lead">Profil lekarza:</h1>
<h2 class="lead">Witaj, <?php echo $doctor[0]['imie'] . " " . $doctor[0]['nazwisko']; ?></h2>
<a href="<?php echo basePath(); ?>doctor/logout">Wyloguj</a>
<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Kontrakty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Karta pacjenta</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php require_once 'partial/contract.php'; ?>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php require_once 'partial/patient_card_add.php'; ?>
        </div>
    </div>
</div>

<?php getBaseThemeFooter(); ?>
