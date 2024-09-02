<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM people WHERE id = ?');
$stmt->execute([$id]);
$person = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    $stmt = $pdo->prepare('UPDATE people SET name = ?, surname = ?, address = ?, number = ? WHERE id = ?');
    $stmt->execute([$name, $surname, $address, $number, $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Person</title>
</head>
<body>
    <h1>Edit Person</h1>
    <form method="post">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($person['name']); ?>" required><br>
        Surname: <input type="text" name="surname" value="<?php echo htmlspecialchars($person['surname']); ?>" required><br>
        Address: <input type="text" name="address" value="<?php echo htmlspecialchars($person['address']); ?>" required><br>
        Phone Number: <input type="text" name="number" value="<?php echo htmlspecialchars($person['number']); ?>" required><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
