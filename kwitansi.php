<?php
session_start();

if (!isset($_SESSION['order_details'])) {
    header("Location: order.php"); 
    exit();
}

$orderDetails = $_SESSION['order_details'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pesanan</title>
    <style>
.container {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
}

    </style>
</head>
<body>

    <div class="container">
        <h1>Kwitansi Pesanan</h1>
        <p>Berikut detail pesanan Anda:</p>
        <ul>
            <li><strong>Nama:</strong> <?php echo $orderDetails['nama']; ?></li>
            <li><strong>Alamat:</strong> <?php echo $orderDetails['alamat']; ?></li>
            <li><strong>No. HP:</strong> <?php echo $orderDetails['hp']; ?></li>
        </ul>

        <h2>Item yang dipesan:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails['items'] as $item): ?>
                    <tr>
                        <td><?php echo $item['tipe']; ?></td>
                        <td><?php echo $item['harga']; ?></td>
                        <td><?php echo $item['qty']; ?></td>
                        <td><?php echo $item['harga'] * $item['qty']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Total Bayar: <?php echo $orderDetails['total']; ?></h3>
    </div>
 
    <a href="#order" onclick="showSection('order')">Order</a>   
<a href="logout.php">Logout</a>
</body>
</html>
