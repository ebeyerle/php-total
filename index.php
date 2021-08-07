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
    <button type="button" class="btn buttonGap btn-primary">Primary</button>
  </div>


  <div class="centeredContent">

    <?php

      // run this test with a local server of your choice.
      // For windows you can use: https://www.apachefriends.org/index.html
      // for mac you can use: https://www.mamp.info/en/mamp/mac/

      // key = caption, value = css class
      $buttons = array(
        "Success" => "btn-success",
        "Danger" => "btn-danger",
      );
						
			//Loops through the $buttons array and creates a new button for each item in the array
			foreach($buttons as $caption => $cssClass){
				$button = new Button($caption, $cssClass);
				$button -> displayButton();
			}
			
      // loop through the $buttons array
      // using a custom php class you defined, output 2 buttons on the page using the defined caption and css class in $buttons
      // the result should look like the provided image in folder.
			
    ?>


  </div>

  </body>
</html>

<?php

// define your php class below
// name it "Button"
class Button {
	private ?string $caption;
	private ?string $cssClass;
	
	public function __construct(?string $caption, ?string $cssClass) {
		$this->caption  = $caption;
		$this->cssClass = $cssClass;
	}
	
	public function displayButton() {
		echo "<button type=\"button\" class=\"btn buttonGap ".$this->cssClass."\">".$this->caption."</button>";
	}
}

?>
<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>
