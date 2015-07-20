<?php 

$adjectives = ['vivacious', 'merciful', 'secretive', 'quiet', 'callous', 'classy', 'aromatic', 'ambiguous', 'zesty', 'wise', 'grotesque', 'bumpy', 'brutal', 'fearsome', 'wonky', 'cheeky', 'light', 'soggy', 'coarse', 'shiny'];
$nouns = ['mango', 'bee', 'cloud', 'cowboy', 'football', 'shark', 'war', 'cracker', 'gazelle', 'freckle', 'teeth', 'plane', 'octagon', 'bulldozer', 'bamboo', 'turnip', 'college', 'octave', 'promotion', 'sloth'];

$randAdj = array_rand($adjectives, 1);
$randNoun = array_rand($nouns, 1);

?>

<!DOCTYPE hmtl>
<html>
<head>
    <title>Server Name Generator</title>

    <style type="text/css">
        body {
            text-align: center;
        }

        #server-name {
            margin-top: 50px;
        }

        .btn {
            margin: 50px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

</head>
<body>
    <div class = "well">
        <h1>Your Random Server Name:</h1>
    </div>

    <h2 id="server-name"><?php echo $adjectives[$randAdj] . '_' . $nouns[$randNoun] ?></h2>

    <button id="new" class="btn btn-lg">Select New</button>

    <script type="text/javascript">

        $("#new").click(function() {
            location.reload(true);
        });

    </script>

</body>
</html>