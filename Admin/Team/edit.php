<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <div>
        <?php
        if (isset($_GET['user'])) {
            $user = $_GET['user'];
            $user_data = [
                'Dr. Marcus Greene' => 'Dr. Marcus Greene\nFounder & CEO\nHolding a Ph.D. in Environmental Science from Stanford, Dr. Greene has always been a passionate advocate for eco-conscious innovations. His visionary leadership is the bedrock on which NaturaTech stands.',
                'Aisha Kwon' => 'Aisha Kwon\nCTO\nAisha, with her background in bio-engineering, is the mastermind behind the cutting-edge technologies at NaturaTech. She believes in harnessing nature\'s wisdom to address modern challenges.',
                'Carlos Mendoza' => 'Carlos Mendoza\nChief of Design\nCarlos, an alumnus of Design Academy Eindhoven, combines minimalism with bio-inspired designs, making NaturaTech\'s products not only functional but also aesthetically appealing.',
                "Lydia D'souza" => "Lydia D'souza\nVP of Operations\nLydia's expertise lies in sustainable supply chains. She ensures that every step in NaturaTech's operations is ethical, green, and efficient.",
                'Jamal Ahmed' => 'Jamal Ahmed\nHead of EcoLearn Hub\nJamal, a former environmental studies professor from Yale, curates and oversees the rich tapestry of courses offered by EcoLearn, spreading eco-awareness across the globe.',
            ];

            if (isset($user_data[$user])) {
                $user_info = $user_data[$user];

                $lines = explode("\n", $user_info);

                echo "<h1>Edit User: $user</h1>";
                echo "<form action=\"save_changes.php\" method=\"post\">";
                echo "<textarea name=\"new_info\" rows=\"10\" cols=\"50\">";
                foreach ($lines as $line) {
                    echo $line . "\n";
                }
                echo "</textarea>";
                echo "<input type=\"hidden\" name=\"user\" value=\"$user\">";
                echo "<input type=\"submit\" value=\"Save Changes\">";
                echo "</form>";
            } else {
                echo "<p>User not found.</p>";
            }
        } else {
            echo "<p>User not specified.</p>";
        }
        ?>
    </div>
</body>
</html>
