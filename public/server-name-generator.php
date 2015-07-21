<?
function pageController ()
{
    $data = [];
    $data['adjectives'] = [
        'aggressive', 
        'agile', 
        'alert', 
        'animated', 
        'bold', 
        'brave', 
        'daring', 
        'determined', 
        'dynamic', 
        'grotesque', 
        'eager', 
        'brutal', 
        'fearsome', 
        'wonky', 
        'cheeky', 
        'nimble', 
        'intense', 
        'quick', 
        'shiny',
        'nervous',
        'electrifying',
        'thrilling',
        'victorious',
        'confident',
        'competitive',
        'unproven',
        'young',
        'shaky',
        'flawless',
        'exciting',
        'physical',
        'tough'
    ];

    $data['nouns'] = [
        'Longhorn', 
        'Sooner', 
        'Horned_Frog', 
        'Cowboy', 
        'Bear', 
        'Red_Raider', 
        'Cougar', 
        'Mustang', 
        'Wildcat', 
        'Jayhawk', 
        'Cyclone', 
        'Tide',
        'Mountaineer', 
        'Gator', 
        'Tiger', 
        'Volunteer', 
        'Bulldog', 
        'Razorback', 
        'Commodore',
        'Rebel',
        'Hawkeye',
        'Buckeye',
        'Cornhusker',
        'Spartan',
        'Lion',
        'Turtle',
        'Badger',
        'Knight',
        'Wolverine',
        'Gopher',
        'Husky',
        'Devil',
        'Trojan',
        'Buffalo',
        'Duck',
        'Beaver',
        'Cardinal',
        'Bronco'
    ];

    $data['randAdj'] = array_rand($data['adjectives'], 1);
    $data['randNoun'] = array_rand($data['nouns'], 1);

    return $data;
}

extract(pageController());
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
            text-shadow: 3px 5px #ECF0F1;
        }

        .btn {
            margin: 50px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>

</head>
<body>
    <div class = "well">
        <h1>Your Random Server Name:</h1>
    </div>

    <h2 id="server-name"><?= $adjectives[$randAdj] . '_' . $nouns[$randNoun]; ?></h2>

    <button id="new" class="btn btn-lg">Select New</button>

    <script type="text/javascript">

        $("#new").click(function() {
            location.reload(true);
        });

    </script>

</body>
</html>