    <?php 
    if (!class_exists('database')){
    class database {
        private static $conn;

        public static function connect() {
            if (!isset(self::$conn)) {
                try {
                    self::$conn = new PDO("mysql:host=localhost;dbname=coba", "root", "");
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
            return self::$conn;
        }
    }
    }
    ?>