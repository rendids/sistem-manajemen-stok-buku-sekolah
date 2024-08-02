<?php
include '../config/database.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'insert':
        insert();
        break;
    case 'update':
        update();
        break;
    case 'delete':
        delete();
        break;
    default:
        echo "Invalid action";
}

function insert()
{
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
        // Sanitize inputs before using them in SQL queries
        $name = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
        $genre = intval($_POST['jenis_buku']); // Assuming genre ID is numeric
        $code = filter_var($_POST['kode'], FILTER_SANITIZE_STRING);
        $stock = intval($_POST['stok']);
        $image = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES['image']['tmp_name'];

            $imageNewName = uniqid('img_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $imageDestination = '../assets/image/' . $imageNewName;

            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $image = $imageNewName;
            } else {
                echo "Failed to move uploaded file";
                return;
            }
        }


        try {
            $stmt = $conn->prepare("INSERT INTO buku (nama_buku, jenis_buku_id, kode, stok, lokasi) VALUES (:name, :genre, :code, :stock, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':image', $image);

            if ($stmt->execute()) {
                echo "New record created successfully", "<script>window.location='../index.php'</script>";
            } else {
                echo "Error: Unable to execute the query.", "<script>window.location='../index.php'</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

function update()
{
    global $conn;
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $id = intval($_POST['id']); // Assuming you pass the ID via a form input or parameter
        $name = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
        $genre = intval($_POST['jenis_buku']);
        $code = filter_var($_POST['kode'], FILTER_SANITIZE_STRING);
        $stock = intval($_POST['stok']);
        $image = '';

        // Check if a new image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES['image']['tmp_name'];

            $stmt = $conn->prepare("SELECT lokasi FROM buku WHERE id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $imagePath = $row['lokasi'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
                echo "Record and image deleted successfully", "<script>window.location='../index.php'</script>";
            } else {
                echo "Record deleted successfully, but image file not found";
            }
            

            $imageNewName = uniqid('img_', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $imageDestination = '../assets/image/' . $imageNewName;

            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $image = $imageNewName;
            } else {
                echo "Failed to move uploaded file";
                return;
            }
        } else {
            // If no new image uploaded, retain the existing image
            try {
                $stmtImage = $conn->prepare("SELECT lokasi FROM buku WHERE id=:id");
                $stmtImage->bindParam(':id', $id);
                $stmtImage->execute();
                $row = $stmtImage->fetch(PDO::FETCH_ASSOC);
                $image = $row['lokasi'];
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return;
            }
        }

        try {
            $stmt = $conn->prepare("UPDATE buku SET nama_buku = :name, jenis_buku_id = :genre, kode = :code, stok = :stock, lokasi = :image WHERE id = :id");

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "Record updated successfully", "<script>window.location='../index.php'</script>";
            } else {
                echo "Error: Unable to execute the query.", "<script>window.location='../index.php'</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

function delete()
{
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $id = intval($_POST['id']); // Assuming you pass the ID via a form input or parameter

        try {
            // Get the image path from the database
            $stmt = $conn->prepare("SELECT lokasi FROM buku WHERE id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $imagePath = "../assets/image/".$row['lokasi'];

            // Delete the record from the database
            $deleteStmt = $conn->prepare("DELETE FROM buku WHERE id=:id");
            $deleteStmt->bindParam(':id', $id);
            if ($deleteStmt->execute()) {
                // Delete the image file from the directory
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    echo "Record and image deleted successfully", "<script>window.location='../index.php'</script>";
                } else {
                    echo "Record deleted successfully, but image file not found";
                }
            } else {
                echo "Error deleting record", "<script>window.location='../index.php'</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
