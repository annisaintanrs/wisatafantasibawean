<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bawean";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $tipeArray = $_POST['tipe'];
    $hargaArray = $_POST['harga'];
    $qtyArray = $_POST['qty'];

    $success = true;
    $errorMessage = "";
    $orderDetails = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'hp' => $hp,
        'items' => array(),
        'total' => 0
    );

    for ($i = 0; $i < count($tipeArray); $i++) {
        $tipe = $tipeArray[$i];
        $harga = $hargaArray[$i];
        $qty = $qtyArray[$i];

        if ($qty > 0) {
            $sql = "INSERT INTO pemesanan (nama, alamat, hp, tipe, harga, qty) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssii", $nama, $alamat, $hp, $tipe, $harga, $qty);

            if ($stmt->execute() === FALSE) {
                $success = false;
                $errorMessage = "Error: " . $stmt->error;
                break;
            } else {
                $orderDetails['items'][] = array(
                    'tipe' => $tipe,
                    'harga' => $harga,
                    'qty' => $qty
                );
                $orderDetails['total'] += $harga * $qty;
            }
        }
    }

    $conn->close();

    if ($success) {
        $_SESSION['order_details'] = $orderDetails;
        header("Location: kwitansi.php");
        exit();
    } else {
        $_SESSION['order_error'] = $errorMessage;
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
?>