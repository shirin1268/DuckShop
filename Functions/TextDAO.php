<?php
require_once ("../DB/Connection.php");

function readTextBox()
{
	try {

		$cxn = connectToDB();

		$handle = $cxn->prepare( "SELECT textcontent FROM Text WHERE textname ='text-box' ");
		$handle->execute();

		// Using the fetchAll() method might be too resource-heavy if you're selecting a truly massive amount of rows.
		// If that's the case, you can use the fetch() method and loop through each result row one by one.
		// You can also return arrays and other things instead of objects.  See the PDO documentation for details.
		$result = $handle->fetchAll( \PDO::FETCH_OBJ );

		foreach ( $result as $row ) {
			print( TextTemplate($row) );
		}
	}
	catch(\PDOException $ex){
		print($ex->getMessage());
	}
}

function updateText($textID, $textcontents)
{
	try
	{
		$cxn = ConnectToDB();

		$statement = "UPDATE Text SET textcontent = ', textcontent = '" . $textcontents . "' WHERE textID = " . $textID;

		$handle = $cxn->prepare( $statement );
		$handle->execute();

		//close the connection
		$cxn = null;
	}
	catch(\PDOException $ex){
		print($ex->getMessage());
	}
}
function deleteText($textID)
{
	try
	{
		$cxn = ConnectToDB();

		$statement = "DELETE FROM Text WHERE textID = " . $textID;

		$handle = $cxn->prepare( $statement );
		$handle->execute();

		//close the connection
		$cxn = null;
	}
	catch(\PDOException $ex){
		print($ex->getMessage());
	}
}
function TextTemplate($row)
{
	return $template = "
	<div class=\"text-box center\">
            <p>".$row->textcontent ." </p>
        </div>    
	";}
