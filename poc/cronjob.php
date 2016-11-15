<?php  
// Location to the MS Access DB file
$dbMSAccess = 'D:\xampp\htdocs\attendance\db_bkp\unis_bkp_200616.mdb';
$dbMysql = "attendance";
if(!file_exists($dbMSAccess)){
   die('<br>Error finding access database');
}                                             
// Connection to MSAaccess
 $connAccess = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=".$dbMSAccess.";Uid=; Pwd=;");
/* Connect to an ODBC database using driver invocation */    
//$conn2 = new PDO('mysql:host=192.168.100.11;dbname='.$dbMysql, 'sagarsoft', 'sagarsoft@123');

// Connection to MySql
 $connMySql = new mysqli("192.168.100.11",'sagarsoft', 'sagarsoft@123', $dbMysql);

 if ($connMySql->connect_error) {
    die("<br>Connection failed: " . $connMySql->connect_error);
 }  

try{
     // ---------------- get Cronjob status ---------------------------------------------
     $sqlSelectCronStatus = "SELECT cronjob_status FROM tbl_cronjob_status WHERE  id = 1";      
     if(!$cronStatusResult = $connMySql->query($sqlSelectCronStatus)){
        die('<br>There was an error running the Cronstatus query [' . $connMySql->error . ']');
     }
    
     $cronStatusData = $cronStatusResult->fetch_assoc();
     $cron_status =   $cronStatusData['cronjob_status'];
     if($cron_status == 'running') {           
        echo "<br>CronJob is already running";
        exit;
     } 
     //--------------- Max Rowid from tEnter table in Access DB --------------                                                  
     $sqlMaxRowid = "SELECT TOP 1 Rowid FROM tEnter ORDER BY Rowid DESC ";       
     $result = $connAccess->query($sqlMaxRowid);
     $rowData = $result->fetchAll(PDO::FETCH_ASSOC);
     //var_dump($rowData);
     //echo   $rowData[0]['Rowid'];
     //$lastRowId =   '1787225';
      $maxRowId =  $rowData[0]['Rowid'];                                       
     
      //--------------- Max Rowid from tUser table in Access DB --------------      
     $sqlMaxRowEmpid = "SELECT TOP 1 Rowid FROM tUser ORDER BY Rowid DESC ";
       
     $result = $connAccess->query($sqlMaxRowEmpid);
     $rowData = $result->fetchAll(PDO::FETCH_ASSOC);
     //var_dump($rowData);
     echo   " EMP Row ID ".$rowData[0]['Rowid'];
     //$lastRowId =   '1787225';
     $maxEmpRowId =  $rowData[0]['Rowid'];         
    
     //------------------- get Last Rowid of 'tbl_access_history' and 'tbl_employee' tables ----   
     $sqlSelect = "SELECT last_rowid,last_emp_rowid  FROM tbl_cronjob_status WHERE  id = 1";      
     if(!$rowidResult = $connMySql->query($sqlSelect)){
        die('<br>There was an error running the query [' . $connMySql->error . ']');
     }      
     $rowidData = $rowidResult->fetch_assoc();
     
     //var_dump($rowidData);
    // echo  $rowidData['last_rowid'];
     $last_rowid =   $rowidData['last_rowid'];
     $last_emp_rowid =   $rowidData['last_emp_rowid'];
    
    
    $isEmpRecordExists = false;
    // ------------------- Update new records in employee table if found  -----------------
    if($last_emp_rowid == $maxEmpRowId ) {
        echo "<br>No new records found in tUser table!";
    } else {
          $isEmpRecordsExists = true;
          // ------------- Update Cronjob status to 'running' ------------------
          $sqlUpdateCronStatus1 = "UPDATE tbl_cronjob_status SET cronjob_status = 'running'"; 
          if ($connMySql->query($sqlUpdateCronStatus1) === TRUE) {
            echo "<br>Cron status Record updated to Running successfully";
          } else {
            echo "<br>Error updating Cron status record to Running: " . $connMySql->error;
          }   
    
           echo "<br>new records found in tUser table!";         
           // ----------------- get new records from tUser table ------------------------------
           $sqlUsers = "SELECT L_ID,C_Name,C_Unique,L_Type,C_RegDate,L_AccessType,Rowid FROM tUser WHERE Rowid > ".$last_emp_rowid." AND Rowid <= ".$maxEmpRowId;
           echo "<br>query --> ".$sqlUsers."<br>";
           $resultUsers = $connAccess->query($sqlUsers);
           //echo " after ";
           $rowUsers = $resultUsers->fetchAll(PDO::FETCH_ASSOC);
                
         //  var_dump($rowUsers);
           //-------------------------Insert New Records in Employee table ---------------------------------  
           $sqlInsertEmp = "insert into tbl_employee_temp(emp_id,emp_name,sex,card_reg_date,company_id,dept_id,group_id,shift_code,is_active,created,modified)	values";
           $lastRowUser = end($rowUsers);  
           foreach( $rowUsers as $val) {        
        
              if($val['Rowid'] != $lastRowUser['Rowid']) {
                $sqlInsertEmp .= "('".$val['L_ID']."','".$val['C_Name']."','M','".$val['C_RegDate']."',1,21,3,7,1,'".$val['C_RegDate']."','".$val['C_RegDate']."'),";
               } else {    
                 $sqlInsertEmp .= "('".$val['L_ID']."','".$val['C_Name']."','M','".$val['C_RegDate']."',1,21,3,7,1,'".$val['C_RegDate']."','".$val['C_RegDate']."')";
              }         
           }
          // echo " sqlInsertEmp --> ".$sqlInsertEmp;
           if ($connMySql->multi_query($sqlInsertEmp) === TRUE) {
              echo "<br>New records for employee  created successfully";
           } else {
              echo "<br>Error: " . $sqlInsertEmp . "<br>" . $connMySql->error;
           }
           //-------------------------Insert New Record Employee History table ---------------------------------  
           $sqlInsertEmpHistory = "insert into tbl_employee_history_temp(emp_id,dept_id,group_id,shift_code,shift_from,created)	values";
         //  $lastRowUser = end($rowUsers);  
           foreach( $rowUsers as $val) {        
        
              if($val['Rowid'] != $lastRowUser['Rowid']) {
                $sqlInsertEmpHistory .= "('".$val['L_ID']."',21,3,7,'".$val['C_RegDate']."','".$val['C_RegDate']."'),";
               } else {    
                 $sqlInsertEmpHistory .= "('".$val['L_ID']."',21,3,7,'".$val['C_RegDate']."','".$val['C_RegDate']."')";
              }         
           }
          // echo " sqlInsertEmpHistory --> ".$sqlInsertEmpHistory;
           if ($connMySql->multi_query($sqlInsertEmpHistory) === TRUE) {
              echo "<br>New records for employee History created successfully";
           } else {
              echo "<br>Error: " . $sqlInsertEmpHistory . "<br>" . $connMySql->error;
           }     
        //-------------------------------------------------------------------------
        //exit;
     }
    $isEntryRecordsExists = false;
    
    if($last_rowid == $maxRowId ) {
        echo "<br>No new records found in tEnter table!";
        $sqlUpdateCronStatus = "UPDATE tbl_cronjob_status SET cronjob_status = 'stopped', last_rowid = ".$maxRowId." WHERE  id = 1"; 
        if ($connMySql->query($sqlUpdateCronStatus) === TRUE) {
          echo "<br>Cron status Record updated to stopped successfully";
        } else {
          echo "<br>Error updating Cron status record to stopped: " . $connMySql->error;
        } 
      
        //exit;
     } else {
          echo "<br>new records found in tEnter table!";
          $isEntryRecordsExists = true;
          
          if(!$isEmpRecordsExists) {
            $sqlUpdateCronStatus1 = "UPDATE tbl_cronjob_status SET cronjob_status = 'running'"; 
            if ($connMySql->query($sqlUpdateCronStatus1) === TRUE) {
              echo "<br>Cron status Record updated to Running successfully";
            } else {
              echo "<br>Error updating Cron status record to Running: " . $connMySql->error;
            }       
          }
     }  
     echo "<br>isEntryRecordsExists?  ".$isEntryRecordsExists;
     if($isEntryRecordsExists) {
           // ---------------- tEnter table new records ----------------------  
           // Rowid 1787210 - 1787225
           $sql = "SELECT * FROM tEnter WHERE Rowid > ".$last_rowid." AND Rowid <= ".$maxRowId;
           echo "<br>query --> ".$sql."<br>";
           $result = $connAccess->query($sql);
           //echo " after ";
           $row = $result->fetchAll(PDO::FETCH_ASSOC);
           //echo " fetch records";         
           //var_dump($row);           
           
           $sqlTruncate = "TRUNCATE tmp_entry";
           if ($connMySql->query($sqlTruncate) === TRUE) {
              echo "<br>tmp_entry table truncated successfully";
            } else {
              echo "<br>Error while truncating table tmp_entry: " . $connMySql->error;
            }
           
           $sqlInsert = "insert into tmp_entry(UserID,EventDate,EventTime, EventPlace, EventDesc,RowNumber)	values";
           //var_dump(end($row));
           $lastRow = end($row);
           foreach( $row as $val) {           
          
              if($val['Rowid'] != $lastRow['Rowid']) {
                $sqlInsert .= "('".$val['L_UID']."','".$val['C_Date']."','".$val['C_Time']."','".$val['L_TID']."','".$val['L_Result']."','".$val['Rowid']."'),";
               } else {    
                 $sqlInsert .= "('".$val['L_UID']."','".$val['C_Date']."','".$val['C_Time']."','".$val['L_TID']."','".$val['L_Result']."','".$val['Rowid']."')";
              }         
           }                                                                                                                                      
          
           if ($connMySql->multi_query($sqlInsert) === TRUE) {
              echo "<br>New records created successfully";
           } else {
              echo "<br>Error: " . $sqlInsert . "<br>" . $connMySql->error;
           } 
           
            $sqlUpdate = "UPDATE tmp_entry h LEFT JOIN tbl_employee e ON e.emp_id = h.UserId SET h.dept_id = e.dept_id,h.group_id	= e.group_id"; 
            if ($connMySql->query($sqlUpdate) === TRUE) {
              echo "<br>Record updated successfully";
            } else {
              echo "<br>Error updating record: " . $connMySql->error;
            }
            $sqlInsert2 = "INSERT INTO tbl_access_history (emp_id,dept_id,group_id, access_date, access_time, terminal_id, created)";
            $sqlInsert2 .= " SELECT UserId,dept_id,group_id, DATE(EventDate),TIME(EventTime), EventPlace,CONCAT(DATE(EventDate),' ',TIME(EventTime)) FROM tmp_entry";  
           
            if ($connMySql->query($sqlInsert2) === TRUE) {
              echo "<br>Record Inserted successfully";
            } else {
              echo "<br>Error while Inserting records: " . $connMySql->error;
            } 
      }
      
      $sqlUpdateCronStatus = "UPDATE tbl_cronjob_status SET cronjob_status = 'stopped', last_rowid = ".$maxRowId." WHERE  id = 1"; 
      if ($connMySql->query($sqlUpdateCronStatus) === TRUE) {
        echo "<br>Cron status Record updated to stopped successfully";
      } else {
        echo "<br>Error updating Cron status record to stopped: " . $connMySql->error;
      }       

}catch(PDOExepction $e){ 
  echo $e->getMessage();
} catch (Exception $e) { 
  echo $e->getMessage();
}

?>
