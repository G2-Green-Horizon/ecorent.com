<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "ecorent";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

try {
	$pdo = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}

if (!$conn) {
	die("Connection Failed. " . mysqli_connect_error());
	echo "can't connect to database";
}

function executeQuery($query)
{
	$conn = $GLOBALS['conn'];
	return mysqli_query($conn, $query);
}

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    switch ($method) {
        case 'GET':
            handleGet($pdo);
            break;
        case 'POST':
            handlePost($pdo, $input);
            break;
        case 'PUT':
            handlePut($pdo, $input);
            break;
        case 'DELETE':
            handleDelete($pdo, $input);
            break;
        default:
            http_response_code(405);
            echo json_encode(['message' => 'Invalid request method']);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Internal Server Error', 'error' => $e->getMessage()]);
}

function handleGet($pdo)
{
    try {
        $sql = "SELECT itemID, itemName, itemType, gasEmissionSaved, pricePerDay, itemSpecifications, location FROM items";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            http_response_code(404);
            echo json_encode(['message' => 'No items found']);
        } else {
            echo json_encode($result);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Database query error', 'error' => $e->getMessage()]);
    }
}

function handlePost($pdo, $input)
{
    if (!validateInput($input, ['itemName', 'itemType', 'gasEmissionSaved', 'pricePerDay', 'itemSpecifications', 'location'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid input']);
        return;
    }

    try {
        $sql = "INSERT INTO items (itemName, itemType, gasEmissionSaved, pricePerDay, itemSpecifications, location) 
        VALUES (:itemName, :itemType, :gasEmissionSaved, :pricePerDay, :itemSpecifications, :location)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'itemName' => $input['itemName'],
            'itemType' => $input['itemType'],
            'gasEmissionSaved' => $input['gasEmissionSaved'],
            'pricePerDay' => $input['pricePerDay'],    
            'itemSpecifications' => $input['itemSpecifications'],
            'location' => $input['location'],
        ]);

        http_response_code(201);
        echo json_encode(['message' => 'Item created successfully']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Database insertion error', 'error' => $e->getMessage()]);
    }
}

function handlePut($pdo, $input)
{
    if (!validateInput($input, ['itemID', 'itemName', 'itemType', 'gasEmissionSaved', 'pricePerDay', 'itemSpecifications', 'location'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid input']);
        return;
    }

    try {
        $sql = "UPDATE items SET
            itemName = :itemName,
            itemType = :itemType,
            gasEmissionSaved = :gasEmissionSaved,
            pricePerDay = :pricePerDay,    
            itemSpecifications = :itemSpecifications,
            location = :location
            WHERE itemID = :itemID";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'itemName' => $input['itemName'],
            'itemType' => $input['itemType'],
            'gasEmissionSaved' => $input['gasEmissionSaved'],
            'pricePerDay' => $input['pricePerDay'],    
            'itemSpecifications' => $input['itemSpecifications'],
            'location' => $input['location'],
            'itemID' => $input['itemID']
        ]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Item updated successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Item not found']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Database update error', 'error' => $e->getMessage()]);
    }
}

function handleDelete($pdo, $input)
{
    if (!validateInput($input, ['itemID'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid input']);
        return;
    }

    try {
        $sql = "DELETE FROM items WHERE itemID = :itemID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['itemID' => $input['itemID']]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Item deleted successfully']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Item not found']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Database deletion error', 'error' => $e->getMessage()]);
    }
}

function validateInput($input, $requiredFields)
{
    foreach ($requiredFields as $field) {
        if (empty($input[$field])) {
            return false;
        }
    }
    return true;
}

?>
