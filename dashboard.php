<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include_once 'Database.php';

$db = new Database();
$conn = $db->getConnection();



// delete user
if (isset($_GET['delete_user'])) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_GET['delete_user']]);
    header("Location: dashboard.php");
    exit;
}

// delete product
if (isset($_GET['delete_product'])) {
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET['delete_product']]);
    header("Location: dashboard.php");
    exit;
}


// add user
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (Username, Email, Password, created_at)
         VALUES (?, ?, ?, NOW())"
    );
    $stmt->execute([$username, $email, $password]);

    header("Location: dashboard.php");
    exit;
}

// add product
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $stmt = $conn->prepare(
        "INSERT INTO products (Name, Price, Image)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([$name, $price, $image]);

    header("Location: dashboard.php");
    exit;
}



$users = $conn->query(
    "SELECT id, Username, Email, created_at FROM users ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);

$products = $conn->query(
    "SELECT * FROM products ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);
$messages=$conn->query(
    "SELECT * FROM contact_messages ORDER BY id DESC"
)->fetchALL(PDO::  FETCH_ASSOC);

$reviews=$conn->query(
    "SELECT*FROM reviews ORDER BY id DESC"
)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    font-family: Arial, sans-serif;
    padding: 20px;
}
table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 30px;
}
th, td {
    border: 1px solid #333;
    padding: 8px;
}
th {
    background: #f2f2f2;
}
h1, h2, h3 {
    margin-top: 40px;
}
a {
    color: red;
    text-decoration: none;
}
input, button {
    padding: 6px;
    margin: 5px 0;
}
img {
    max-width: 50px;
}
hr {
    margin: 40px 0;
}
</style>
</head>

<body>

<h1>Admin Dashboard</h1>
<p>Welcome, <b><?= htmlspecialchars($_SESSION['Email']) ?></b></p>
<p><a href="logout.php">Logout</a></p>

<hr>


<h2>Users</h2>
<table>
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Created At</th>
    <th>Action</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= htmlspecialchars($user['Username']) ?></td>
    <td><?= htmlspecialchars($user['Email']) ?></td>
    <td><?= $user['created_at'] ?></td>
    <td>
        <a href="?delete_user=<?= $user['id'] ?>"
           onclick="return confirm('Delete user?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<h3>Add New User</h3>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="add_user">Add User</button>
</form>

<hr>


<h2>Products</h2>
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Image</th>
    <th>Action</th>
</tr>

<?php foreach ($products as $product): ?>
<tr>
    <td><?= $product['id'] ?></td>
    <td><?= htmlspecialchars($product['Name']) ?></td>
    <td><?= $product['Price'] ?> €</td>
    <td><img src="<?= htmlspecialchars($product['Image']) ?>"></td>
    <td>
        <a href="?delete_product=<?= $product['id'] ?>"
           onclick="return confirm('Delete product?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<h3>Add New Product</h3>
<form method="POST">
    <input type="text" name="name" placeholder="Product name" required><br>
    <input type="number" step="0.01" name="price" placeholder="Price" required><br>
    <input type="text" name="image" placeholder="Image URL" required><br>
    <button type="submit" name="add_product">Add Product</button>
</form>

<hr>
<h2>Contact Messages</h2>
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Message</th>
</tr>

<?php foreach ($messages as $msg): ?>
<tr>
    <td><?= $msg['id'] ?></td>
    <td><?= htmlspecialchars($msg['Name']) ?></td>
    <td><?= htmlspecialchars($msg['Email']) ?></td>
    <td><?= htmlspecialchars($msg['subject']) ?></td>
    <td><?= htmlspecialchars($msg['Message']) ?></td>
</tr>
<?php endforeach; ?>
</table>

<hr>


<h2>User Reviews</h2>
<table>
<tr>
    <th>ID</th>
    <th>Stars</th>
    <th>Feedback</th>
    <th>Created At</th>
</tr>

<?php foreach ($reviews as $review): ?>
<tr>
    <td><?= $review['id'] ?></td>
    <td><?= $review['stars'] ?></td>
    <td><?= htmlspecialchars($review['feedback']) ?></td>
    <td><?= $review['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>







