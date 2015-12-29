<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Projects</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php
include('Simple_php/simple_html_dom.php');
$spans = array();
//$html = new simple_html_dom();
$html = file_get_html("http://nemo.sonarqube.org");
foreach($html->find('span') as $techdebratio)
{
	$spans[] = $techdebratio;
	foreach ($techdebratio->find('span[id="m_sqale_debt_ratio"]') as $techdeb)
	{
		foreach($techdeb->find('span[id="m_sqale_index"]') as $techdebt)
		{
			foreach($techdebt->find('a') as $line)
			{
				$spans[] = $line->removeAttribute('href');
			}
		}
	}
}
?>

<div class="page-header text-center text-danger"><strong><h1>All Projects</h1></strong></div>
<div class="row"><div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;"class="btn btn-danger btn-lg" data-toggle="modal" data-target=".bs-example3-modal-lg">
  <h1>SQALE Rating <mark style="background-color:green;color:white;"><?php echo $spans[5]; ?></mark></h1>
</button></div><div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;"class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">
  <h1>Techdebt Ratio <?php echo $spans[8]; ?></h1>
</button></div><div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;" class="btn btn-info btn-lg" data-toggle="modal" data-target=".bs-example1-modal-lg">
 <h1>Techdebt <?php echo $spans[11]; ?></h1>
</button></div></div><br/>
<div class="row">
<div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;" class="btn btn-success btn-lg" data-toggle="modal" data-target=".bs-example2-modal-lg">
  <h1>LinesOfCode <?php echo $spans[14]; ?></h1>
</button>
</div>
<div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#">
  <h1>Issues <?php echo $spans[20]; ?></h1>
</button>
</div>
<div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;background-color:#9900cc;color:white" class="btn btn-lg" data-toggle="modal" data-target="#">
  <h1>Blocker <?php echo $spans[21]; ?></h1>
</button>
</div>
</div><br/>
<div class="row">
<div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;background-color:#993300;color:white" class="btn btn-lg" data-toggle="modal" data-target="#">
  <h1>Critical <?php echo $spans[22]; ?></h1>
</button>
</div>
<div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;background-color:#999999;color:white" class="btn btn-lg" data-toggle="modal" data-target="#">
  <h1>Major <?php echo $spans[23]; ?></h1>
</button>
</div>
<div class="col-md-4">
<button type="button" style="border-radius:0px;height:150px;width:370px;background-color:#996633;color:white" class="btn btn-lg" data-toggle="modal" data-target="#">
  <h1>Minor <?php echo $spans[24]; ?></h1>
</button>
</div>
</div>


<!-- Modal -->
<div class="modal fade bs-example3-modal-lg" style="background-color:#ff8080;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-danger" id="myModalLabel">SQALE Rating</h4>
      </div>
      <div class="modal-body" style="background-color:#ff8080;">
        	<?php include("Rating/Rating.php"); ?>
        	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" style="background-color:#6666ff;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="myModalLabel">Techdebt Ratio</h4>
      </div>
      <div class="modal-body" style="background-color:#6666ff;">
        	<?php include("Techdebt_Ratio/Techdebt_Ratio.php"); ?>
        	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example1-modal-lg bg-info" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-info" id="myModalLabel">Techdeb</h4>
      </div>
      <div class="modal-body bg-info">
        <?php include("Techdebt/Techdebt.php"); ?>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example2-modal-lg bg-success" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success" id="myModalLabel">LinesOfCode</h4>
      </div>
      <div class="modal-body bg-success">
       	<?php include("Lines_Of_Code/Lines_Of_Code.php"); ?>
       	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
</div>
</html>
