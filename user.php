<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><b>Wisata Fantasi Bawean</b></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header-nav {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            color: #000;
            padding: 20px 20px;
        }
        .header-nav h1 {
            margin: 0;
            flex: 1;
        }
        .navbar {
            display: flex;
        }
        .navbar a {
            color: #000;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: #4CAF50;
            color: black;
        }
        .navbar a.active {
            background-color: #4CAF50; 
            color: white;
        }
        .section {
            display: none;
            padding: 20px;
        }
        .section.active {
            display: block;
        }
        .home img {
            width: 100%;
            height: auto;
        }
        .content {
            display: flex;
            padding: 20px;
            align-items: center;
        }
        .content img {
            width: 40%;
            height: auto;
            margin-right: 20px;
        }
        .content-text {
            flex: 1;
            text-align: left;
        }
        .wahana-section {
            display: flex;
            flex-wrap: wrap;
        }
        .ratings-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 20%;
        }
        .ratings h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .ratings ul {
            list-style-type: none;
            padding: 0;
        }
        .ratings ul li {
            font-size: 1.2em;
            color: red;
            margin-bottom: 5px;
        }
        .wahana-cards {
            display: flex;
            flex-wrap: wrap;
            width: 75%;
        }
        .wahana-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 10px;
            width: calc(33% - 40px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .wahana-card img {
            max-width: 80%;
            height: auto;
            border-radius: 3px;
        }
        .wahana-card h3 {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .wahana-card .price {
            color: #00aaff;
            font-size: 1.2em;
            margin: 5px 0;
        }
        .wahana-card .rating {
            color: red;
            margin: 5px 0;
        }
        .wahana-card .reviews {
            color: gray;
            margin: 5px 0;
        }
        .notification {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

        .info-horizontal {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.info-horizontal p {
    margin-right: 15px;
    white-space: nowrap;
}

.contact-info {
    margin-bottom: 20px;
    flex: 1; /* Added flex to take up remaining space */
}

.contact-info h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.contact-info p {
    margin: 5px 0;
}

.form-group {
    margin-bottom: 15px;
    flex: 1; /* Added flex to take up remaining space */
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

.form-group textarea {
    resize: vertical;
}

.submit-btn {
    padding: 10px 15px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
}

.comments-container {
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
    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active');
            }
            document.getElementById(sectionId).classList.add('active');

            var links = document.querySelectorAll('.navbar a');
            links.forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector('.navbar a[href="#' + sectionId + '"]').classList.add('active');
        }

        window.onload = function() {
            showSection('home'); 
        };
    </script>
</head>
<body>

    <div class="header-nav">
        <h1>Wisata Fantasi Bawean</h1>
        <div class="navbar">
            <a href="#home" onclick="showSection('home')">Home</a>
            <a href="#wahana" onclick="showSection('wahana')">Wahana</a>
            <a href="#contact" onclick="showSection('contact')">Contact</a>
            <a href="#order" onclick="showSection('order')">Order</a>
        </div>
    </div>

    <div id="home" class="section home">
    <img src="laut.png" alt="Wisata Fantasi Bawean"> <br><br>
    <div class="content">
        <img src="banana.jpg" alt="Wahana">
        <div class="content-text">
            <h2>Tentang Kami</h2>
            <p>Wisata Fantasi Bawean terletak di utara Pulau Jawa, Kabupaten Gresik, Jawa Timur, Wisata Fantasi Bawean menawarkan pantai berpasir putih dan air laut yang jernih, sempurna untuk berenang dan snorkeling. Nikmati berbagai permainan seru seperti bianglala dengan pemandangan indah, banana boat, jet ski, dan paus goyang untuk anak-anak. Wisata Fantasi Bawean adalah destinasi ideal untuk menikmati keindahan alam dan keseruan permainan.</p>
        </div>
    </div>
</div>

    </div>

    <div id="wahana" class="section wahana">
        <div class="wahana-section">
            <div class="ratings-card">
                <h2>STAR RATING</h2>
                <ul>
                    <li>☆☆☆☆☆</li>
                    <li>★☆☆☆☆</li>
                    <li>★★☆☆☆</li>
                    <li>★★★☆☆</li>
                    <li>★★★★☆</li>
                    <li>★★★★★</li>
                </ul>
            </div>
            <div class="wahana-cards">
                <div class="wahana-card">
                    <img src="paus.jpg" alt="Paus Dangdut" onclick="openModal('modalPaus')">
                    <h3>Paus Dangdut</h3>
                    <div class="rating">★★★★★</div>
                    <div class="price">Rp8500</div>
                    <div class="reviews">6 Rating</div>
                    <p>Lebih Detailnya Klik Gambar</p>
                </div>
                <div class="wahana-card">
                    <img src="sepeda.jpg" alt="Sepeda Air" onclick="openModal('modalSepeda')">
                    <h3>Sepeda Air</h3>
                    <div class="rating">★★★★☆</div>
                    <div class="price">Rp4500</div>
                    <div class="reviews">5 Rating</div>
                    <p>Lebih Detailnya Klik Gambar</p>
                </div>
                <div class="wahana-card">
                    <img src="jet.jpg" alt="Jet Coaster" onclick="openModal('modalJet')">
                    <h3>Jet Coaster</h3>
                    <div class="rating">★★★★★</div>
                    <div class="price">Rp8500</div>
                    <div class="reviews">7 Rating</div>
                    <p>Lebih Detailnya Klik Gambar</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="modalPaus" class="modal">
        <div class="notification">
            <p>Permainan Paus Dangdut di Wisata Bahari Lamongan adalah wahana permainan yang unik dan menarik. Dalam permainan ini, terdapat alunan musik dangdut yang mengiringi pengalaman bermain. Pengunjung dapat menaiki permainan ini dan berinteraksi dengan wahana yang berbentuk seperti ikan paus dengan beberapa tempat duduk di atasnya</p>
    </div>
</div>

<div id="modalSepeda" class="modal">
        <div class="notification">
            <p>Permainan Sepeda Air di Wisata Bahari Lamongan adalah wahana yang memungkinkan pengunjung untuk menaiki sepeda air yang dirancang seperti bebek. Wahana ini dilengkapi dengan tempat duduk di atasnya, memungkinkan pengunjung untuk berada di atas air sambil menikmati pemandangan sekitar</p>
        </div>
    </div>
</div>

<div id="modalJet" class="modal">
        <div class="notification">
            <p>Jet Coaster Slide adalah sebuah wahana . Dengan lintasan yang panjang mencapai 225 meter, diklaim sebagai lintasan terpanjang di Asia Tenggara, wahana ini menawarkan pengalaman permainan yang sangat menegangkan dan berwarna. Dibangun dengan ketinggian 20 meter, wahana ini memberikan pengalaman yang ekstrem dan menegangkan. Mesin jet yang digunakan dapat mendorong ban dengan kecepatan 60 kilometer per jam, serta dilengkapi dengan teknologi yang andal</p>
        </div>
    </div>
</div>

    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active');
            }
            document.getElementById(sectionId).classList.add('active');
        }
        
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function(event) {
            var modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = "none";
                }
            }
        }
    </script>
    </div>

    <div id="contact" class="section contact">
        <div class="container">
        <div class="form-container">
            <h2>Contact Information</h2>
            <div class="info-horizontal">
                <p><strong>Address:</strong> Laut Bawean Kab. Gresik, Jawa Timur</p>
                <p><strong>Phone:</strong> +62 879 089 678 897</p>
                <p><strong>Email:</strong> officialwisatafantasibawean@gmail.com</p>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        <div class="comments-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Comment</th>
                </tr>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "bawean";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = htmlspecialchars($_POST['name']);
                        $comment = htmlspecialchars($_POST['comment']);

                        $stmt = $conn->prepare("INSERT INTO komen (nama, komentar) VALUES (?, ?)");
                        $stmt->bind_param("ss", $name, $comment);

                        if ($stmt->execute()) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $stmt->error;
                        }

                        $stmt->close();
                    }

                    $result = $conn->query("SELECT nama, komentar FROM komen");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . htmlspecialchars($row["nama"]) . "</td><td>" . htmlspecialchars($row["komentar"]) . "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No comments yet</td></tr>";
                    }

                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div id="order" class="section order">
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <center>Form Order Wisata Fantasi Bawean</center>
            </div>
            <form action='prosesorder.php' method='post'>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td colspan="3"><input type="text" class="form-control" name="nama" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat lengkap</th>
                            <td colspan="3"><textarea class="form-control" rows="3" name="alamat" required></textarea></td>
                        </tr>
                        <tr>
                            <th scope="row">HP</th>
                            <td colspan="3"><input type="text" class="form-control" name="hp" required></td>
                        </tr>
                    </tbody>
                </table>
                <br/><br/>
                <div class='alert alert-info' role='alert'>
                    <center>Daftar item yang dipesan</center>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Harga</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tipe, harga FROM tiket ORDER BY tipe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tipe = $row['tipe'];
        $harga = $row['harga'];
        echo "
        <tr>
            <td>$tipe <input type='hidden' class='form-control' value='$tipe' name='tipe[]' readonly></td>
            <td><input type='text' class='form-control' value='$harga' name='harga[]' readonly></td>
            <td><input type='number' class='form-control' name='qty[]' min='1'></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No items found</td></tr>";
}
$conn->close();
?>
                    </tbody>
                </table>
                <div class="form-group">
                    <center><button type="submit" class="btn btn-primary">Submit</button></center>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active');
            }
            document.getElementById(sectionId).classList.add('active');

            var links = document.querySelectorAll('.navbar a');
            links.forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector('.navbar a[href="#' + sectionId + '"]').classList.add('active');
        }

        window.onload = function() {
            showSection('home'); 
        };
    </script>
</body>
</html>
