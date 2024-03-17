<?php

require __DIR__  . '/db.php';

$sql = '
    select 		sites.`name`,
                keywords.`phrase_name`,
                results.`position`,
                results.`created_at`
    from 		results
    left join 	site_keyword on results.site_keyword_id = site_keyword.id
    left join 	sites on site_keyword.site_id = sites.id
    left join 	keywords on site_keyword.keyword_id = keywords.id
';

$results = $conn->query($sql);

if ($results->num_rows === 0) {
    die('There is no data to display');
}

?>
<table>
<?php

$data = $results->fetch_all(MYSQLI_ASSOC);

foreach ($data as $row) {
    ?>
    <tr>
        <td><?php echo $row['name'] ?></td>
        <th scope="row"><?php echo $row['phrase_name']; ?></th>
        <td><?php echo $row['position'] ?></td>
        <td><?php echo $row['created_at'] ?></td>
    </tr>
    <?php
}
?>
</table>
<?php