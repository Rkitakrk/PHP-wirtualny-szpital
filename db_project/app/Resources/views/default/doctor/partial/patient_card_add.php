<div class="form-group">
    <form action="<?php echo basePath() ?>doctor/card/add" method="POST">
        <div class="form-group">
            <div class="form-group">
                <input type="hidden" name="lekarz" value="<?php echo $doctor[0]['id'] ?>" class="form-control" id="doctor">
            </div>
        </div>
        <div class="form-group">
            <label for="pacjent">Pacjent</label>
            <select name="pacjent" id="pacjent">
                <?php
                    foreach($patients as $patient) {
                        echo "<option value=\"{$patient['id']}\">{$patient['imie']} {$patient['nazwisko']}</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="institution">Placówka</label>
            <select name="placowka" id="institution">
                <?php
                    foreach($contracts as $contract) {
                        echo "<option value=\"{$contract['id']}\">{$contract['nazwa']}</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="examination">Badanie</label>
            <select name="badanie" id="examination">
                <option value="" selected="selected">Brak</option>
                <?php
                foreach($examinations as $examination) {
                    echo "<option value=\"{$examination['id']}\">{$examination['nazwa']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="treatment">Zabieg</label>
            <select name="zabieg" id="treatment">
                <option value="" selected="selected">Brak</option>
                <?php
                foreach($treatments as $treatment) {
                    echo "<option value=\"{$treatment['id']}\">{$treatment['nazwa']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea class="form-control" name="opis" id="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="date">Data</label>
            <input type="datetime-local" name="data" class="form-control" id="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Zapisz</button>
    </form>
</div>

