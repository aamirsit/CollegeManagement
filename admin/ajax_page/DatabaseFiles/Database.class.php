<?php
# Small All in One Database Class By Juned Sir !!!! Practical Infotech
# Name: DatabaseConnection.class.php
# File Description: MySQL Class to allow easy and clean access to common mysql commands

class Database {
		
		var $server   = DB_SERVER; //database server
		var $user     = DB_USER; //database login name
		var $pass     = DB_PASS; //database login password
		var $database = DB_DATABASE; //database name
				
		#######################
		//internal info
		var $error = "";
		var $errno = 0;
		
		//number of rows affected by SQL query
		var $affected_rows = 0;
		
		var $link_id = 0;
		var $query_id = 0;
		
		
		#-#############################################
		# desc: constructor
		function Database($server, $user, $pass, $database){
			$this->server=$server;
			$this->user=$user;
			$this->pass=$pass;
			$this->database=$database;
		}#-#constructor()
		
		
		#-#############################################
		# desc: connect and select database using vars above
		function connect() {
			$this->link_id=@mysql_connect($this->server,$this->user,$this->pass);
		
			if (!$this->link_id) {//open failed
				$this->oops("Could not connect to server: <b>$this->server</b>.");
				}
		
			if(!@mysql_select_db($this->database, $this->link_id)) {//no database
				$this->oops("Could not open database: <b>$this->database</b>.");
				}
		
			// unset the data so it can't be dumped
			$this->server='';
			$this->user='';
			$this->pass='';
			$this->database='';
		}#-#connect()
		
		
		#-#############################################
		# desc: close the connection
		function close() {
			if(!@mysql_close($this->link_id)){
				$this->oops("Connection close failed.");
			}
		}
		
		#-#############################################
		# desc: throw an error message
		function oops($msg='') {
			if($this->link_id>0){
				$this->error=mysql_error($this->link_id);
				$this->errno=mysql_errno($this->link_id);
			}
			else{
				$this->error=mysql_error();
				$this->errno=mysql_errno();
			}
			?>
				<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
				<tr><th colspan=2>Database Error</th></tr>
				<tr><td align="right" valign="top">Message:</td><td><?php echo $msg; ?></td></tr>
				<?php if(!empty($this->error)) echo '<tr><td align="right" valign="top" nowrap>MySQL Error:</td><td>'.$this->error.'</td></tr>'; ?>
				<tr><td align="right">Date:</td><td><?php echo date("l, F j, Y \a\\t g:i:s A"); ?></td></tr>
				<?php if(!empty($_SERVER['REQUEST_URI'])) echo '<tr><td align="right">Script:</td><td><a href="'.$_SERVER['REQUEST_URI'].'">'.$_SERVER['REQUEST_URI'].'</a></td></tr>'; ?>
				<?php if(!empty($_SERVER['HTTP_REFERER'])) echo '<tr><td align="right">Referer:</td><td><a href="'.$_SERVER['HTTP_REFERER'].'">'.$_SERVER['HTTP_REFERER'].'</a></td></tr>'; ?>
				</table>
			<?php
		}
		
		#-#############################################
		# desc: Order By Query
		function order($table,$field)
		{
			$query="SELECT * FROM $table order by $field";
			return mysql_query($query);
		}
		
		#-#############################################
		# desc: Display All orderBy
		function displayall($tbl_name,$field)
		{
		$query = "SELECT * FROM $tbl_name ORDER BY $field";
		
		$q=mysql_query($query);
		return ($q);
		}
	
		#-#############################################
		# desc: Select Record By Where Condition
		function selectBy_where($columns, $table, $where_attributes)
		{
			if ($where_attributes != "")
				$where_attributes = " WHERE ".$where_attributes;
			$sql = "SELECT ".$columns." FROM ".$table." ".$where_attributes." ".$order." ".$limit;
			//echo $sql; exit;
			return mysql_query($sql);
		}
		
		#-#############################################
		# desc: Display Perticular Records
		function display($columns, $table, $where_attributes, $order_column, $is_asc_order,$limit,$startpoint)
		{
			$order = "";
			if ($order_column != "")
			{
				$order_type = "";
				if ($is_asc_order == true)
					$order_type = "ASC";
				else
					$order_type = "DESC";
				
				$order = "ORDER BY ".$order_column." ".$order_type;
			}
			
			if ($where_attributes != "")
				$where_attributes = " WHERE ".$where_attributes;
			
			if ($limit != 0)
				$limit = "LIMIT ".$startpoint.",".$limit;
			else
				$limit = "";
				$pages=0;
									
			$sql = "SELECT ".$columns." FROM ".$table." ".$where_attributes." ".$order." ".$limit;
			//echo $sql; exit;
			return mysql_query($sql);
		}
	
		#-#############################################
		# desc: Delete Query
		function delete($table, $column, $value)
		{
			//echo "DELETE FROM `".$table."` WHERE `".$column."` = '".$value."'";
			
			mysql_query("DELETE FROM `".$table."` WHERE `".$column."` = '".$value."'");
	//		exit;
		}
		
		#-#############################################
		# desc: Insert Query
		function insert($table, $column_names, $column_values)
		{
			
			
			$index = 0;
			$query  = "INSERT INTO `".$table."`( ";
			
			//Columns.
			foreach ($column_names as $name)
			{			
				$query .= "`".$name."`";
				
				$comma = "";
				if ($index != (count($column_names)-1))
					$comma = ",";
				$query .= $comma;
				
				$index++;
			}
			
			$index = 0;
			$query .= ") VALUES (";
	
			//Values.
			foreach ($column_values as $name)
			{
				
				$query .= "'".$column_values[$index]."'";
				
				$comma = "";
				if ($index != (count($column_names)-1))
					$comma = ",";
				$query .= $comma;
				
				$index++;
			}
	
			$query .= ");";
				//echo $query; exit;
				return @mysql_query($query);
		}
		
		#-#############################################
		# desc: Count Records 
		function records($table)
		{
			$result=mysql_query("SELECT COUNT(*) FROM ".$table) or die(mysql_error());
			return $result;
		}
		
		#-#############################################
		# desc: Update Query
		function Update($table, $id_column, $id_value, $column_names, $column_values)
		{
			global $query;
			$index = 0;
			$query  = "UPDATE `".$table."` SET ";
			
			foreach ($column_names as $name)
			{
				
				$query .= "`".$name."` = '".$column_values[$index]."'";
				
				$comma = "";
				if ($index != (count($column_names)-1))
					$comma = ",";
				$query .= $comma;
				
				$index++;
			}
			
			$query .= " WHERE `".$id_column."` = '".$id_value."'";
			//echo $query; exit;
			mysql_query($query);
		}
		
		#-#############################################
		# desc: Backup Table
		function backup_tables($host,$user,$pass,$name,$tables = '*')
		{
		  
		  $link = mysql_connect($host,$user,$pass);
		  mysql_select_db($name,$link);
		  
		  //get all of the tables
		  if($tables == '*')
		 {
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
			  $tables[] = $row[0];
			}
		  }
		  else
		  {
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		  }
		  
		  //cycle through
		  foreach($tables as $table)
		  {
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
			  while($row = mysql_fetch_row($result))
			  {
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
				  $row[$j] = addslashes($row[$j]);
				  $row[$j] = ereg_replace("\n","\\n",$row[$j]);
				  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
				  if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			  }
			}
			$return.="\n\n\n";
		  }
		 
		  //save file
		  $handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
		  fwrite($handle,$return);
		  fclose($handle);
		}

    //Backup Database
function backup_table($tables = '*')
		{
		  $return="";
		/*  $link = mysql_connect($host,$user,$pass);
		  mysql_select_db($name,$link);*/
		  
		  //get all of the tables
		  if($tables == '*')
		 {
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
			  $tables[] = $row[0];
			}
		  }
		  else
		  {
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		  }
		  
		  //cycle through
		  foreach($tables as $table)
		  {
			  $tbl=$table;
			  
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$tbl));
			$return.= "\n\n".$row2[1].";\n\n";
		
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
			  while($row = mysql_fetch_row($result))
			  {
				$return.= 'INSERT INTO '.$tbl.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
				  $row[$j] = addslashes($row[$j]);
				  $row[$j] = ereg_replace("\n","\\n",$row[$j]);
				  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
				  if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			  }
			}
			$return.="\n\n\n";
		  }
		 
		  //save file
		  $filename='db-backup-'.date("d-m-Y-His").'.sql';
		  $handle = fopen("backup/".$filename,'w+');
		  fwrite($handle,$return);
		  fclose($handle);
		 
		return $filename;
		  
		}
}

?>