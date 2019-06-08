<?php
require 'vendor/autoload.php';
require 'lib/mysql.php';

$app= new \Slim\App();

$app->get('/api/v1/employees', 'get_employee');

$app->get('/api/v1/employees/{id}', function($request, $response, $args) {
    get_employee_id($args['id']);
});

$app->post('/api/v1/employees/add', function($request, $response, $args) {
    add_employee($request->getParsedBody());
});
$app->put('/api/v1/employees/update', function($request, $response, $args) {
    update_employee($request->getParsedBody());
});
$app->delete('/api/v1/employees/delete', function($request, $response, $args) {
    delete_employee($request->getParsedBody());
});



function get_employee() {
    $db = connect_db();
    $sql = "SELECT * FROM employee ORDER BY `emp_name`";
    $exe = $db->query($sql);
    $data = $exe->fetch_all(MYSQLI_ASSOC);
    $db = null;
    echo json_encode($data);
}

function get_employee_id($employee_id) {
    $db = connect_db();
    $sql = "SELECT * FROM employee WHERE `employee_id` = '$employee_id'";
    $exe = $db->query($sql);
    $data = $exe->fetch_all(MYSQLI_ASSOC);
    $db = null;
    echo json_encode($data);
}

function add_employee($data) {
    $db = connect_db();
    $sql = "insert into employee (emp_name,emp_contact,emp_role)"
            . " VALUES('$data[emp_name]','$data[emp_contact]','$data[emp_role]')";
    $exe = $db->query($sql);
    $last_id = $db->insert_id;
    $db = null;
    if (!empty($last_id))
        echo $last_id;
    else
        echo false;
}

function update_employee($data) {
    $db = connect_db();
    $sql = "update employee SET emp_name = '$data[emp_name]',emp_contact = '$data[emp_contact]',emp_role='$data[emp_role]'"
            . " WHERE employee_id = '$data[employee_id]'";
    $exe = $db->query($sql);
    $last_id = $db->affected_rows;
    $db = null;
    if (!empty($last_id))
        echo $last_id;
    else
        echo false;
}

function delete_employee($employee) {
    $db = connect_db();
    $sql = "DELETE FROM employee WHERE employee_id = '$employee[employee_id]'";
    $exe = $db->query($sql);
    $db = null;
    if (!empty($last_id))
        echo $last_id;
    else
        echo false;
}
$app->run();

?>