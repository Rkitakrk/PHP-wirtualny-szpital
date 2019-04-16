<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Lekarz</th>
        <th scope="col">Szpital</th>
        <th scope="col">Akcja</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $basePath = basePath();
        foreach($list as $entity){
            echo "<tr>";

            echo "<td>" . $entity['id'] . "</td>";
            echo "<td>" . $entity['imie'] . " " . $entity['nazwisko'] . "</td>";
            echo "<td>" . $entity['nazwa'] . "</td>";
            echo "<td>" .
               "<form action=\"{$basePath}contract/delete/{$entity['id']}\" method=\"POST\">
                    <input type=\"hidden\" name=\"id\" value=\"{$entity['id']}\">
                    <button class=\"btn btn-sm btn-danger\">Usuń</button>
                </form>"
              . "</td>";

            echo "</tr>";
        }
    ?>
    </tbody>
</table>