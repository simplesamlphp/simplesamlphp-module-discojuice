<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Select Your Login Provider</title>

    <!-- JQuery hosted by Google -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>

    <!-- DiscoJuice hosted by UNINETT at discojuice.org -->
    <script type="text/javascript" src="https://engine.discojuice.org/discojuice-stable.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://static.discojuice.org/css/discojuice.css" />

    <link rel="stylesheet" type="text/css" href="' . SimpleSAML\Module::getModuleURL("discojuice/assets/css/discojuice.css") . '" />

    <script type="text/javascript">

<?php

    echo '
        $("document").ready(function() {
            var djc = DiscoJuice.Hosted.getConfig(' .
                json_encode($this->data['hostedConfig'][0]) . "," .
                json_encode($this->data['hostedConfig'][1]) . "," .
                json_encode($this->data['hostedConfig'][2]) . "," .
                json_encode($this->data['hostedConfig'][3]) . "," .
                json_encode($this->data['hostedConfig'][4]) .
            ');';

    if (!$this->data['enableCentralStorage']) {
        echo "    delete djc.disco;\n";
    }
    if (!empty($this->data['additionalFeeds'])) {
        foreach ($this->data['additionalFeeds'] as $feed) {
            echo "    djc.metadata.push(" . json_encode($feed) . ");\n";
        }
    }

    echo "    djc.always = true;\n";

    echo '
            $("a.signin").DiscoJuice(djc);
        });
    ';

?>



    </script>
</head>
<body>

    <p id="signin"><a class="signin" href="/">signin</a></p>

</body>
</html>


