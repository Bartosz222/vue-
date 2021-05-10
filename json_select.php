<?php
include "connect.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
$nazwiska = [];
if ($sql = $conn->prepare( "SELECT imiona_nazwisko,id FROM swiadectwa_uczniowie"))
{
        $sql->execute(); //wykonaj SQL
        $sql->bind_result($nazwisko,$id);
        while ($sql->fetch())
          array_push($nazwiska, (object)[
            'id' => $id,
            'imiona_nazwisko' => $nazwisko,
          ]);
        $sql->close();
}
$conn->close();
echo json_encode($nazwiska, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);