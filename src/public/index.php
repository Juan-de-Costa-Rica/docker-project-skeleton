Hello worlds!

<? 
echo '<pre>';

// Test PHP
echo "PHP working\n";

// Test composer packages working
// require_once '/app/vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable('/app');
// $dotenv->load();
// if(isset($_ENV['TEST'])){
//     echo "Composer and ENV vars working\n";
// }

// Test redis
try {
    $redis = new Redis();

    if (!$redis->connect('redis', 6379)) {
        throw new \Exception('Redis failed to connect');
    }
    echo 'Redis working';
} catch (\Exception $e) {
    echo '* Redis Exception * '.$e->getMessage();
}
echo "\n";





// Test MySQL
$dbname = 'DB_DATABASE';
$dbuser = 'DB_USERNAME';
$dbpass = 'DB_PASSWORD';
$dbhost = 'database';

$dsn = 'mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8mb4';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $dbuser, $dbpass, $options);
$stmt = $pdo->prepare('SELECT 1');

if($stmt->execute()){
    echo "MySQL is working\n";
}



