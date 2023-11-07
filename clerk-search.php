<?php

require_once('database.php');

$cust = $_POST['value'];

$sql = "SELECT emp_id, fname, lname, address, phone, email, reg_date
        FROM employee
		WHERE type = 'clerk'
		AND fname LIKE '$cust'
       ";
$result = dbQuery($sql);




echo '<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
									
                                    
                                        while($data = dbFetchAssoc($result))
                                        {
                                          extract($data); 
                                      
            echo '<tr onMouseOver="this.bgColor= \' #EDEDED \';" onMouseOut="this.bgColor= \'#FFFFFF \';" bgcolor="#FFFFFF">';
                                            
									echo '<td>'. $fname . ' ' . $lname . '</td>
                                            <td>' .  $address . '</td>
                                            <td>' . $phone . '</td>
                                            <td>' . $email . '</td>
                                            <td> <a href="edit-employee.php?eid=' .$emp_id . '">
                                                <img src="images/edit_icon.gif" border="0" height="20" width="20"></a>
                                            </td>
                                             <td><a href="process.php?eid=' . $emp_id . ' &amp;action=delete-emp" onClick="return are_u_sure();">delete</a>
                                            </td>
                                        </tr>';
                                        
                                          }//while
                                       

                                  echo '  </tbody>';