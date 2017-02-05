<html>
    <?php
    /////////////////////////////////////////
    // Database Variables
    $DBName         = "";
    $ServerName     = "";
    $UserName       = "";
    $Password       = "";
    $Conn           = "";
    $TableName      = "";
    
    /////////////////////////////////////////
    // Column Variables
    $CFoodName       = "foodname";
    $CRestName       = "restaurant";
    $CFoodPrice      = "price";
    
    /////////////////////////////////////////
    // Input Variables
    
    
    /////////////////////////////////////////
    // SQL String
    $SQL =  "SELECT $CFoodName, $CRestName, $CFoodPrice ".
            "FROM $TableName".
            "WHERE $CFoodName == $FoodName && ".
            "$RestName == NULL || $CRestName == $RestName"
            // Add Tag later
        
    
    //Connect to the database
    $Conn = new mysqli($ServerName, $Username, $Password, $DBName);
    
    if ($Conn->connect_error) {
        die("Connection failed: " . $Conn->connect_error);
    } 
    
    //Format POST input
    $FoodName   = format_input($_POST["FoodName"]);
    $RestName   = format_input($_POST["RestName"]);
    $FoodTag    = format_input($_Post["FoodTag"]);
    
    $FoodName   = format_string_in($FoodName);
    $RestName   = format_string_in($FoodName);
    $FoodTag    = format_string_in($FoodName);
    
    $Result = $Conn->query($SQL);
    
    show_result($Result);
    /////////////////////////////////////////
    // Functions
    /////////////////////////////////////////
    function format_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function format_string_in($string)
    {
        $string = strtolower($string);
        return $string
    }
    
    function show_result($result)
    {
        echo "Food Name/Restaurant/Price<br>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo $row[$CFoodName]." ".$row[$CRestName]." ".$row[$CFoodPrice]."<br>";
            }
        }
        else
        {
            echo "No Results found";
        }
    }
    
    Conn->close();
    ///////////////////////////////////////// 
    ?>
</html>