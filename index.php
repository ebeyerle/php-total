<?php
session_start();
require_once'helpers/security.php';
$errors=isset($_SESSION['errors'])?$_SESSION['errors']:[];
$fields=isset($_SESSION['fields'])?$_SESSION['fields']:[];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Balance </title>
    
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
		
		<script>
			var grand_total = 10e8;
			window.isEmbedded = window.self !== window.top;

			document.addEventListener("DOMContentLoaded", () => {
					// pull the data
					fetchData();

					// base of the chart
					document
							.getElementById("xxx")
							.setAttribute("d", describeArc(100, 100, 100, 0, 270));
			});

			const fetchData = () => {
					fetch(
							"https://permissionio-widget.s3.amazonaws.com/Permission_Treasury_Wallet_Balances.json?t=" +
									Date.now()
					)
							.then((res) => res.json())
							.then((res) => {
									// re
									render(res);
									// res
							});
			};

			const render = (data) => {
					//


					const balance_total = data["Total"].balance;
					 console.log(balance_total);

					const ratio = (balance_total / grand_total) * 100;
					document.querySelector(".total").innerText = balance_total;


					if (isEmbedded) {
							// send size to parent frame
							window.top.postMessage(
									{
											action: "iframeResize",
											height: document.body.scrollHeight,
											// width: document.body.scrollWidth,
									},
									"*"
							);
					}
			};

			const numberFormat = (string) => {
					if (string == null) return 0;
					return new Intl.NumberFormat("en-US", {
							style: "decimal",
					}).format(string.toString());
			};
		</script>
    
  </head>
  <body>

		<div class="total">        
    </div>

  </body>
</html>
<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>
