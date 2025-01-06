<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// Ambil data dari formulir
$username = htmlspecialchars($_POST['username']);
$nomer = htmlspecialchars($_POST['nomer']);
$email = htmlspecialchars($_POST['email']);
$pesan = htmlspecialchars($_POST['pesan']);

// Buat instance PHPMailer
$mail = new PHPMailer(true);

try {                       
    // Konfigurasi SMTP
    $mail->SMTPDebug = 0; // Ganti ke 2 jika debugging diperlukan
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'akunmicrosoftzero@gmail.com'; // Ganti dengan email Anda
    $mail->Password   = 'oeqw bjah vimu imgc';         // Ganti dengan password email Anda
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Pengaturan email
    $mail->setFrom('akunmicrosoftzero@gmail.com', 'Nikk'); // Ganti dengan nama pengirim
    $mail->addAddress('nikocahyapramudya@gmail.com'); // Email tujuan selalu tetap

    // Isi email
    $mail->isHTML(true);
    $mail->Subject = "Pendaftaran Baru dari Website";
    $mail->Body    = "
        <h3>Data Pendaftaran:</h3>
        <p><b>Nama:</b> $username</p>
        <p><b>Nomor Telepon:</b> $nomer</p>
        <p><b>Email:</b> $email</p>
        <p><b>Pesan:</b><br>$pesan</p>
    ";

    // Kirim email
    $mail->send();
    header("Location: index.php?alert=berhasil");
    exit();

} catch (Exception $e) {
    header("Location: index.php?alert=gagal");
    exit();
}
