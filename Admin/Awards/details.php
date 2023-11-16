<!DOCTYPE html>
<html>
    <head>
        <title>Award Details</title>
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

                    echo "<h1>$year</h1>";
                    echo "<h2>$achievement by $company</h2>";
                    echo "<p>$description</p>";

                    if ($award_info['created_by_user']) {
                        echo "<button onclick=\"window.location.href='edit.php?user=$award'\">Edit</button>";
                        echo "<button onclick=\"window.location.href='delete.php?user=$award'\">Delete</button>";
                    }
                } else {
                    echo "<p>Award Not Found</p>";
                }
            } else {
                echo "<p>Award Not Specified</p>";
            }
            ?>
        </div>
    </body>
</html>