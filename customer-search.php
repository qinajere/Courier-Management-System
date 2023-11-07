<?php

require_once('database.php');

$cust = $_POST['value'];

$sql = "SELECT customer_id, customer_name, address, post, phone, email
        FROM reg_customer
		WHERE customer_name LIKE '%$cust%'
		
       ";
$result = dbQuery($sql);


echo '<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Physical Address</th>
                                            <th>Post Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Statement</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
									
                                    
                                        while($data = dbFetchAssoc($result))
                                        {
                                          extract($data); 
                                      
                                       echo ' <tr style="cursor:pointer" onMouseOver="this.bgColor= \'#EDEDED \';" onMouseOut="this.bgColor= \' #FFFFFF \';" bgcolor="#FFFFFF" onDblClick=" window.open(\'customer_statements.php?cid= '.  $customer_id . '; ?>\', \'_blank\')">';
                                            echo '<td>'.$customer_name . '</td>
                                            <td>'.  $address .'</td>
                                            <td>'. $post . '</td>
                                            <td>'. $phone . '</td>
                                            <td>'.$email. '</td>
                                            <td><a href="edit-customer.php?cid=' . $customer_id .'">
                                                <img src="images/edit_icon.gif" border="0" height="20" width="20"></a>
                                            </td>
                                             <td><a style="color:red" href="process.php?cid= ' . $customer_id . '&amp;action=delete-cust" onClick="return sure();">delete</a>
                                            </td>
                                            <td><span style="color:blue" onClick =" window.open(\'customer-state.php?cid= '. $customer_id . ' \', \'_blank \')"> view</span>
                                            </td>
                                        </tr> ';
                                        
                                          }//while
                                       

                             echo ' </tbody>
                                </table>';


?>