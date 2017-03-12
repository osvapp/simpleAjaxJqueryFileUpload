<html>
	<head>
		<title>Ajax File Uploader Plugin For Jquery</title>
  <link href="ajaxfileupload.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="/js/jquery-1.9.2.min.js"></script-->
	<script type="text/javascript" src="/js/ajaxfileupload.js"></script>
	<script type="text/javascript">
	function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload(
			{
				url:'/home/account/upload/doajaxfileupload.php',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						} else
						{
							alert(data.msg);
							$('#ajaxreturn').html(data.msg);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
	</script>	
	<!--/head>

	<body>
<div id="wrapper">
    
    	
		<img id="loading" src="/images/loading.gif" style="display:none;">
		
		<table cellpadding="0" cellspacing="0" class="tableForm">
<form name="form" id="uploadform" action="" method="POST" enctype="multipart/form-data">
		
			<tr>
				<th>Please select a file and click Upload button</th>
			</tr>
			
			<tr>
				<td><input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input" /></td>			</tr>

		
				<tr>
					<!--td><input type="submit" id="uploadnow" name="Submitx" /></td>
					<td><input type="submit" class="modalInput" id="uploadnow" name="Submit" /></td-->
					<td><input type="button" class="modalInput" id="submitit" name="submit" value="Submit" /></td>
				</tr>
	</form>   
		<tr>
					<td id="ajaxreturn">return area</td>
				</tr>
		</table>
</div>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#submitit').click(function(e){
			e.preventDefault();
			alert('here');
			var upload = ajaxFileUpload();
		});
		$('#uploadform').submit(function(e){
			e.preventDefault();

		});
	});
	</script>

	</body>
</html>
	
	<?php exit;?>
