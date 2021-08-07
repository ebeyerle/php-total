<?php
session_start();
require_once'helpers/security.php';
$errors=isset($_SESSION['errors'])?$_SESSION['errors']:[];
$fields=isset($_SESSION['fields'])?$_SESSION['fields']:[];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta charset="UTF-8">
    <title>Example</title>
    <style>
      body
      {
        padding: 0px;
        margin: 0px;
        overflow: hidden;
      }

      .centeredContent
      {
          position:relative;
          text-align:center;
          padding-top: 25px;
      }

      .buttonGap
      {
          margin: 5px;
      }

    </style>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
  </head>
  <body>



  <div class="centeredContent">

    <?php
			$api_url = 'https://permissionio-widget.s3.amazonaws.com/Permission_Treasury_Wallet_Balances.json?t=1627667637030';

			// Read JSON file
			$json_data = file_get_contents($api_url);

			// Decode JSON data into PHP array
			$response_data = json_decode($json_data);

			// All user data exists in 'data' object
			$balance_data = $response_data->data;

			// Cut long data into small & select only first 10 records
			echo "Total - ".$balance_data->Total;

			// Print data if need to debug
			//print_r($user_data);

			// Traverse array and display user data
			
    ?>


  </div>

  </body>
</html>
<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>
