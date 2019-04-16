<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Placówka</th>
        <th>Akcja</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $basePath = basePath();
    foreach($contracts as $entity){
        echo "<tr>";

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