-- Database Manager 4.2.5 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `adm_add_client`;
CREATE TABLE `adm_add_client` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_Name` varchar(50) DEFAULT NULL,
  `Client_Code` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Client_SPOC` varchar(500) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Zip_Code` int(30) DEFAULT NULL,
  `Contact_Number` int(15) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `App_Response_Time` int(50) DEFAULT NULL,
  `Inv_Address` varchar(500) DEFAULT NULL,
  `Inv_Bank` varchar(500) DEFAULT NULL,
  `Inv_Due_Days` int(200) DEFAULT NULL,
  `Inv_Code` varchar(50) DEFAULT NULL,
  `Contact_Applicant` varchar(100) DEFAULT NULL,
  `Is_Bulk_Upload` varchar(500) DEFAULT NULL,
  `Is_Prin_Merge` varchar(500) DEFAULT NULL,
  `Is_GSTIN` varchar(500) DEFAULT NULL,
  `Is_Package` varchar(100) DEFAULT NULL,
  `Is_Cancelled_Report` varchar(500) DEFAULT NULL,
  `Is_SEZ` varchar(500) DEFAULT NULL,
  `Is_LOB_Mapping` varchar(500) DEFAULT NULL,
  `Contact_Aggregator` varchar(500) DEFAULT NULL,
  `Email_ID` varchar(50) DEFAULT NULL,
  `Applicant_Check_List` varchar(50) DEFAULT NULL,
  `Internal_Reference_ID` varchar(50) DEFAULT NULL,
  `Currency` varchar(100) DEFAULT NULL,
  `Live_DateDate` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `adm_assign_service`;
CREATE TABLE `adm_assign_service` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_Name` varchar(100) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Service_Type` varchar(100) DEFAULT NULL,
  `SLA` int(200) DEFAULT NULL,
  `Price` varchar(100) DEFAULT NULL,
  `Pass_through_Cost` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `adm_create_pkg`;
CREATE TABLE `adm_create_pkg` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_Name` varchar(200) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Pkg_Name` varchar(200) DEFAULT NULL,
  `Service_Type` varchar(200) DEFAULT NULL,
  `Service_Name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `bulk_order`;
CREATE TABLE `bulk_order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Service` varchar(500) NOT NULL,
  `From_Date` date DEFAULT NULL,
  `From_Time` varchar(500) NOT NULL,
  `To_Date` date DEFAULT NULL,
  `To_Time` varchar(500) NOT NULL,
  `File` varchar(500) DEFAULT NULL,
  `Document` varchar(500) DEFAULT NULL,
  `Doc_Date` date DEFAULT NULL,
  `No_Records` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `client_details`;
CREATE TABLE `client_details` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Company` varchar(200) DEFAULT NULL,
  `User_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `Last_name` varchar(200) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` int(30) DEFAULT NULL,
  `about_me` varchar(500) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `client_details` (`Id`, `Company`, `User_name`, `email`, `first_name`, `Last_name`, `Address`, `city`, `country`, `postal_code`, `about_me`, `password`) VALUES
(1,	'xyz',	'Priyanshu Singh',	'priyanshu@honestwebs.com',	'Priyanshu',	'singh',	'park',	'Lucknow',	'India',	226010,	'nothimnhgbkjf',	'singh'),
(2,	'honest',	'prajakta',	'prajakta@gvm.com',	'pooja',	'patil',	'cidco',	'pune',	'india',	431005,	'hello',	'12345'),
(3,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `OF/QC Details`;
CREATE TABLE `OF/QC Details` (
  `Name` varchar(200) DEFAULT NULL,
  `Middle Name` varchar(200) DEFAULT NULL,
  `Surname` varchar(200) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Per_Address` varchar(500) DEFAULT NULL,
  `Per_State` varchar(200) DEFAULT NULL,
  `Per_City` varchar(200) DEFAULT NULL,
  `Per_Country` varchar(200) DEFAULT NULL,
  `Tem_Address` varchar(500) DEFAULT NULL,
  `Tem_State` varchar(200) DEFAULT NULL,
  `Tem_City` varchar(200) DEFAULT NULL,
  `Tem_Country` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Contact` int(11) DEFAULT NULL,
  `Alt_Contact` int(11) DEFAULT NULL,
  `Pan_No` int(50) DEFAULT NULL,
  `Adhar_No` int(50) DEFAULT NULL,
  `Bank_Name` varchar(300) DEFAULT NULL,
  `Acc_No` varchar(200) DEFAULT NULL,
  `Position` varchar(200) DEFAULT NULL,
  `DOJ` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `OF/QC Details` (`Name`, `Middle Name`, `Surname`, `DOB`, `Per_Address`, `Per_State`, `Per_City`, `Per_Country`, `Tem_Address`, `Tem_State`, `Tem_City`, `Tem_Country`, `Email`, `Contact`, `Alt_Contact`, `Pan_No`, `Adhar_No`, `Bank_Name`, `Acc_No`, `Position`, `DOJ`) VALUES
(NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `Order`;
CREATE TABLE `Order` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `Case_ref_id` int(50) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Middle_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Alias_name` varchar(255) DEFAULT NULL,
  `Email_id` varchar(255) DEFAULT NULL,
  `Internal_reference_id` int(30) DEFAULT NULL,
  `Joining_Location` varchar(255) DEFAULT NULL,
  `Joining_Date` date DEFAULT NULL,
  `LOB` varchar(255) DEFAULT NULL,
  `Additional_Comment` varchar(255) DEFAULT NULL,
  `Country` varchar(255) NOT NULL,
  `Package` varchar(255) DEFAULT NULL,
  `Service_type` varchar(255) NOT NULL,
  `Selected_Service` varchar(255) NOT NULL,
  `Source_name` varchar(255) DEFAULT NULL,
  `Doc_date` date DEFAULT NULL,
  `Document` varchar(255) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Status` varchar(50) DEFAULT NULL,
  `Order_Completion_Date` date DEFAULT NULL,
  `Reports` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `Order` (`id`, `Case_ref_id`, `First_Name`, `Middle_Name`, `Last_Name`, `Alias_name`, `Email_id`, `Internal_reference_id`, `Joining_Location`, `Joining_Date`, `LOB`, `Additional_Comment`, `Country`, `Package`, `Service_type`, `Selected_Service`, `Source_name`, `Doc_date`, `Document`, `Order_Date`, `Order_Status`, `Order_Completion_Date`, `Reports`) VALUES
(1,	0,	'prajata',	'v',	'patil',	'xyz',	'punam@xyz.com',	102,	'pune',	'0000-00-00',	'12',	'hello',	'india',	'2.2',	'Selected Service',	'Selected Service',	'ghy',	'0000-00-00',	'akkjihnn',	'0000-00-00',	'process',	'0000-00-00',	'c:/xyz.xml');

DROP TABLE IF EXISTS `Package Details`;
CREATE TABLE `Package Details` (
  `Package Id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Services Details`;
CREATE TABLE `Services Details` (
  `Service ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) DEFAULT NULL,
  `Last_name` varchar(500) DEFAULT NULL,
  `Mobile_number` int(11) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `User_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_type` (`User_type`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`User_type`) REFERENCES `UserType` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `UserType`;
CREATE TABLE `UserType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-05-12 19:50:43