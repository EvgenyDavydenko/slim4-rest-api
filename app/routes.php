<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Get All employees
$app->get('/employees', function(Request $request, Response $response){
    $sql = "SELECT * FROM employees";

    try{
        // Get DB Object
        $db = new Db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $employees = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        $db = null;        
        $response->getBody()->write(json_encode($employees));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);

    } catch(PDOException $e){
        $error = ["text" => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

// Get One employee
$app->get('/employees/{id}', function(Request $request, Response $response, array $args){
    $id = $args['id'];
    $sql = "SELECT * FROM employees WHERE emp_no = $id";

    try{
        // Get DB Object
        $db = new Db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $employee = $stmt->fetch(PDO::FETCH_OBJ);
        
        $db = null;        
        $response->getBody()->write(json_encode($employee));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);

    } catch(PDOException $e){
        $error = ["text" => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

// Add One employee
$app->post('/employees', function(Request $request, Response $response){
    $emp_no = $request->getParam('emp_no');
    $birth_date = $request->getParam('birth_date');
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $gender = $request->getParam('gender');
    $hire_date = $request->getParam('hire_date');
    
    $sql = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES
    (:emp_no, :birth_date, :first_name, :last_name, :gender, :hire_date)";
    

    try{
        // Get DB Object
        $db = new Db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':emp_no', $emp_no);
        $stmt->bindParam(':birth_date', $birth_date);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':hire_date', $hire_date);

        $employee = $stmt->execute();

        $db = null;        
        $response->getBody()->write(json_encode($employee));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);

    } catch(PDOException $e){
        $error = ["text" => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

// Update One employee
$app->put('/employees/{id}', function(Request $request, Response $response, array $args){

    $emp_no = $args['id'];
    $birth_date = $request->getParam('birth_date');
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $gender = $request->getParam('gender');
    $hire_date = $request->getParam('hire_date');

    $sql = "UPDATE employees SET
                emp_no      = :emp_no,
                birth_date 	= :birth_date,
				first_name 	= :first_name,
				last_name 	= :last_name,
                gender		= :gender,
                hire_date	= :hire_date
			WHERE emp_no = $emp_no";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':emp_no', $emp_no);
        $stmt->bindParam(':birth_date', $birth_date);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':hire_date', $hire_date);

        $employee = $stmt->execute();

        $db = null;        
        $response->getBody()->write(json_encode($employee));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);

    } catch(PDOException $e){
        $error = ["text" => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

// Delete One employee
$app->delete('/employees/{id}', function(Request $request, Response $response, array $args){
    $id = $args['id'];
    $sql = "DELETE FROM employees WHERE emp_no = $id";

    try{
        // Get DB Object
        $db = new Db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $employee = $stmt->execute();

        $db = null;        
        $response->getBody()->write(json_encode($employee));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);

    } catch(PDOException $e){
        $error = ["text" => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});