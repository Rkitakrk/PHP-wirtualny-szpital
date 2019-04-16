<div style="margin-top: 30px;" id="accordion" role="tablist">
    <?php foreach($histories as $history): ?>
    <div class="card">
        <div class="card-header" role="tab" id="heading<?php echo $history['id']; ?>">
            <h5 class="mb-0">
                <a data-toggle="collapse" href="#collapse<?php echo $history['id']; ?>" role="button" aria-expanded="true" aria-controls="collapse<?php echo $history['id']; ?>">
                    <?php echo $history['data'] ?>
                </a>
            </h5>
        </div>

        <div id="collapse<?php echo $history['id']; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $history['id']; ?>" data-parent="#accordion">
            <div class="card-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><b>Placówka</b></td>
                        <td><?php echo $history['placowka'] ?></td>
                    </tr>

                    <tr>
                        <td><b>Lekarz</b></td>
                        <td><?php echo $history['imie'] . " " . $history['nazwisko']; ?></td>
                    </tr>

                    <tr>
                        <td><b>Badanie</b></td>
                        <td><?php
                            if($history['badanie'] != NULL){
                                echo $history['badanie'];
                            } else {
                                echo '-';
                            }
                            ?></td>
                    </tr>

                    <tr>
                        <td><b>Zabieg</b></td>
                        <td><?php
                            if($history['zabieg'] != NULL){
                                echo $history['zabieg'];
                            } else {
                                echo '-';
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td><b>Opis</b></td>
                        <td><p><?php echo $history['opis']; ?></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>