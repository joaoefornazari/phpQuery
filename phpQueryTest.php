<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>phpQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="manual.css">
    <script>

			async function start() {
				const headerContent = await $.get('./phpContent.php?req=getHeader');
				const bodyContent = await $.get('./phpContent.php?req=getBody');

				await $('#header-div').html(headerContent);
				await $('#content-div').html(bodyContent);
			}

			start();

		</script>
  </head>
  <body style="text-align: center;">

  <div id="main-body-div" style="width: 50%;">

    <div id="header-div">
    </div>

    <div id="content-div">
    </div>
  </div>

  </body>
</html>