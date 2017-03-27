<?
session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

$db = new PDO("mysql:host=localhost;dbname=chatbox", "root", "root");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare("INSERT INTO messages (pseudo_sender, pseudo_receiver, content, date, deleted) VALUES  (:pseudo_sender, :pseudo_receiver, :content, :date, 0)");

$time = time();

$query->bindParam(':pseudo_sender', $_POST['sender']);
$query->bindParam(':pseudo_receiver', $_POST['receiver']);
$query->bindParam(':content', $_POST['content']);
$query->bindParam(':date', $time); 

echo "<br/>set<br/>";
$query->execute();
?>