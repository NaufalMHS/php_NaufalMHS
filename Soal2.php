<?php
session_start(); 
if (isset($_POST['reset'])) {
    session_destroy(); 
    header('Location: ' . $_SERVER['PHP_SELF']); 
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['nama'])) {
        $_SESSION['nama'] = $_POST['nama']; 
    }

    if (isset($_POST['umur'])) {
        $_SESSION['umur'] = $_POST['umur']; 
    }

    if (isset($_POST['hobi'])) {
        $_SESSION['hobi'] = $_POST['hobi']; 
    }
}

if (!isset($_SESSION['nama'])) {
    echo '
    <form method="post">
        <label for="nama">Nama Anda:</label>
        <input type="text" name="nama" required>
        <button type="submit">SUBMIT</button>
    </form>';
} elseif (!isset($_SESSION['umur'])) {
    echo '
    <form method="post">
        <label for="umur">Umur Anda:</label>
        <input type="number" name="umur" required>
        <button type="submit">SUBMIT</button>
    </form>';
} elseif (!isset($_SESSION['hobi'])) {
    echo '
    <form method="post">
        <label for="hobi">Hobi Anda:</label>
        <input type="text" name="hobi" required>
        <button type="submit">SUBMIT</button>
    </form>';
} else {
    echo '
    <p>Nama: ' . $_SESSION['nama'] . '</p>
    <p>Umur: ' . $_SESSION['umur'] . '</p>
    <p>Hobi: ' . $_SESSION['hobi'] . '</p>';
    echo '
    <form method="post">
        <button type="submit" name="reset">Ulangi</button>
    </form>';
}
