<?php
error_reporting(0);
/*foreach(PDO::getAvailableDrivers() as $driver)
    {
    echo $driver.'<br />';
    }*/
	
   try {//try begins
    /*** connect to SQLite database ***/
	$host = "localhost";
$user = "root";
$password = "anita";
$database1 = "naspolydb";
	$dbh = new PDO("mysql:host=$host;dbname=$database1", $user, $password);

	$dbh->exec("SET CHARACTER SET utf8");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
 $dbh->exec("CREATE TABLE IF NOT EXISTS `ajaxstudents` (
  `registrationno` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `fullname` text,
  `course` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL COMMENT 'course',
  `dept` varchar(250) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL COMMENT 'department',
  PRIMARY KEY (`registrationno`),
  UNIQUE KEY `registrationno` (`registrationno`,`course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$dbh->exec("CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int(100) NOT NULL AUTO_INCREMENT,
  `workers_name` varchar(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `date_time_login` datetime NOT NULL,
  `page_address` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;");


$dbh->exec("CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `matric` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dept` text CHARACTER SET latin1 NOT NULL,
  `course` text CHARACTER SET latin1 NOT NULL,
  `year` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bloodgp` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image_path` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sign` varchar(100) CHARACTER SET latin1 NOT NULL,
  `principal` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'Principal collected by customer',
  `voms` int(10) NOT NULL,
  `counter` int(10) NOT NULL,
  `session` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;");
					
		
$dbh->exec("CREATE TABLE IF NOT EXISTS `mimi` (
  `work_id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `datetime_login_master` datetime NOT NULL,
  `datetime_create_master` datetime NOT NULL,
  `create_by_master` varchar(100) NOT NULL,
  `password_change_date` datetime NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");					

	
	
	
	
    $dbh1 = new PDO("sqlite:sqlite-database");
	$dbh1->exec("SET CHARACTER SET utf8");
	$dbh1->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
	
$dbh1->exec("CREATE TABLE IF NOT EXISTS ajaxstudents (
                    registrationno text unique, 
                    fullname TEXT, 
                    course TEXT, 
                    dept TEXT)");

$dbh1->exec("CREATE TABLE IF NOT EXISTS entry (
                    id INTEGER PRIMARY KEY, 
                    matric TEXT, 
                    fullname TEXT, 
                    course TEXT,
					dept TEXT, 
                    year TEXT, 
                    bloodgp TEXT, 
                    image_name TEXT
					image_path TEXT, 
                    sign TEXT, 
					voms TEXT,
					session TEXT,
					counter TEXT,
                    principal TEXT)");
					
$dbh1->exec("CREATE TABLE IF NOT EXISTS image (
                    id INTEGER PRIMARY KEY, 
                    file TEXT)");			
					
$dbh1->exec("CREATE TABLE IF NOT EXISTS mimi (
  work_id INTEGER PRIMARY KEY,
  username TEXT,
  password TEXT,
  type TEXT,
  datetime_login_master TEXT,
  datetime_create_master TEXT,
  create_by_master TEXT,
  password_change_date TEXT) ");					

  $dbh1->exec("CREATE TABLE IF NOT EXISTS maddress (
  maddres TEXT,
  others TEXT
)  
 ");

    }//try ends
catch(PDOException $e)
    {
    echo $e->getMessage();
	
    }

?>
