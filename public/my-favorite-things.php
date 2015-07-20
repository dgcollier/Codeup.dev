<? 

$favThings = [
    "Puppies", 
    "College Football", 
    "Coffee", 
    "Sleep", 
    "Coding"
];

$i = 0;
?>

<!DOCTYPE hmtl>
<html>
<head>
    <title>My Favorite Things</title>

    <style type="text/css">
    
        body {
            text-align: center;
        }

        .even {
            background-color: #ECF0F1;
        }

        .odd {
            background-color: #FFFFFF;
        }

        #table {
            margin-top: 30px;
            margin: auto;
            border-style: solid;
            border-width: 10px;
            border-color:  #2c3e50;
            width: 20%;
        }

        #title {
            margin-bottom: 30px;
        }

        .thing {
            padding: 10px;
        }

        td {
            text-align: center;
        }

    </style>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<body>

    <h1 id="title">My Favorite Things</h1>

    <table id="table">
        <tbody>
            
            <? foreach ($favThings as $thing):
                $i++;

                if ($i % 2 == 0) { ?>
                    <tr class="even">
                        <td class="thing"><?= $thing ?></td>
                    </tr>
                <? } else {  ?>
                    <tr class="odd">
                        <td class="thing"><?= $thing ?></td>
                    </tr>
                <? }
            endforeach; ?>
        </tbody>
    </table>

</body>
</html>