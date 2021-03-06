<?php
//error_reporting(0);
session_start();

$config = new controller();
class controller{

	

		function __construct(){
			if (isset($_GET['mod'])) {
				$conn = $this->open();
				$action = $this->valdata($conn, $_GET['mod']);

				switch ($action) {

					case 'deleteCandidate':
						$this->deleteCandidate($conn);
						break;
					
					case 'addCandidate':
						$this->addCandidate($conn);
						break;
					
					case 'addElection':
						$this->addElection($conn);
						break;
					
					case 'updateElection':
						$this->updateElection($conn);
						break;

					case 'deleteElection':
						$this->deleteElection($conn);
						break;

					case 'updateStudent':
						$this->updateStudent($conn);
						break;

					case 'deleteStudent':
						$this->deleteStudent($conn);
						break;
					
					case 'addStudent':
						$this->addStudent($conn);
						break;

					case 'addFaculty':
						$this->addFaculty($conn);
						break;

					case 'deleteFaculty':
						$this->deleteFaculty($conn);
						break;

					//---------------- START BASIC PART ----------------
						case 'login':
						$this->login($conn);
						break;

					case 'logout':
						$this->logout($conn);
						break;

					//---------------- END BASIC PART ----------------
					
				}
			}
		}

		public function deleteCandidate($conn){
			$id = $this->valdata($conn, $_GET['id']);

			$sql = "DELETE FROM candidates WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt ->execute([$id]);

			$this->redirect('candidates.php', 'Succesfully delete');

		}

		public function addCandidate($conn){
			
			$this->redirect('candidates.php', 'Succesfully Saved');
		}

		public function addElection($conn){
			$name = $this->valdata($conn, $_POST['name']);
			$type = $this->valdata($conn, $_POST['type']);
			$description = $this->valdata($conn, $_POST['description']);
			$datestart = $this->valdata($conn, $_POST['datestart']);
			$dateend = $this->valdata($conn, $_POST['dateend']);
 
			$sql = "INSERT INTO elections (name, type, description, datestart, dateend) VALUES (?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$rs = $stmt->execute([$name,$type,$description,$datestart,$dateend]);
 
			$this->redirect('elections.php', 'Succesfully Saved');
		}

		public function updateElection($conn){
			$name = $this->valdata($conn, $_POST['name']);
			$type = $this->valdata($conn, $_POST['type']);
			$description = $this->valdata($conn, $_POST['description']);
			$datestart = $this->valdata($conn, $_POST['datestart']);
			$dateend = $this->valdata($conn, $_POST['dateend']);

			$id = $this->valdata($conn, $_POST['id']);
 
			$sql = "UPDATE elections SET name = ?, type = ?, description = ?, datestart = ?, dateend = ? WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$rs = $stmt->execute([$name,$type,$description,$datestart,$dateend,$id]);
 
			$this->redirect('elections.php', 'Succesfully Saved');
		}


		public function updateStudent($conn){
			$name = $this->valdata($conn, $_POST['name']);
			$matricnumber = $this->valdata($conn, $_POST['matricnumber']);
			$cgpa = $this->valdata($conn, $_POST['cgpa']);
			$coursecode = $this->valdata($conn, $_POST['coursecode']);
			$faculty = $this->valdata($conn, $_POST['faculty']);
			$semester = $this->valdata($conn, $_POST['semester']);
 
			$id = $this->valdata($conn, $_POST['id']);

			$sql = "UPDATE students SET name = ?, unique_id = ?, faculty_id = ?, course = ?, semester = ?, cgpa = ? WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$rs = $stmt->execute([$name,$matricnumber,$faculty,$coursecode,$semester,$cgpa,$id]);
 
			$this->redirect('students.php', 'Succesfully Saved');
		}

		public function deleteElection($conn){
			$id = $this->valdata($conn, $_GET['id']);

			$sql = "DELETE FROM elections WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt ->execute([$id]);

			$this->redirect('elections.php', 'Succesfully delete');

		}

        public function deleteStudent($conn){
			$id = $this->valdata($conn, $_GET['id']);

			$sql = "DELETE FROM students WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt ->execute([$id]);

			$this->redirect('students.php', 'Succesfully delete');

		}

       public function addStudent($conn){
		   $name = $this->valdata($conn, $_POST['name']);
		   $matricnumber = $this->valdata($conn, $_POST['matricnumber']);
		   $cgpa = $this->valdata($conn, $_POST['cgpa']);
		   $coursecode = $this->valdata($conn, $_POST['coursecode']);
		   $faculty = $this->valdata($conn, $_POST['faculty']);
		   $semester = $this->valdata($conn, $_POST['semester']);

		   $sql = "INSERT INTO students (name, unique_id, cgpa, course, faculty_id, semester) VALUES (?, ?, ?, ?, ?, ?)";
		   $stmt = $conn->prepare($sql);
		   $rs = $stmt->execute([$name,$matricnumber,$cgpa,$coursecode,$faculty,$semester]);

		   $this->redirect('students.php', 'Succesfully Saved');
	   }

	   public function addFaculty($conn){
		$name = $this->valdata($conn, $_POST['name']);

		$sql = "INSERT INTO faculties (name) VALUES (?)";
		$stmt = $conn->prepare($sql);
		$rs = $stmt->execute([$name]);

		$this->redirect('faculties.php', 'Succesfully Saved');
	}

	   public function deleteFaculty($conn){
		$id = $this->valdata($conn, $_GET['id']);

		$sql = "DELETE FROM faculties WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt ->execute([$id]);

		$this->redirect('faculties.php', 'Succesfully delete');

	}

		public function getOneData($conn, $query){
			
			$sql = "$query";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			if ($stmt) {
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					return $row;	
				}
			} else {
				return 0;
			}
		}

		public function getListData($conn, $query){
			
			$sql = "$query";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			if ($stmt) {
				while($row = $stmt->fetchAll()){
					return $row;
				}
			} else {
				return 0;
			}
		}

		public function getCount($conn, $tableName, $where = null){
			$sql = "SELECT count(id) as total FROM $tableName $where";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				return $row;	
			}
        }

		
        public function getAuth($conn){

			if(isset($_SESSION['admin_id'])){
				$id = $_SESSION['admin_id'];
				$sql = "SELECT * FROM admins WHERE id = :id";
				
				$stmt = $conn->prepare($sql);
				$stmt->bindparam(':id', $id);
				$stmt->execute();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					return $row;	
				}
			}  else {
				return 0;
			}
		}

		public function login($conn){
			$email = $this->valdata($conn,$_POST['email']);
			$encrypted = md5($this->valdata($conn,$_POST['password']));

			//for admin
			$sql = "SELECT * FROM admins WHERE email = :email AND password = :encrypted";
	        $stmt = $conn->prepare($sql);
	        $stmt->bindparam(':email', $email);
	        $stmt->bindparam(':encrypted', $encrypted);
	        $stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($user){
				$_SESSION['admin_id'] = $user['id'];

				$message = "Hai ". $user['name'] .", Welcome to SOVS KUIS";
				$this->redirect('index.php', $message);
			} else {
				
				$message = "Your email or password is invalid, please try again.";
				$this->redirect('login.php', $message);
			}
		}

		// Validation Data / Input
		public function valdata($conn, $inputpost) {
			if (is_array($inputpost) && count($inputpost) > 0) {
				foreach ($inputpost as $input) {
					$inputpost[] = trim($input);
					$inputpost[] = stripslashes($input);
					$inputpost[] = htmlspecialchars($input);
				}
				return $inputpost;
			} else {
				$inputpost = trim($inputpost);
				$inputpost = stripslashes($inputpost);
				$inputpost = htmlspecialchars($inputpost);
				return $inputpost;
			}
		}

		// Destory Session
		public function logout($conn){
			session_destroy();
            $this->redirect('login.php');
		}

		// Redirection
        public function redirect($url, $message = null){

            if($message != null){
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
    
            echo "<script type='text/javascript'>window.location='$url';</script>";
        }

		// Connection With Datbase
		public function open(){
			date_default_timezone_set("Asia/Kuala_Lumpur");

			$conn = "";
			$servername = "localhost";
			$dbname = "votingsystem";
			$username = "root";
			$password = "";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    return $conn;
			}
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			}
		}
	}
?>