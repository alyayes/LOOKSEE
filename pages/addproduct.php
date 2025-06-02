<?php
include "koneksi.php";

$query_platform = "SELECT * FROM platform";
$result_platform = $koneksi->query($query_platform);

$errors = [];

if (isset($_POST['btnSubmit'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $mood = $_POST['mood'];
    $id_platform = $_POST['id_platform'];
    $link_produk = $_POST['link_produk'];
    $gambar_produk = $_FILES['gambar_produk'];

    // ini soal
    if (!is_numeric($harga) || $harga <= 0) {
        $errors['harga'] = 'Harga tidak boleh 0 atau minus!';
    }
    if (empty($errors)) {

        if (isset($gambar_produk)) {
            $uploadfile = 'uploads/' . basename($gambar_produk['name']);

            if (move_uploaded_file($gambar_produk['tmp_name'], $uploadfile)) {
                $gambar_produk = $gambar_produk['name'];
            } else {
                $gambar_produk = null;
            }
        }

        $sqlStatement = "INSERT INTO produk_looksee 
            (id_produk, gambar_produk, nama_produk, deskripsi, harga, kategori, mood, id_platform, link_produk) 
            VALUES (NULL, '$gambar_produk', '$nama_produk', '$deskripsi', $harga, '$kategori', '$mood', '$id_platform', '$link_produk')";

        $result = mysqli_query($koneksi, $sqlStatement);

        if ($result) {
            echo "<script>window.location.href='index.php?page=product';</script>";
            exit;
        }
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 30px;
        }

        .card {
            background: rgb(255, 231, 249);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 5%;
            margin-right: 10px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
            background-color: rgb(204, 84, 154);
            color: white;
            cursor: pointer;
        }

        input[type="reset"] {
            background-color: #ccc;
            color: #000;
        }

        .btn-group {
            text-align: right;
            margin-top: 15px;
            margin-right: 20%;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <div class="card">
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="nama_produk">Nama Produk</label></td>
                    <td><input type="text" id="nama_produk" name="nama_produk" maxlength="255" required
                            placeholder="Masukkan nama produk"></td>
                </tr>

                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" rows="3" required></textarea></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="number" step="0.01" name="harga" required>
                        <?php if (isset($errors['harga'])): ?>
                            <div class="error"><?= $errors['harga'] ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Woman">Woman</option>
                            <option value="Man">Man</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mood</td>
                    <td>
                        <select name="mood" required>
                            <option value="">Pilih Mood</option>
                            <option value="Very Happy">Very Happy</option>
                            <option value="Happy">Happy</option>
                            <option value="Netral">Neutral</option>
                            <option value="Sad">Sad</option>
                            <option value="Very Sad">Very Sad</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Platform</td>
                    <td>
                        <select name="id_platform" required>
                            <option value="">Pilih Platform</option>
                            <?php while ($row = $result_platform->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id_platform']; ?>">
                                    <?php echo $row['platform']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Link Produk</td>
                    <td><input type="url" name="link_produk" maxlength="255" required></td>
                </tr>
                <tr>
                    <td>Gambar Produk</td>
                    <td><input type="file" name="gambar_produk" accept="image/*" required></td>
                </tr>
            </table>
            <div class="btn-group">
                <input type="submit" value="Add Product" name="btnSubmit">
                <input type="reset" value="Ulangi">
            </div>
        </form>
    </div>

</body>

</html>