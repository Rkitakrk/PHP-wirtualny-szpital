<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Koszt</th>
        <th scope="col">Refundacja</th>
        <th scope="col">Akcja</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($list as $entity){
            echo "<tr>";

            echo "<td>" . $entity['id'] . "</td>";
            echo "<td>" . $entity['nazwa'] . "</td>";
            echo "<td>" . $entity['koszt'] . "</td>";
            echo "<td>" . $entity['refundacja'] . "</td>";
            echo "<td>" .
               "<form action=\"treatment/delete/{$entity['id']}\" method=\"POST\">
                    <input type=\"hidden\" name=\"id\" value=\"{$entity['id']}\">
                    <button class=\"btn btn-sm btn-danger\">Usuń</button>
                </form>"
              . "</td>";

            echo "</tr>";
        }
    ?>
    </tbody>
</table>