<?php
/**
 * Praktikum 5 — Percobaan 1: Pengujian Koneksi PDO MySQL
 * File: test_koneksi.php
 */
try {
    $this->conn = new PDO($dsn, $this->username, $this->password, $options);
} catch (PDOException $e) {
    throw new PDOException("Koneksi ke basis data gagal: " . $e->getMessage(), (int)$e->getCode());
}

require_once __DIR__ . '/config/database.php';

try {
    $db = new Database();
    $pdo = $db->getConnection();
    echo "\n[SUKSES] Koneksi ke basis data MySQL (db_mahasiswa) berhasil terjalin!\n";
    
    // Periksa tabel
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM mahasiswa");
    $row = $stmt->fetch();
    echo "[INFO] Jumlah record mahasiswa saat ini: " . $row['total'] . " record.\n\n";
} catch (PDOException $e) {
    echo "\n[GAGAL] " . $e->getMessage() . "\n\n";
}
