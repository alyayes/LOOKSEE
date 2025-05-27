<?php
include __DIR__ . '/../koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID produk tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);

// Ambil data produk
$stmt = $koneksi->prepare("SELECT * FROM produk_looksee WHERE id_produk=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    echo "Produk tidak ditemukan!";
    exit;
}

$produk = $data;

// Ambil data semua platform
$platforms = [];
$sqlPlatform = "SELECT id_platform, platform FROM platform";
$resultPlatform = $koneksi->query($sqlPlatform);
while ($row = $resultPlatform->fetch_assoc()) {
    $platforms[] = $row;
}

if (isset($_POST['btnSubmit'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $mood = $_POST['mood'];
    $platform = $_POST['id_platform'];
    $link_produk = $_POST['link_produk'];
    $gambarLama = $_POST['gambarLama'];

    $image_path = $gambarLama;

    if (isset($_FILES['gambar_produk']) && $_FILES['gambar_produk']['error'] === UPLOAD_ERR_OK) {
        $target_dir = __DIR__ . '/../uploads/';
        $filename = time() . "_" . basename($_FILES["gambar_produk"]["name"]);
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $target_file)) {
            $image_path = $filename;

            $old_path = $target_dir . $gambarLama;
            if ($gambarLama && file_exists($old_path) && $gambarLama !== $image_path) {
                unlink($old_path);
            }
        } else {
            echo "<script>alert('Upload gambar gagal.');</script>";
        }
    }

    $stmt = $koneksi->prepare("UPDATE produk_looksee 
        SET nama_produk=?, deskripsi=?, harga=?, kategori=?, mood=?, id_platform=?, link_produk=?, gambar_produk=? 
        WHERE id_produk=?");
    $stmt->bind_param(
        "ssdsssssi",
        $nama_produk,
        $deskripsi,
        $harga,
        $kategori,
        $mood,
        $platform,
        $link_produk,
        $image_path,
        $id
    );

    if ($stmt->execute()) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location.href='index.php?page=product';</script>";
        exit;
    } else {
        echo "Gagal update: " . $stmt->error;
    }
    $stmt->close();
}
?>

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
        background-color: rgb(255, 216, 245);
    }

    .card {
        width: 1200px;
        background-color: rgb(255, 231, 249);
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        text-align: center;
        margin-bottom: 25px;
    }

    .card table {
        width: 100%;
    }

    .card td {
        padding: 10px 0;
    }

    .card input[type="text"],
    .card input[type="number"],
    .card input[type="file"],
    .card textarea {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .card input[type="submit"],
    .card input[type="reset"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-top: 15px;
        cursor: pointer;
    }

    .card input[type="submit"] {
        background-color: #28a745;
        color: white;
    }

    .card input[type="reset"] {
        background-color: #dc3545;
        color: white;
        margin-left: 10px;
    }

    .card img {
        margin-top: 10px;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="card">
        <h2>Edit Produk</h2>
        <form action="index.php?page=editproduct&id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama_produk" value="<?= htmlspecialchars($produk['nama_produk']) ?>"
                            required></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" rows="4"
                            required><?= htmlspecialchars($produk['deskripsi']) ?></textarea></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga" value="<?= $produk['harga'] ?>" required></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Woman" <?= $produk['kategori'] == 'Woman' ? 'selected' : '' ?>>Woman</option>
                            <option value="Man" <?= $produk['kategori'] == 'Man' ? 'selected' : '' ?>>Man</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mood</td>
                    <td>
                        <select name="mood" required>
                            <option value="">-- Pilih Mood --</option>
                            <option value="Very Happy" <?= $produk['mood'] == 'Very Happy' ? 'selected' : '' ?>>Very Happy
                            </option>
                            <option value="Happy" <?= $produk['mood'] == 'Happy' ? 'selected' : '' ?>>Happy</option>
                            <option value="Netral" <?= $produk['mood'] == 'Netral' ? 'selected' : '' ?>>Netral</option>
                            <option value="Sad" <?= $produk['mood'] == 'Sad' ? 'selected' : '' ?>>Sad</option>
                            <option value="Very Sad" <?= $produk['mood'] == 'Very Sad' ? 'selected' : '' ?>>Very Sad
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Platform</td>
                    <td>
                        <select name="id_platform" required>
                            <option value="">-- Pilih Platform --</option>
                            <?php foreach ($platforms as $p): ?>
                                <option value="<?= $p['id_platform'] ?>" <?= $produk['id_platform'] == $p['id_platform'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($p['platform']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Link Produk</td>
                    <td><input type="text" name="link_produk" value="<?= htmlspecialchars($produk['link_produk']) ?>"
                            required></td>
                </tr>
                <tr>
                    <td>Gambar Produk</td>
                    <td>
                        <input type="file" name="gambar_produk">
                        <?php if ($produk['gambar_produk']): ?>
                            <br><img src="uploads/<?= $produk['gambar_produk'] ?>" alt="Gambar Produk" width="150">
                        <?php endif; ?>
                        <input type="hidden" name="gambarLama" value="<?= $produk['gambar_produk'] ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnSubmit" value="Simpan">
                        <input type="reset" value="Ulangi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>