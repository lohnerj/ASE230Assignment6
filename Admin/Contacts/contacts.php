<?php
include 'db.php'; 

function getAllContactRequests() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM contact_requests");
        $contactRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $contactRequests;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

function getContactRequestById($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM contact_requests WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $contactRequest = $stmt->fetch(PDO::FETCH_ASSOC);
        return $contactRequest;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function createContactRequest($name, $email, $subject, $message) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("INSERT INTO contact_requests (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->execute();

        return $pdo->lastInsertId(); 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateContactRequest($id, $name, $email, $subject, $message) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("UPDATE contact_requests SET name = :name, email = :email, subject = :subject, message = :message WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function deleteContactRequest($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("DELETE FROM contact_requests WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
