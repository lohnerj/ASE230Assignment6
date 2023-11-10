!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Award</title>
    </head>
    <body>
        <div>
            <?php 
            $awardArray = array(
                array("2022", "Green Innovator of the Year", "Eco Warrior Digest", "GreenRoof installations have increased urban green spaces by 150% in 2021 in cities like Seattle and Austin."),
                array("2021", "Partnership with Unicef", "Unicef", "Partnered with Unicef to implement PureStream Filters™ in areas suffering from water scarcity."),
                array("2020", "Adoption of TerraCharge™ Pathways by 20 Major City Parks", "TerraCharge™", "TerraCharge™ pathways have been adopted by 20 major city parks globally, reducing their carbon footprint."),
            );
            if (isset($_GET['award'])){
                $identifier = $_GET['award'];
                $year = $awardArray[$identifier][0];
                $achievement = $awardArray[$identifier][1];
                $company = $awardArray[$identifier][2];
                $description = $awardArray[$identifier][3];

                if (isset($awardArray['award'])) {
                    $award_info = $awardArray['award'];
                    $lines = explode("\n", 'award');

                    echo "<h1>Edit Award: $award</h1>";
                    echo "<form action=\"save_changes.php\" method=\"post\">";
                    echo "<textarea name=\"new_info\" rows = \"10\" cols=\"50\">";

                    foreach ($lines as $line) {
                        echo $line . "\n";
                    }
                    echo "</textarea>";
                    echo "<input type=\"hidden\" name=\"award\" value=\"$award\">";
                    echo "<input type=\"submit\" value=\"Save Changes\">";
                    echo "</form>";
                } else {
                    echo "<p>Award not Found</p>";
                }
            } else {
                echo "<p>Award not Specified</p>";
            }
            ?>
        </div>
    </body>
</html>