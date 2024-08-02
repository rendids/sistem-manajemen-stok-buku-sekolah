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
        $nama_jenis_buku = filter_var($_POST['nama_jenis_buku'], FILTER_SANITIZE_STRING);
        $deskripsi = filter_var($_POST['deskripsi'], FILTER_SANITIZE_STRING);

        try {
            $query = "INSERT INTO jenis_buku SET nama_jenis_buku = :nama_jenis_buku, deskripsi = :deskripsi";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nama_jenis_buku', $nama_jenis_buku);
            $stmt->bindParam(':deskripsi', $deskripsi);

            if ($stmt->execute()) {
                echo "New record created successfully", "<script>window.location='../jenis.php'</script>";
            } else {
                echo "Error: Unable to execute the query.", "<script>window.location='../jenis.php'</script>";
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
        $id = intval($_POST['id']);
        $nama_jenis_buku = filter_var($_POST['nama_jenis_buku'], FILTER_SANITIZE_STRING);
        $deskripsi = filter_var($_POST['deskripsi'], FILTER_SANITIZE_STRING);

        try {
            $query = "UPDATE jenis_buku SET nama_jenis_buku = :nama_jenis_buku, deskripsi = :deskripsi WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nama_jenis_buku', $nama_jenis_buku);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "Record updated successfully", "<script>window.location='../jenis.php'</script>";
            } else {
                echo "Error: Unable to execute the query.", "<script>window.location='../jenis.php'</script>";
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
        $id = intval($_POST['id']);
    
        try {
            // Prepare the delete query
            $query = "DELETE FROM jenis_buku WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
    
            // Execute the query
            if ($stmt->execute()) {
                echo "Record deleted successfully", "<script>window.location='../jenis.php'</script>";
            } else {
                echo "Error deleting record", "<script>window.location='../jenis.php'</script>";
            }
        } catch (PDOException $e) {
            // Handle specific PDO exception
            if ($e->getCode() === '23000') {
                // Foreign key constraint violation
                echo "Error: Cannot delete this record as it is referenced by other records.", "<script>window.location='../jenis.php'</script>";
            } else {
                // Other PDO exceptions
                echo "Error: " . $e->getMessage(), "<script>window.location='../jenis.php'</script>";
            }
        }
    }
}
?>
