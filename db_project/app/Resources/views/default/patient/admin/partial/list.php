<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Akcja</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $basePath = basePath();
        foreach($list as $entity){
            echo "<tr>";

            echo "<td>" . $entity['id'] . "</td>";
            echo "<td>" . $entity['imie'] . "</td>";
            echo "<td>" . $entity['nazwisko'] . "</td>";
            echo "<td>" .
               "<form action=\"{$basePath}admin/patient/delete/{$entity['id']}\" method=\"POST\">
                    <input type=\"hidden\" name=\"id\" value=\"{$entity['id']}\">
                    <button class=\"btn btn-sm btn-danger\">Usuń</button>
                </form>"
              . "</td>";

            echo "</tr>";
        }
    ?>
    </tbody>
</table>