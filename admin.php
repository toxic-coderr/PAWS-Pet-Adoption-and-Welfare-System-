<?php 
session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name']))
$user = 'root';
$password = '';
$database = 'pawsdbms';

$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
$uname = $_SESSION['uname'];
// SQL query to select data from database

$sql = " SELECT * FROM pets order by pid";
$result = $mysqli->query($sql);
$sql1 = " SELECT * FROM ngo order by naddress";
$result1 = $mysqli->query($sql1);
$sql2 = " SELECT * FROM store order by saddress";
$result2 = $mysqli->query($sql2);
$sql3 = " SELECT * FROM vet order by vaddress";
$result3 = $mysqli->query($sql3);
$mysqli->close();
if (isset($_SESSION['uname'])) 
{

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<style>html {zoom: 75%;}</style>
</head>
<body>
<ul>
      <li><img src="images/logo.png" ></li>
      <li><a href="index.php">Home</a></li>

      <li><a href="pets.php">Pets</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="about.php">About</a></li>
      
      <li><a href="admin.php">Hello, <?php echo $uname; ?></a></li>
      <li><a href="logout.php">Logout</a></li>
 
    </ul>        


    <h1 class="heading">Admin View</h1>
    

            <center>
            <section><br>
		<h1>All Pets</h1>

        <div id="table_wrap">
		<table class="styled-table">
      <thead>
			<tr>
				<th style>Pid</th>
				<th>Name</th>
				<th>Species</th>
				<th>Breed</th>
                <th>Ngo_id</th>
                <th>Store_id</th>
                <th>Vet_id</th>
                <th>Owner</th>
                <th>Action</th>

			</tr>
            <form action="insert/pet.php" method="post">
            <tr>
				<th ><label for="pid"></label><input type="text" name="pid" id="pid"></th>
        <th><label for="name"></label><input type="text" name="name" id="name"></th>
        <th><label for="species"></label><input type="text" name="species" id="species"></th>
        <th><label for="breed"></label><input type="text" name="breed" id="breed"></th>
        <th><label for="nid"></label><input type="text" name="nid" id="nid"></th>
        <th><label for="sid"></label><input type="text" name="sid" id="sid"></th>
        <th><label for="vid"></label><input type="text" name="vid" id="vid"></th>
        <th><label for="uname"></label><input type="text" name="uname" id="uname"></th>
                <th><input type="submit" value="Insert/Update" id="submitBtn" style="background-color: #33cc33;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"></th>
			</tr>

  </thead>

  


			<?php
				
                
				while($rows=$result->fetch_assoc())
				{
			?>
    <tbody>  
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['pid'];?></td>
				<td><?php echo $rows['pname'];?></td>
				<td><?php echo $rows['species'];?></td>
				<td><?php echo $rows['breed'];?></td>
        <td><?php echo $rows['nid'];?></td>
        <td><?php echo $rows['sid'];?></td>
        <td><?php echo $rows['vid'];?></td>
        <td><?php echo $rows['uname'];?></td>
        <td><a href="delete/pet.php?pid=<?php echo $rows['pid']; ?>"<button type="button" style="background-color: red;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Delete</button></a></td>
			</tr>
        
			<?php
				}
			?>
      </tbody>
		</table>
        </div>
	</section>
            <section>
		<h1>All NGOs
        </h1>
		<!-- TABLE CONSTRUCTION -->
		<table class="styled-table">
      <thead>
			<tr>
				<th>Nid</th>
				<th>Name</th>
				<th>Address</th>
				<th>Action</th>
                <!-- <th>Delete</th> -->
			</tr>
            <form action="insert/ngo.php" method="post">
            <tr>
				<th><label for="nnid"></label><input type="text" name="nnid" id="nnid"></th>
        <th><label for="nname"></label><input type="text" name="nname" id="nname"></th>
        <th><label for="address"></label><input type="text" name="address" id="address"></th>
        <th><input type="submit" value="Insert/Update" style="background-color: #33cc33;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"></th>
			</tr>
            </form>
			
  </thead>
  </tr>
            
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result1->fetch_assoc())
				{
			?>
      <tbody>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['nid'];?></td>
				<td><?php echo $rows['nname'];?></td>
				<td><?php echo $rows['naddress'];?></td>
			
                <td><a href="delete/ngo.php?nid=<?php echo $rows['nid']; ?>"><button type="button" style="background-color: red;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Delete</button>
  </a></td>
			</tr>
        
			<?php
				}
			?>
      </tbody>
		</table>
	</section>

    <section>
		<h1>All Stores
        </h1>
		<!-- TABLE CONSTRUCTION -->
		<table class="styled-table">
      <thead>
			<tr>
				<th>Sid</th>
				<th>Name</th>
				<th>Address</th>
				<th>Action</th>
                <!-- <th>Delete</th> -->
			</tr>
            <form action="insert/store.php" method="post">
            <tr>
				<th><label for="sid"></label><input type="text" name="sid" id="sid"></th>
        <th><label for="name"></label><input type="text" name="name" id="name"></th>
        <th><label for="address"></label><input type="text" name="address" id="address"></th>
                <th><input type="submit" value="Insert/Update" style="background-color: #33cc33;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"></th>
			</tr>
            </form>
			
  </thead>
  </tr>
            
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result2->fetch_assoc())
				{
			?>
      <tbody>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['sid'];?></td>
				<td><?php echo $rows['sname'];?></td>
				<td><?php echo $rows['saddress'];?></td>
			
                <td><a href="delete/store.php?sid=<?php echo $rows['sid']; ?>"><button type="button" style="background-color: red;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Delete</button></a></td>
			</tr>
        
			<?php
				}
			?>
      </tbody>
		</table>
	</section>


	<section>
		<h1>All Vets
        </h1>
		<!-- TABLE CONSTRUCTION -->
		<table class="styled-table">
      <thead>
			<tr>
				<th>Vid</th>
				<th>Name</th>
				<th>Address</th>
				<th>Action</th>
                <!-- <th>Delete</th> -->
			</tr>
            <form action="insert/vet.php" method="post">
            <tr>
				<th><label for="vid"></label><input type="text" name="vid" id="vid"></th>
        <th><label for="name"></label><input type="text" name="name" id="name"></th>
        <th><label for="address"></label><input type="text" name="address" id="address"></th>
                <th><input type="submit" value="Insert/Update" style="background-color: #33cc33;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"></th>
			</tr>
            </form>
			
  </thead>
  </tr>
            
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result3->fetch_assoc())
				{
			?>
      <tbody>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['vid'];?></td>
				<td><?php echo $rows['vname'];?></td>
				<td><?php echo $rows['vaddress'];?></td>
			
                <td><a href="delete/vet.php?vid=<?php echo $rows['vid']; ?>"><button type="button" style="background-color: red;
  border: none;
  color: white;
  padding: 5px 5px;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Delete</button></a></td>
			</tr>
        
			<?php
				}
			?>
      </tbody>
		</table>
	</section>


    
      </center>




            <section class="footer" style="background-color: black;">

                <div class="box-container">
            
                    <div class="box" id="contact">
                        <h3>about us</h3>
                        <p>Admin View</p>
                    </div>
                    <div class="box">
                        <h3>quick links</h3>
                        <a href="#home">home</a>
                        <a href="#category">category</a>
                
                    </div>
                    <div class="box">
                        <h3>follow us</h3>
                        <a href="#">facebook</a>
                        <a href="#">twitter</a>
                        <a href="#">instagram</a>
                        <a href="#">linked</a>
                    </div>
            
                </div>
                
            </section>
			<section class="footer" style="background-color: black;">


            

	
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>