<h1>Results</h1>
<?= $this->Html->link('Add Result', ['action' => 'add']) //link to the 'add' page ?>
<table>
<!--    table creation-->
    <tr>
        <th>First Name</th>
        <th>Surname</th>
        <th>Created</th>
        <th>IP Address</th>
        <th>Favourite Film</th>
        <th>Favourite Series</th>
    </tr>

    <?php foreach ($results as $result): //loop through all results gathered from database?>
<!--    display the results as associated by heading name-->
        <tr>
        <td>
            <?= $result->first_name ?>
        </td>
        <td>
            <?= $result->surname ?>
        </td>
        <td>
            <?= $result->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $result->ip_address?>
        </td>
        <td>
            <?= $result->favourite_film ?>
        </td>
        <td>
            <?= $result->favourite_series ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
