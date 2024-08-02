<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kelompok 3</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/img/person-removebg-preview.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />


    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.php" class="logo">
                        <img src="assets/img/person-removebg-preview.png" alt="navbar brand" class="navbar-brand" height="40" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link<?php echo ($currentPage === 'index') ? ' active' : ''; ?>" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Daftar Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="jenis.php" class="nav-link<?php echo ($currentPage === 'jenis') ? ' active' : ''; ?>" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <p>Jenis Buku</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.php" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Admin</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded" />
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between mt-2">
                                <h3>Daftar Buku</h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                                    Tambah Buku
                                </button>

                                <!-- Pop-up form -->
                                <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="barang/act.php?action=insert" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Buku:</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis">Jenis Buku:</label>
                                                        <select name="jenis_buku" id="jenis_buku" class="form-select" required>
                                                            <option disabled selected>Pilih</option>
                                                            <?php
                                                            include 'config/database.php'; // Pastikan path sesuai dengan struktur proyek Anda

                                                            $q = $conn->query("SELECT * FROM jenis_buku");
                                                            while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                                echo "<option value='{$row['id']}'>{$row['nama_jenis_buku']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kode">Kode Buku:</label>
                                                        <input type="text" class="form-control" id="kode" name="kode" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="stok">Stok Buku:</label>
                                                        <input type="number" class="form-control" id="stok" name="stok" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lokasi">Lokasi Buku:</label>
                                                        <input type="file" class="form-control" id="lokasi" name="image" required>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-3">
                                                        <input type="submit" class="btn btn-primary ms-3" name="create" />
                                                        <button type="button" class="btn btn-danger me-3" onclick="window.location.href='index.php'">Batal</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="MyTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Buku</th>
                                            <th scope="col">Jenis Buku</th>
                                            <th scope="col">Kode Buku</th>
                                            <th scope="col">Stok Buku</th>
                                            <th scope="col">Lokasi Buku</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include 'config/database.php'; // Adjust the path as per your actual structure

                                        // Query dengan JOIN untuk mengambil data buku beserta jenis bukunya
                                        $query = $conn->query("SELECT buku.id, buku.nama_buku, jenis_buku.nama_jenis_buku, buku.kode, buku.stok, buku.lokasi
FROM buku
INNER JOIN jenis_buku ON buku.jenis_buku_id = jenis_buku.id");
                                        $i = 1;
                                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $i . "</th>";
                                            echo "<td>" . htmlspecialchars($row['nama_buku']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nama_jenis_buku']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['kode']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['stok']) . "</td>";
                                            echo "<td><img src='" . "assets/image/" . htmlspecialchars($row['lokasi']) . "' alt='Book Image' style='max-width: 100px;'></td>";
                                            echo "<td class='d-flex gap-2'>";
                                            echo "<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editModal" . $row['id'] . "'>Edit</button>";
                                            echo "<button type='button' class='btn btn-danger btn-sm ml-2' data-toggle='modal' data-target='#deleteModal" . $row['id'] . "'>Delete</button>";
                                            echo "</td>";
                                            echo "</tr>";

                                            // Modal untuk Edit
                                            // Modal untuk Edit
                                            echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>";
                                            echo "<div class='modal-dialog'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='editModalLabel'>Edit Buku</h5>";
                                            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            echo "<form action='barang/act.php?action=update' method='post' enctype='multipart/form-data'>";
                                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='edit_nama'>Nama Buku:</label>";
                                            echo "<input type='text' class='form-control' id='edit_nama' name='nama' value='" . htmlspecialchars($row['nama_buku']) . "' required>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='edit_jenis_buku'>Jenis Buku:</label>";
                                            // Dropdown for selecting book genre
                                            echo "<select name='jenis_buku' id='edit_jenis_buku' class='form-select' required>";

                                            // Include database configuration to establish connection
                                            include 'config/database.php'; // Adjust path as needed

                                            // Fetch all genres from jenis_buku table
                                            $q = $conn->query("SELECT * FROM jenis_buku");

                                            // Loop through each genre and create an option element
                                            while ($jenis = $q->fetch(PDO::FETCH_ASSOC)) {
                                                // Check if the current genre is the one being edited
                                                $selected = ($jenis['id'] == $row['jenis_buku_id']) ? 'selected' : '';
                                                // Output the option element
                                                echo "<option value='{$jenis['id']}' $selected>{$jenis['nama_jenis_buku']}</option>";
                                            }

                                            echo "</select>";

                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='edit_kode'>Kode Buku:</label>";
                                            echo "<input type='text' class='form-control' id='edit_kode' name='kode' value='" . htmlspecialchars($row['kode']) . "' required>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='edit_stok'>Stok Buku:</label>";
                                            echo "<input type='number' class='form-control' id='edit_stok' name='stok' value='" . htmlspecialchars($row['stok']) . "' required>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='edit_image'>Gambar Saat Ini:</label><br>";
                                            echo "<img src='" . "assets/image/" . htmlspecialchars($row['lokasi']) . "' alt='Book Image' style='max-width: 100px;'><br><br>";
                                            echo "<label for='edit_image'>Ganti Gambar:</label>";
                                            echo "<input type='file' class='form-control' id='edit_image' name='image'>";
                                            echo "</div>";
                                            echo "<div class='d-flex justify-content-between mt-3'>";
                                            echo "<button type='submit' class='btn btn-primary' name='update'>Simpan Perubahan</button>";
                                            echo "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Batal</button>";
                                            echo "</div>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";


                                            // Modal untuk Delete
                                            echo "<div class='modal fade' id='deleteModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>";
                                            echo "<div class='modal-dialog' role='document'>";
                                            echo "<div class='modal-content'>";
                                            echo "<div class='modal-header'>";
                                            echo "<h5 class='modal-title' id='deleteModalLabel'>Delete Book</h5>";
                                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                            echo "</button>";
                                            echo "</div>";
                                            echo "<div class='modal-body'>";
                                            echo "<p>Are you sure you want to delete '" . htmlspecialchars($row['nama_buku']) . "'?</p>";
                                            echo "</div>";
                                            echo "<div class='modal-footer'>";
                                            echo "<form action='barang/act.php?action=delete' method='post'>";
                                            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                                            echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
                                            echo "</form>";

                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";

                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">

                    <div class="copyright">
                        2024, dibuat dengan <i class="fa fa-heart heart text-danger"></i> oleh
                        <a>Kelompok 3</a>
                    </div>
            </footer>
        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <script src="assets/js/kaiadmin.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>

        <script>
            let table = new DataTable('#MyTable');
        </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </script>
</body>

</html>