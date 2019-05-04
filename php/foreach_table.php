<?php
$data = array(
    array('nama' => 'sasmitoh' ,
            'umur' => 25 ),
    array('nama' => 'khalis',
            'umur' => 23)
    );
    foreach ($data as $biodata => $value) {
        echo  "[" .$biodata. "] " .$value['nama'] . " || ".$value['umur'] . "<br />";  
     } 
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <title>array</title>
 </head>
 <body>
        <table border="1">
                <tr>
                    <th>NAMA</th>
                    <th>Umur</th>
                </tr>
                <?php foreach ($data as $biodata => $value) :?>
                    <tr>
                        <td><?= $value['nama'];?></td>
                        <td><?= $value['umur'];?></td>
                    </tr>
                <?php endforeach; ?>
        </table>
 </body>
 </html>