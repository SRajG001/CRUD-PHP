<?php 
    require 'connection.php';
    
    $db_conn = new DB_conn();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $sql = $db_conn->deleteData($id);
            if($sql === TRUE){
                echo json_encode(array("status"=>$sql, "message"=>"deleted!!!"));
                exit;
            } else {
                echo json_encode(array("message"=>$sql));
                exit;
            }
        } else if(isset($_POST['id'])){
            $task = $_POST['task'];
            $id = $_POST['id'];
            $sql = $db_conn->updateData($task,$id);


            if ($sql === TRUE) {
                echo json_encode(array("status"=>$sql, "message"=>"Record updated successfully"));
                exit;
            } else {
                echo json_encode(array("message"=>$sql));
                exit;
            }

        } else {
            $task = $_POST['task'];
            $status = '0';
            $sql = $db_conn->storeData($task,$status);

            if ($sql === TRUE) {
                echo json_encode(array("status"=>$sql, "message"=>"New record created successfully"));
                exit;
            } else {
                echo json_encode(array("status"=>$sql, "message"=>$db_conn->error));
                exit;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $returnData = $db_conn->fetchdata();
        $htmlTable = '<div class="table-data">';
        
        while($row = mysqli_fetch_array($returnData)){
            $htmlTable .= '<tr>
                                <th scope="row">'. $row['id'] .'</th>
                                <td>'. $row['task'] .'</td>
                                <td><button type="button" id="edit" class="btn btn-warning mr-3" data-toggle="modal"
                                data-target="#exampleModal" data-id="'.$row['id'].'" data-value="'.$row['task'].'">Edit</button><button type="button" id="delete" class="btn btn-danger" data-id="'.$row['id'].'">Delete</button></td>
                            </tr>';
        }
        
        $htmlTable .= '</div>';
        echo $htmlTable;
        exit();
    }
?>