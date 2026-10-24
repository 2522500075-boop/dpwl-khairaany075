
<?php
class Model
{
    protected $db;

    public function __construct()
    {
        $configFile = __DIR__ . '/../config/database.php';

        if (!file_exists($configFile)) {
            die('File config/database.php tidak ditemukan.');
        }

        // Muat konfigurasi dalam cakupan fungsi ini
        $config = (function () use ($configFile) {
            require $configFile;

            return [
                'host' => $dbhost ?? 'localhost',
                'user' => $dbuser ?? 'root',
                'pass' => $dbpass ?? '',
                'name' => $dbname ?? '',
                'port' => $dbport ?? 3306
            ];
        })();

        if (empty($config['name'])) {
            die('Nama database belum diatur di config/database.php');
        }

        $this->db = new mysqli(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['name'],
            (int) $config['port']
        );

        if ($this->db->connect_error) {
            die('Koneksi database gagal: ' . $this->db->connect_error);
        }

        $this->db->set_charset('utf8mb4');
    }
}
