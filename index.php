<?php

$host = 'localhost';
$dbname = 'global';
$dbuser = 'krivoshein';
$dbpassword = 'neto1229';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $isbn = $author = $bookname = null;
    $sqlQuery = "SELECT * FROM `books`";
     $statement = $pdo->prepare($sqlQuery);
        $statement->execute([$isbn, $author, $bookname]);
    }
    catch (PDOException $e) {
    die($e->getMessage());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4.1-homework</title>
</head>
<body>
<div>
 

    <?php  ($statement->rowCount() !== 0) ?>
        <table>
            <tr>
                <td>Название</td>
                <td>Автор</td>
                <td>Год</td>
                <td>Жанр</td>
                <td>ISBN</td>
            </tr>
            <?php foreach ($statement as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']) ?></td>
                    <td><?php echo htmlspecialchars($row['author']) ?></td>
                    <td><?php echo htmlspecialchars($row['year']) ?></td>
                    <td><?php echo htmlspecialchars($row['genre']) ?></td>
                    <td><?php echo htmlspecialchars($row['isbn']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
 </div>
</body>
</html>