<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM people');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Address Book</title>
</head>
<body>
    <h1>Address Book</h1>
    <a href="add.php" >Add New Person</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>
        <?php while ($row = $stmt->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['surname']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td><?php echo htmlspecialchars($row['number']); ?></td>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> </td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this person?');">Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
