<!DOCTYPE html>
<html>
<head>
    <title>User Detail Page</title>
</head>
<body>
    <div>
        <?php
        if (isset($_GET['user'])) {
            $user = $_GET['user'];
            $user_data = [
                'Dr. Marcus Greene' => "Holding a Ph.D. in Environmental Science from Stanford, Dr. Greene has always been a passionate advocate for eco-conscious innovations. His visionary leadership is the bedrock on which NaturaTech stands.",
                'Aisha Kwon' => "Aisha, with her background in bio-engineering, is the mastermind behind the cutting-edge technologies at NaturaTech. She believes in harnessing nature's wisdom to address modern challenges.",
                'Carlos Mendoza' => "Carlos, an alumnus of Design Academy Eindhoven, combines minimalism with bio-inspired designs, making NaturaTech's products not only functional but also aesthetically appealing.",
                "Lydia D'souza" => "Lydia's expertise lies in sustainable supply chains. She ensures that every step in NaturaTech's operations is ethical, green, and efficient.",
                'Jamal Ahmed' => 'Jamal, a former environmental studies professor from Yale, curates and oversees the rich tapestry of courses offered by EcoLearn, spreading eco-awareness across the globe.',
            ];
			
            if (isset($user_data[$user])) {
                $user_info = $user_data[$user];

                echo "<h1>$user</h1>";
                echo "<p>$user is the " . $user_info['role'] . "</p>";
                echo "<p>Bio: " . $user_info['bio'] . "</p>";

                if ($user_info['created_by_user']) {
                    echo "<button onclick=\"window.location.href='edit.php?user=$user'\">Edit</button>";
                    echo "<button onclick=\"window.location.href='delete.php?user=$user'\">Delete</button>";
                }
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

