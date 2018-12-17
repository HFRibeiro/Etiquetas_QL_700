<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/SC-14-512.png">

    <title>Etiquetas</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-switch.min.css" rel="stylesheet">


		<style>
		body {
		  padding-top: 50px;
		}
		.starter-template {
		  padding: 40px 15px;
		  text-align: center;
		}
		#print_area
		{

		}

		</style>

  </head>

  <body>

	    <div class="container">

				<h4>Product Print:</h4>
				<div class="form-group">
					<label for="reference_product">Product Reference:</label>
					<div class="input-group">
			    <input id="in_ref" type="text" class="form-control" style="margin-right:10px;" aria-describedby="ReferenceHelp" placeholder="Enter reference ex: ARD01001">
					<input  name="price" type="checkbox"  data-on-text="No Price" data-off-text="With Price"  data-on-color="warning" data-off-color="success" style="margin-left:10px;">
					<button id="create" type="button" class="btn btn-primary" style="min-width:40%; margin-left:10px;">Create</button>
				</div>
			  </div>

				<h4>Custom Printing:</h4>
				<label >Select paper size:</label>
				<select class="custom-select" id="size_paper">
				  <option selected value="50">50mm</option>
				  <option value="29">29mm</option>
				</select>

				<label >Font Picker</label>
				<select class="custom-select" id="font_picker">
					<option selected value="Helvetica">Helvetica</option>
					<option value="Arial">Arial</option>
					<option value="ArialB">Arial Bold</option>
					<option value="Times">Times</option>
					<option value="Times New Roman">Times New Roman</option>
					<option value="Courier">Courier</option>
					<option value="Courier New">Courier New</option>
					<option value="Verdana">Verdana</option>
					<option value="Tahoma">Tahoma</option>
					<option value="Arial Black">Arial Black</option>
					<option value="Comic Sans MS">Comic Sans MS</option>
					<option value="Impact">Impact</option>
					<option value="Georgia">Georgia</option>
					<option value="Palatino">Palatino</option>
				</select>

				<label >Size Picker</label>
				<select class="custom-select" id="size_picker">
					<option value="8px">8px</option>
					<option value="9px">9px</option>
					<option value="10px">10px</option>
					<option value="12px">12px</option>
					<option value="14px">14px</option>
					<option value="16px">16px</option>
					<option value="18px">18px</option>
					<option value="20px">20px</option>
					<option selected value="24px">24px</option>
					<option value="28px">28px</option>
					<option value="36px">36px</option>
					<option value="48px">48px</option>
					<option value="54px">54px</option>
					<option value="60px">60px</option>
					<option value="66px">66px</option>
					<option value="72px">72px</option>
					<option value="80px">80px</option>
					<option value="88px">88px</option>
					<option value="96px">96px</option>
				</select>


				<div class="form-group">
			    <label for="text_area">Example textarea</label>
			    <textarea class="form-control" id="text_area" rows="3"></textarea>
					<button type="button" class="btn btn-primary" style="width:100%; margin-top:10px;" id="preview">Preview</button>
			  </div>

				<div class="form-group">
					<h4 for="print_area">Print preview:</h4>
				<div id="print_area" style="border:1px solid gray; width:536px; height:278px; margin:auto;"></div>
					<div class="text-center">
						<a  class="btn btn-success" style="width:536px; color:white; margin-top:5px;" id="print">Print</a>
					</div>

				</div>

	    </div><!-- /.container -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-switch.min.js"></script>
		<script src="js/index.js?dummy=<?php echo rand(); ?>"></script>
  </body>
</html>
