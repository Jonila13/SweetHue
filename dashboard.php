<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include_once 'Database.php';

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT id, Username, Email, role, created_at FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, p {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome to Admin Dashboard</h1>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['Email']); ?>!</p>

    <h2>List of Users:</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Registered At</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['Username']) ?></td>
            <td><?= htmlspecialchars($user['Email']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
            <td><?= htmlspecialchars($user['created_at']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>