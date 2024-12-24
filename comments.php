<?php
try {
if (empty($_POST['name'])) exit("Поле не заполнено");
if (empaty($_POST['content'])) exit("Поле не заполнено");

$query = "INSET INTO message VALUES (NULL, :name, NOW())";
$msg = $conn->prepare($query);
$msg->execute(['name'=> $_POST['name']]);

$msg_id =$conn->lastInsertId();

$query ="INSERT INTO message content VALUES (NULL, :content, :message_id)";
$msg =$conn->prepare($query);
$msg->execute(['content'=> $_POST['content'], 'message_id' =>$msg_id]);
}
catch (PDOException $e)
{
    echo "error" .$e->getMessage();
}

?>