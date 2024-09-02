<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    $stmt = $pdo->prepare('INSERT INTO people (name, surname, address, number) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $surname, $address, $number]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Person</title>
</head>
<body>
    <h1>Add New Person</h1>
    <form method="post">
    <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><input type="text" name="surname" required></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" required></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" name="number" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Add</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
