<?php
 
 
 class users{

	 public function _login( $username , $password )
	 {
		$con =$this->_connection();
		 $username = mysqli_real_escape_string($con , $username);
		 $password = mysqli_real_escape_string($con , $password);
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "select * from `users` where `username` = '$username' and `passcode` = '". md5($password)."';";
			//// echo $sql;
			$result = mysqli_query( $con , $sql );
			//// echo mysqli_num_rows($result);
			if( mysqli_num_rows($result) )
			{
				$row = mysqli_fetch_assoc( $result);
				$_SESSION['name'] = $row['name'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['user_id'] = $row['user_id'];
				header( 'location: index.php' );
			}
			else
			{
				// login failed
				// echo "login unsuccessful, please try again.";
			}
		}
		mysqli_close( $con );
	 }
	 
	 // create a connection for DB
	 function _connection()
	 {
		 $con = mysqli_connect( "localhost" , "root" , "" , "odnoosbussiness2");
		 if (mysqli_connect_errno()) {
			// echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 return $con;
	 }



	 // insert data to stuffstuff table in db
	 function _insertTostuff( $stuff_name  , $guild_id )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");

			$sql = "insert into `stuff` values( NULL , $guild_id , '". $stuff_name ."' ,  '". $stuff_name ."' )";
			//// echo $sql;
			if(  mysqli_query( $con , $sql ) )
			{
				// echo " insert to stuff ";
			}
			else{
				// echo "insert to stuff not successful";
			}
		}

        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;

	 }


	 ///////////////////////////////////////////////////

	  // insert data to guild table in db
	 function _insertToguild( $guild_name )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "insert into `guild` values( NULL , '". $guild_name ."' ,  '". $guild_name ."' )";
			//// echo $sql;
			if(  mysqli_query( $con , $sql ) )
			{
				// echo " insert to guild ";
			}
			else{
				 //echo "insert to guild not successful";
			}
			//// echo mysqli_num_rows($result);
		}

        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;


	 }
	 // Load from stuff table in db , By Id of guild ,
	 function _loadFromguild( $guild_id )
	 {
		 $con =$this->_connection();
		 $result = null;
		 if( $con )
		 {

			 mysqli_query($con , "set names 'utf8'");

			 $sql = "select * from  `stuff` where `statf_id` = $guild_id ";
			 //// echo $sql;
			 if(  $result = mysqli_query( $con , $sql ) )
			 {
				 // echo " insert to stuff ";
			 }
			 else{
				 // echo "insert to stuff not successful";
			 }
		 }

		 mysqli_close( $con );
		 return $result;

	 }
	 ///////////////////////////////////////////////////

	  // insert data to state table in db
	 function _insertToState( $state_name )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "insert into `state` values( NULL , '". $state_name ."' ,  '". $state_name ."' )";
			//// echo $sql;
			if(  mysqli_query( $con , $sql ) )
			{
				// echo " insert to state ";
			}
			else{
				 // echo "insert to state not successful";
			}
			//// // echo mysqli_num_rows($result);
		}

        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;

	 }

	  // insert data to city table in db
	 function _insertToCity( $city_name  , $state_id )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "INSERT INTO `city` (`city_id`, `state_id`, `city_name`, `city_desc`) values ( NULL ,$state_id, '". $city_name ."' ,  '". $city_name ."' )";

			if(  mysqli_query( $con , $sql ) )
			{
				 //echo " insert to city ";
			}
			else{
				 //echo "insert to city not successful";
			}
			//// echo mysqli_num_rows($result);
		}


        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;

	 }

	 	  // insert data to reagion table in db
	 function _insertToReagion( $reagion_name , $city_id )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "insert into `reagion` values( NULL , $city_id , '". $reagion_name ."' ,  '". $reagion_name ."' )";

			if(  mysqli_query( $con , $sql ) )
			{
				 //echo " insert to reagion ";
			}
			else{
				// echo "insert to reagion not successful";
			}
		}

        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;

	 }
	 // insert data to bussiness table in db
	 function _insertToBussiness( $bussiness_name )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "insert into `bussiness` values( NULL , '". $bussiness_name ."' ,  '". $bussiness_name ."' )";
			//// echo $sql;
			if(  mysqli_query( $con , $sql ) )
			{
				 //echo " insert to bussiness ";
			}
			else{
				 //echo "insert to bussiness not successful";
			}
			//// echo mysqli_num_rows($result);
		}


        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;

	 }
	 	 // insert data to manager table in db
	 function _insertToManager( $manager_name , $manager_position )
	 {
		 $con =$this->_connection();
		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			$sql = "insert into `manager` values( NULL , '". $manager_name ."' ,  '". $manager_position ."' )";
			//// echo $sql;
			if(  mysqli_query( $con , $sql ) )
			{
				 //echo " insert to manager ";
			}
			else{
				 //echo "insert to manager not successful";
			}
		}


        $last_id =  $con->insert_id;
		mysqli_close( $con );
		return $last_id;

	 }

	 // insert user business report form to db
	function _insertUserBussiness( $user_id , $stuff_id , $guild_id , $state_id ,
						$city_id , $reagion_id , $bus_id , $address , $officeaddress , $manager_id , $manager_number ,$phone )
	{
	    $message = "";
		$con =$this->_connection();

		if( $con )
		{

			mysqli_query($con , "set names 'utf8'");
			//$sql = "INSERT INTO `bussiness_report` 	VALUES (NULL, $user_id, $stuff_id, $guild_id, $state_id	, $city_id, $reagion_id, $bus_id, '$address', '$officeaddress', $manager_id	, '$manager_number', '$phone', '". date(DATE_RFC822) ."');";
            $sql = "INSERT INTO `bussiness_report` (`bussiness_report_id`, `user_id`, `stuff_id`, `guild_id`, `state_id`, `city_id`, `reagion_id`, `bussiness_id`, `address`, `office_address`, `manager_id`, `manager_number`, `phone`, `date`, `expireDate`, `validity`) VALUES (NULL, $user_id, $stuff_id, $guild_id, $state_id, $city_id, $reagion_id, $bus_id, '".$address."', '".$officeaddress."', $manager_id, $manager_number, $phone , '". date("Y-m-d") ."' , '". date("Y-m-d" , strtotime("+30 Days")) ."' , 1 )";

            if(  mysqli_query( $con , $sql ) )
			{
				$bus_rep_id = $con->insert_id;

				// echo "</br>"." insert to business report table". "</br>";
				mysqli_query( $con , "  CALL `save_business_history`( $bus_rep_id , $user_id); "); // save history of insertion ( log making business report )
                $message = "درخواست شما موفقیت آمیز بود";
			}
			else{
				// echo "</br>"."insert to business report table faild"."</br>";
                $message = "درخواست شما انجام نشد";
			}
		}


        $last_id =  $con->insert_id;
		mysqli_close( $con );
        return $message;
	}



	// load the business for the current user, i
	function _load_My_Bussiness()
	{
		$sql = "SELECT * FROM `bussiness_man_report` where `user_id` = '". $_SESSION['user_id'] ."' and `validity` = 1"; // sql query for load my bussiness

		$result = $this->_general_load_from_DB( $sql ); // use general load function for loading data in database for my bussiness

		$colors = array( "success" , "warning" , "default");

		echo "<input type=text id=search placeholder='جستجو'>";
		echo "<table class=\"table\">
					<thead>
					  <tr>
						<th>نام کسب و کار</th>
						<th>رسته</th>
						<th>صنف</th>
						<th>استان</th>
						<th>شهر</th>
						<th>منطقه</th>
						<th>آدرس</th>
						<th>آدرس دفتر مرکزی</th>
						<th>نام مدیر</th>
						<th>موبایل مدیر</th>
						<th>شماره تلفن کسب و کار</th>
						<th>تاریخ انقضا</th>
						
					  </tr>
					</thead>
					<tbody>";
		for( $i = 0 ; $i < mysqli_num_rows($result) ;  )
		{
			$counter = $i  % 3;
			$row = mysqli_fetch_assoc($result);
			$output = "<tr class=$colors[$counter]>";
			$output .=	"<td >".$row['bussiness_name']."</td>"; //load bussiness name
			$output .=	"<td >".$row['guild_name']."</td>"; // load guild name
			$output .=	"<td >".$row['stuff_name']."</td>"; //load stuff name
			$output .=	"<td >".$row['state_name']."</td>"; // load state
			$output .= 	"<td >".$row['city_name']."</td> ";// load city name
			$output .= 	"<td >".$row['reagion_name']."</td>"; // load reagion name
			$output .= 	"<td >".$row['address']."</td>"; // load address
			$output .=	"<td >".$row['office_address']."</td>";	 // load office address
			$output .=	"<td >".$row['manager_name']."</td>";	// load manager name
			$output .=	"<td >".$row['manager_number']."</td>"; // load manager phone number
			$output .=	"<td >".$row['phone']."</td>";	// load my phone number
			$remainingMessage = $row['remainingDay'] . " روز مانده تا انقضا";
			$output .=	"<td >".$remainingMessage."</td>";	// load my phone number
			$output .=	"<td > 
							<form action='wr_report.php' method='post'>
								<input type='hidden' name='user_id' value=" .$_SESSION['user_id'].">
								<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
								<input type='button' class='btn btn-primary' onclick='this.form.submit()'  value='نوشتن گزارش'>
							</form>
						</td>";
			$output .="<td> <form action='showReport.php' method='post'>
							<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
 							<input type='submit' class='btn btn-success' value='مشاهده ' > 
						</form>
						</td>";
			$output .=	"</tr>";$output .=	"</tr>";
			echo $output;
			$i++;

		}
		echo "</tbody>
  			</table>";

	}

     // load the business for the all user,

     function _load_All_Bussiness()
     {
         $sql = "SELECT * FROM `bussiness_man_report`"; // sql query for load my bussiness

         $result = $this->_general_load_from_DB( $sql ); // use general load function for loading data in database for my bussiness

		 $colors = array( "success" , "warning" , "default");

		 echo "<input type=text id=search placeholder='جستجو'>";

		 echo "<table class=\"table\">
					<thead>
					  <tr>
						<th>نام کسب و کار</th>
						<th>رسته</th>
						<th>صنف</th>
						<th>استان</th>
						<th>شهر</th>
						<th>منطقه</th>
						<th>آدرس</th>
						<th>آدرس دفتر مرکزی</th>
						<th>نام مدیر</th>
						<th>موبایل مدیر</th>
						<th>شماره تلفن کسب و کار</th>
						
					  </tr>
					</thead>
					<tbody>";
		 for( $i = 0 ; $i < mysqli_num_rows($result) ;  )
		 {
			 $counter = $i  % 3;
			 $row = mysqli_fetch_assoc($result);
			 $output = "<tr class=$colors[$counter]>";
			 $output .=	"<td >".$row['bussiness_name']."</td>"; //load bussiness name
			 $output .=	"<td >".$row['guild_name']."</td>"; // load guild name
			 $output .=	"<td >".$row['stuff_name']."</td>"; //load stuff name
			 $output .=	"<td >".$row['state_name']."</td>"; // load state
			 $output .= 	"<td >".$row['city_name']."</td> ";// load city name
			 $output .= 	"<td >".$row['reagion_name']."</td>"; // load reagion name
			 $output .= 	"<td >".$row['address']."</td>"; // load address
			 $output .=	"<td >".$row['office_address']."</td>";	 // load office address
			 $output .=	"<td >".$row['manager_name']."</td>";	// load manager name
			 $output .=	"<td >".$row['manager_number']."</td>"; // load manager phone number
			 $output .=	"<td >".$row['phone']."</td>";	// load my phone number
			 $output .="<td> <form action='showReport.php' method='post'>
							<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
 							<input type='submit' class='btn btn-success' value='مشاهده ' > 
						</form>
						</td>";
			 $output .=	"</tr>";
			 echo $output;
			 $i++;

		 }
		 echo "</tbody>
  			</table>";


     }


     // load all the open business => (validity should be 0) , every one can choose among them
	 function _load_open_Bussiness()
	 {
		 $sql = "SELECT * FROM `bussiness_man_open_report`"; // sql query for load my bussiness

		 $result = $this->_general_load_from_DB( $sql ); // use general load function for loading data in database for my bussiness

		 $colors = array( "success" , "warning" , "default");

		 echo "<input type=text id=search placeholder='جستجو'>";

		 echo "<table class=\"table\">
					<thead>
					  <tr>
						<th>نام کسب و کار</th>
						<th>رسته</th>
						<th>صنف</th>
						<th>استان</th>
						<th>شهر</th>
						<th>منطقه</th>
						<th>آدرس</th>
						<th>آدرس دفتر مرکزی</th>
						<th>نام مدیر</th>
						<th>موبایل مدیر</th>
						<th>شماره تلفن کسب و کار</th>
						<th></th>
						
					  </tr>
					</thead>
					<tbody>";
		 for( $i = 0 ; $i < mysqli_num_rows($result) ;  )
		 {
			 $counter = $i  % 3;
			 $row = mysqli_fetch_assoc($result);
			 //$output = "<form "
			 $output = "<tr id=$i class=$colors[$counter]>";
			 $output .=	"<td >".$row['bussiness_name']."</td>"; //load bussiness name
			 $output .=	"<td >".$row['guild_name']."</td>"; // load guild name
			 $output .=	"<td >".$row['stuff_name']."</td>"; //load stuff name
			 $output .=	"<td >".$row['state_name']."</td>"; // load state
			 $output .= "<td >".$row['city_name']."</td> ";// load city name
			 $output .= "<td >".$row['reagion_name']."</td>"; // load reagion name
			 $output .= "<td >".$row['address']."</td>"; // load address
			 $output .=	"<td >".$row['office_address']."</td>";	 // load office address
			 $output .=	"<td >".$row['manager_name']."</td>";	// load manager name
			 $output .=	"<td >".$row['manager_number']."</td>"; // load manager phone number
			 $output .=	"<td >".$row['phone']."</td>";	// load my phone number
			 $output .=	"<td > <input type='button' class='btn btn-primary'  onclick='register_business(". $_SESSION["user_id"]." , ". $row['bussiness_report_id'] ." , " .$i .")' value='ثبت برای خودم'></td>";	// load my phone number

			 $output .="<td> <form action='showReport.php' method='post'>
							<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
 							<input type='submit' class='btn btn-success' value='مشاهده ' > 
						</form>
						</td>";
			 $output .=	"</tr>";
			 echo $output;
			 $i++;

		 }
		 echo "</tbody>
  			</table>";
	 }


	 // just load amy open business ( this list dose not show in "open list" - if some one choose an open business, make it him(her) open business, and shows in this list
	 function _load_My_open_Bussiness()
	 {
		 $sql = "SELECT * FROM `bussiness_man_report` where `user_id` = '". $_SESSION['user_id'] ."' and `validity` = 2"; // sql query for load my bussiness

		 $result = $this->_general_load_from_DB( $sql ); // use general load function for loading data in database for my bussiness

		 $colors = array( "success" , "warning" , "default");

		 echo "<input type=text id=search placeholder='جستجو'>";
		 echo "<table class='table'>
					<thead>
					  <tr>
						<th>نام کسب و کار</th>
						<th>رسته</th>
						<th>صنف</th>
						<th>استان</th>
						<th>شهر</th>
						<th>منطقه</th>
						<th>آدرس</th>
						<th>آدرس دفتر مرکزی</th>
						<th>نام مدیر</th>
						<th>موبایل مدیر</th>
						<th>شماره تلفن کسب و کار</th>
						<th>تاریخ انقضا</th>
						
					  </tr>
					</thead>
					<tbody>";
		 for( $i = 0 ; $i < mysqli_num_rows($result) ;  )
		 {
			 $counter = $i  % 3;
			 $row = mysqli_fetch_assoc($result);
			 $output = "<tr class=$colors[$counter] >"; // mob is : man open business
			 $output .=	"<td >".$row['bussiness_name']."</td>"; //load bussiness name
			 $output .=	"<td >".$row['guild_name']."</td>"; // load guild name
			 $output .=	"<td >".$row['stuff_name']."</td>"; //load stuff name
			 $output .=	"<td >".$row['state_name']."</td>"; // load state
			 $output .= 	"<td >".$row['city_name']."</td> ";// load city name
			 $output .= 	"<td >".$row['reagion_name']."</td>"; // load reagion name
			 $output .= 	"<td >".$row['address']."</td>"; // load address
			 $output .=	"<td >".$row['office_address']."</td>";	 // load office address
			 $output .=	"<td >".$row['manager_name']."</td>";	// load manager name
			 $output .=	"<td >".$row['manager_number']."</td>"; // load manager phone number
			 $output .=	"<td >".$row['phone']."</td>";	// load my phone number
			 $remainingMessage = $row['remainingDay'] . " روز مانده تا انقضا";
			 $output .=	"<td >".$remainingMessage."</td>";	// load my phone number
			 $output .=	"<td > 
							<form action='wr_report.php' method='post'>
								<input type='hidden' name='user_id' value=" .$_SESSION['user_id'].">
								<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
								<input type='button' class='btn btn-primary' onclick='this.form.submit()'  value='نوشتن گزارش'>
							</form>
						</td>";
			 $output .="<td> <form action='showReport.php' method='post'>
							<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
 							<input type='submit' class='btn btn-success' value='مشاهده ' > 
						</form>
						</td>";

			$output .=	"</tr>";
			 echo $output;
			 $i++;

		 }
		 echo "</tbody>
  			</table>";
	 }

	// write report (story) for my business
	 function _write_Business_Report_story( $user_id , $bus_rep_id , $storyText )
	 {
		 $con = $this->_connection();
         $message = "";

		 $sql = "INSERT INTO `business_story` (`business_story_id`, `business_report_id`, `date`, `user_id`, `story_text`) VALUES (NULL, $bus_rep_id , '". Date("Y-m-d") ."' , $user_id , '".$storyText ."' ) ";

		 mysqli_query($con , "set names 'utf8'");
		 //echo $sql;
		 $result = mysqli_query($con , $sql );
		 if( $result )
		 {
			 //echo "story inserted";
             $message = "درخواست شما موفقیت آمیز بود";
         }
         else {
             // echo "</br>"."insert to business report table faild"."</br>";
             $message = "درخواست شما انجام نشد";
         }

         return $message;

	 }

	 // Show business report Story by business report id
	 function _show_Business_Report_Story( $bus_rep_id )
	 {
		 $sql = "SELECT * FROM `full_business_report_story` WHERE `business_report_id` = $bus_rep_id"; // sql query for load my bussiness
		 //echo $sql;

		 $result = $this->_general_load_from_DB($sql); // use general load function for loading data in database for my bussiness

		 if (mysqli_num_rows($result))
		 {
			 $colors = array("success", "warning", "default");

			 echo "<table class=\"table\">
							<thead>
							  <tr>
								<th>نام کسب و کار</th>
								<th>رسته</th>
								<th>صنف</th>
								<th>استان</th>
								<th>شهر</th>
								<th>منطقه</th>
								<th>آدرس دفتر مرکزی</th>
								<th>نام مدیر</th>
								<th>موبایل مدیر</th>
								<th>شماره تلفن کسب و کار</th>
								<th>تاریخ انقضا</th>
								
							  </tr>
							</thead>
							<tbody>";
			 $row = mysqli_fetch_assoc($result);
			 $output = "<tr class='success' >"; // mob is : man open business
			 $output .= "<td >" . $row['bussiness_name'] . "</td>"; //load bussiness name
			 $output .= "<td >" . $row['guild_name'] . "</td>"; // load guild name
			 $output .= "<td >" . $row['stuff_name'] . "</td>"; //load stuff name
			 $output .= "<td >" . $row['state_name'] . "</td>"; // load state
			 $output .= "<td >" . $row['city_name'] . "</td> ";// load city name
			 $output .= "<td >" . $row['reagion_name'] . "</td>"; // load reagion name
			 $output .= "<td >" . $row['office_address'] . "</td>";     // load office address
			 $output .= "<td >" . $row['manager_name'] . "</td>";    // load manager name
			 $output .= "<td >" . $row['manager_number'] . "</td>"; // load manager phone number
			 $output .= "<td >" . $row['phone'] . "</td>";    // load my phone number
			 $remainingMessage = $row['remainingDay'] . " روز مانده تا انقضا";
			 $output .= "<td >" . $remainingMessage . "</td>";    // load my phone number


			 $output .= "</tr>";
			 echo $output;
			 echo "</tbody>
					</table> <br />";

			 $i = 0;
			 do {
				 $output = "<div class='row'>
									<div class='col-sm-1'>
										<div class='thumbnail'>
											<img class='img-responsive user-photo' src='dist/img/avatar5.png'>
										</div><!-- /thumbnail -->
									</div><!-- /col-sm-1 -->";


			 	$output .= "      <div class='col-sm-11'>
										<div class='panel panel-default'>
											<div class='panel-heading'>
												<strong>" . $row['name'] . "</strong> <span class='text-muted'>در تاریخ " . $this->_change_date($row['business_story_date']) . "                                              نوشت</span>
											</div>
	
											<div class='panel-body'>
				" . $row['story_text'] . "
				 </div><!-- /panel-body -->
										</div><!-- /panel panel-default -->
									</div><!-- /col-sm-5 -->
								</div><!-- /row -->";

				 $row = mysqli_fetch_assoc($result);
				 $i++;
			 echo $output;

		 	} while ($i < mysqli_num_rows($result));

	 	}

		 echo "<a href=". $_SERVER['HTTP_REFERER'] ." class='btn btn-danger' >بازگشت </a>";

	 }

	 //change date , and return the result

	 function _change_date( $date )
	 {
		 list($year, $month, $day) = explode('-', $date);

		 $timestamp = mktime( $month, $day, $year);
		 require_once ('jdf.php');
		 $jalali_date = jdate("Y/m/d",$timestamp);
		 return $jalali_date;
	 }



	 //**************************************************************************************//
	 //********************* Set Contruct ( this just can call by Admin ) *******************//
	 //**************************************************************************************//
	 // load the business for the all user,

	 function _load_My_Contract( $user_id )
	 {
		 $sql = "SELECT * FROM `bussiness_man_contract` where `user_id` = $user_id"; // sql query for load my bussiness

		 $result = $this->_general_load_from_DB( $sql ); // use general load function for loading data in database for my bussiness

		 $colors = array( "success" , "warning" , "default");

		 echo "<input type=text id=search placeholder='جستجو'>";
		 echo "<table class=\"table\">
					<thead>
					  <tr>
						<th>نام کسب و کار</th>
						<th>رسته</th>
						<th>صنف</th>
						<th>استان</th>
						<th>شهر</th>
						<th>منطقه</th>
						<th>آدرس</th>
						<th>آدرس دفتر مرکزی</th>
						<th>نام مدیر</th>
						<th>موبایل مدیر</th>
						<th>شماره تلفن کسب و کار</th>
						
					  </tr>
					</thead>
					<tbody>";
		 for( $i = 0 ; $i < mysqli_num_rows($result) ;  )
		 {
			 $counter = $i  % 3;
			 $row = mysqli_fetch_assoc($result);
			 $output = "<tr class=$colors[$counter]>";
			 $output .=	"<td >".$row['bussiness_name']."</td>"; //load bussiness name
			 $output .=	"<td >".$row['guild_name']."</td>"; // load guild name
			 $output .=	"<td >".$row['stuff_name']."</td>"; //load stuff name
			 $output .=	"<td >".$row['state_name']."</td>"; // load state
			 $output .= 	"<td >".$row['city_name']."</td> ";// load city name
			 $output .= 	"<td >".$row['reagion_name']."</td>"; // load reagion name
			 $output .= 	"<td >".$row['address']."</td>"; // load address
			 $output .=	"<td >".$row['office_address']."</td>";	 // load office address
			 $output .=	"<td >".$row['manager_name']."</td>";	// load manager name
			 $output .=	"<td >".$row['manager_number']."</td>"; // load manager phone number
			 $output .=	"<td >".$row['phone']."</td>";	// load my phone number
			 $output .="<td> <form action='showReport.php' method='post'>
							<input type='hidden' name='business_report_id' value=".$row['bussiness_report_id'].">
 							<input type='submit' class='btn btn-success' value='مشاهده ' > 
						</form>
						</td>";
			 $output .=	"</tr>";
			 echo $output;
			 $i++;

		 }
		 echo "</tbody>
  			</table>";
	 }


	 //**************************************************************************************//
	 //********************* Set Contruct ( this just can call by Admin ) *******************//
	 //**************************************************************************************//
	 function _add_Contract( $a )
	 {
		 $sql = "SELECT * FROM `bussiness_man_report` where `validity` = 1 Or `validity` = 2"; // sql query for load my bussiness

		 $result = $this->_general_load_from_DB( $sql ); // use general load function for loading data in database for my bussiness


		 $output = "<div class='container'>

                                <div class='filters'>
                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='businessManName' placeholder='نام بازاریاب' data-col='نام بازاریاب'/>
                                    </div>
                                    
                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='businessName' placeholder='نام کسب و کار' data-col='نام کسب و کار'/>
                                    </div>

                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='guild' placeholder='رسته' data-col='رسته'/>
                                    </div>

                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='stuff' placeholder='صنف' data-col='صنف'/>
                                    </div>

                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='state' placeholder='استان' data-col='استان'/>
                                    </div>

									<div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='city' placeholder='شهر' data-col='شهر'/>
                                    </div>

                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='reagion' placeholder='منطقه' data-col='منطقه'/>
                                    </div>

                                    <div class='filter-container'>
                                        <input autocomplete='off' class='filter' name='expireDate' placeholder='تاریخ انقضا' data-col='تاریخ انقضا'/>
                                    </div>
                                    <div class='clearfix'></div>

                                </div>

                            </div>

                            <div class='container'>
                                <table class='table table-hover'>
                                    <thead class='table table-header'>
										<tr>
										<th>نام بازاریاب</th>
										<th>نام کسب و کار</th>
										<th>رسته</th>
										<th>صنف</th>
										<th>استان</th>
										<th>شهر</th>
										<th>منطقه</th>
										<th>تاریخ انقضا</th></tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> Homer </td>
                                        <td> Squishie </td>
                                        <td> Magheritta </td>
                                        <td> The Avengers </td>
                                        <td> Homer </td>
                                        <td> Squishie </td>
                                        <td> Magheritta </td>
                                        <td> The Avengers </td>
                                        ".


			 "<td> <form action='showReport.php' method='post'>
										<input type='hidden' name='business_report_id' value='bussiness_report_id'>
										<input type='submit' class='btn btn-success' value='مشاهده ' > 
									</form>
									</td>"

			 ."
                                    </tr>
                                    <tr>
                                        <td> Marge </td>
                                        <td> Squishie </td>
                                        <td> Magheritta </td>
                                        <td> The Avengers </td>
                                        <td> Homer </td>
                                        <td> Squishie </td>
                                        <td> Magheritta </td>
                                        <td> The Avengers </td>
                                    </tr>
                                    <tr>
                                        <td> Bart </td>
                                        <td> Squishie </td>
                                        <td> Pepperoni </td>
                                        <td> Black Dynamite </td>
                                        <td> Homer </td>
                                        <td> Squishie </td>
                                        <td> Magheritta </td>
                                        <td> The Avengers </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>";
		 echo $output;


	 }


	 // General function for load data by sql query( query should pass by argument)
	function _general_load_from_DB( $sql )
	{
		$con =$this->_connection(); // create connection ( call _connection func )
		if( $con ) // if the con was valid
		{
			mysqli_query($con , "set names 'utf8'");
			//$sql = mysqli_real_escape_string( $con , $sql );
			$result = mysqli_query( $con , $sql ); // execute the query

			return $result;	// return the result
		}
		return null; // return null if the con was invalid
	}


	 //**************************************************************************************//
	 //************************************ ORGANIZATION  ***********************************//
	 //**************************************************************************************//

	 function _insertUserOrganization( $user_id , $state_id ,$state_population , $city_id , $city_population , $total_population,
									   $organization_id , $organization_address , $manager_id ,$manager_number ,
									   $manager_office_number ,$manager_secretary_phone )
	 {
		 $message = "";
		 $con =$this->_connection();

		 if( $con )
		 {

			 mysqli_query($con , "set names 'utf8'");
			 $sql = "INSERT INTO `odnoosbussiness2`.`organization_report` (`organization_report_id`, `user_id`, `organization_id`, `manager_id`, `manager_phone_number`, `manager_office_number`, `manager_sec_number`, `address`, `total_population`, `state_id`, `state_population`, `city_id`, `city_population`, `date`, `expireDate`, `validity`)";
			 $sql .=" VALUES (NULL, $user_id,, $organization_id, $manager_id, $manager_number, $manager_office_number, $manager_secretary_phone , '". $organization_address ."' , $total_population, $state_id , $state_population , $city_id ,$city_population , '". date("Y-m-d")."', '". date("Y-m-d" , strtotime("+90 Days")) ."' , 1);";
			 if(  mysqli_query( $con , $sql ) )
			 {
				 $bus_rep_id = $con->insert_id;

				 // echo "</br>"." insert to business report table". "</br>";
				 mysqli_query( $con , "  CALL `save_business_history`( $bus_rep_id , $user_id); "); // save history of insertion ( log making business report )
				 $message = "درخواست شما موفقیت آمیز بود";
			 }
			 else{
				 // echo "</br>"."insert to business report table faild"."</br>";
				 $message = "درخواست شما انجام نشد";
			 }
		 }


		 $last_id =  $con->insert_id;
		 mysqli_close( $con );
		 return $message;
	 }

	 // insert data to Organization table in db
	 function _insertToOrganization( $org_name )
	 {
		 $con =$this->_connection();
		 if( $con )
		 {

			 mysqli_query($con , "set names 'utf8'");
			 $sql = "insert into `organization` values( NULL , '". $org_name ."' ,  '". $org_name ."' )";
			 //// echo $sql;
			 if(  mysqli_query( $con , $sql ) )
			 {
				 //echo " insert to bussiness ";
			 }
			 else{
				 //echo "insert to bussiness not successful";
			 }
			 //// echo mysqli_num_rows($result);
		 }


		 $last_id =  $con->insert_id;
		 mysqli_close( $con );
		 return $last_id;

	 }







 }


?>
