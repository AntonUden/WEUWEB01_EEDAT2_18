<?php
require "./db.php";

$dbc = new DBConnection("uppgift28", "root", "root", "127.0.0.1");

$entries = $dbc->getEntries();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./bootstrap.min.css">
        <script src="./jquery-3.4.1.min.js"></script>
        <script src="./bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <title>Admin</title>
    </head>
    <body>
        <div class="mx-2 mt-2">
            <table class="w-100 table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Förnamn</th>
                        <th>Efternamn</th>
                        <th>E-post</th>
                        <th>Mobil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entries as $entry): ?>
                    <tr>
                        <td><?php echo htmlentities($entry->getId()); ?></td>
                        <td><?php echo htmlentities($entry->getFirstName()); ?></td>
                        <td><?php echo htmlentities($entry->getLastName()); ?></td>
                        <td><?php echo htmlentities($entry->getEmail()); ?></td>
                        <td><?php echo htmlentities($entry->getPhoneNumber()); ?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </body>
</html>
