<?
session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

$db = new PDO("mysql:host=localhost;dbname=chatbox", "root", "root");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare("SELECT * FROM messages WHERE (pseudo_sender=:sender AND pseudo_receiver=:receiver) OR (pseudo_sender=:sender2 AND pseudo_receiver=:receiver2) ORDER BY date");

$query->bindParam(':sender', $_POST['sender']);
$query->bindParam(':sender2', $_POST['receiver']);
$query->bindParam(':receiver', $_POST['receiver']);
$query->bindParam(':receiver2', $_POST['sender']);

$query->execute();

$resultJSON = json_encode($query->fetchAll(PDO::FETCH_ASSOC));
echo $resultJSON;
?>