
<html>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
<body class="d-flex justify-content-center align-items-center bg-light">
	<div class="card p-3 shadow" style="max-width: 600px;min-width: 600px;">
		<h2 class="text-center p-3">Calculator</h2>
		<nav>
			<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
				<button class="nav-link " id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-home" aria-selected="true">History</button>
			</div>
		</nav>
		<div class="tab-content p-3 border bg-light" id="nav-tabContent" style="min-width: 550px; min-height: 300px;">
			<div class="tab-pane" id="nav-history" role="tabpanel" aria-labelledby="nav-home-tab">
			</div>
			<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php echo form_open(base_url().'/save',array('class' => '', 'id' => 'save_form', 'name' => 'save_form', 'accept-charset' => 'multipart/form-data'));?>
				<div class="row">
					<div class="col-12" >
						<input type="text" dir="rtl" id="display" name="display" class="form-control" readonly>
					</div>
					<div class="col-4 p-1" >
						<a id="btn-clear" class=" btn btn-info" style="width: 100%;">C</a>
					</div>
					<div class="col-5 p-1" >
						<a id="btn-del" class=" btn btn-danger" style="width: 100%;">DEL</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-divide" class="btn btn-warning" style="width: 100%;">/</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-seven" class="btn btn-secondary" style="width: 100%;">7</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-eight" class="btn  btn-secondary" style="width: 100%;">8</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-nine" class="btn  btn-secondary" style="width: 100%;">9</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-times" class="btn btn-warning" style="width: 100%;">x</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-four" class="btn  btn-secondary" style="width: 100%;">4</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-five" class="btn  btn-secondary"style="width: 100%;">5</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-six" class="btn  btn-secondary"style="width: 100%;">6</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-minus" class="btn btn-warning"style="width: 100%;">-</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-one" class="btn  btn-secondary"style="width: 100%;">1</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-two" class="btn  btn-secondary"style="width: 100%;">2</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-three" class="btn  btn-secondary"style="width: 100%;">3</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-plus" class="btn btn-warning"style="width: 100%;">+</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-zero" class="btn  btn-secondary"style="width: 100%;">0</a>
					</div>
					<div class="col-3 p-1" >
						<a id="btn-dot" class="btn  btn-secondary"style="width: 100%;">.</a>
					</div>
					<div class="col-6">
						<button type='submit' id="btn-equals" class="btn btn-success"style="width: 100%;">=</button>
					</div>
				</div>
                <?php echo form_close();?>
			</div>
			
		</div>
	</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"crossorigin="anonymous"></script>
<script src="https://malsup.github.io/jquery.form.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<script>

$( document ).ready(function() {
	//Function of buttons
	$(".btn").on("click", function(e){
		var id   = $(this).attr('id');
		if("btn-equals" != id){
			var input_val = $("#display").val();
			var text = $(this).text();
			if("btn-clear" == id){
				$("#display").val('');
			}else
			if("btn-times" == id){
				if(input_val){
					$("#display").val(input_val+"*");
				}
			}else
			if("btn-divide" == id || "btn-times" == id || "btn-minus" == id || "btn-plus" == id ){
				if(input_val){
					$("#display").val(input_val+""+$(this).text());
				}
			}else
			if("btn-del" == id){
				var lastChar = input_val[input_val.length -1];
				input_val = input_val.replace(lastChar, "");
				$("#display").val(input_val);
			}else
			if(input_val){
				$("#display").val(input_val+""+$(this).text());
			}else{
				$("#display").val($(this).text());
			}
		}
	});
	
	//Get Default history
	$.ajax({
			url: "<?php echo base_url()."/get";?>",
			type: "POST",
			success: function(data){
				var rslt = JSON.parse(data);
				if(rslt.success){
					var table_info    = "<table class='table'>"+ "<tr><th>Expression</th><th>Value</th><th>Action</th></tr>";
					$.each(rslt.data, function(i, value){
						$.each(JSON.parse( value.string), function(key, val){
							table_info    += "<tr><td id='"+value.id+"_expression'> "+key+"</td><td id='"+value.id+"_value'>"+val+"</td>";
						});
						table_info    += '<td><i class="fa-solid fa-pen-to-square" onclick = "edit_history(\''+value.id+'\')"></i><i class="fa-solid fa-trash-can"  onclick = "delete_history(\''+value.id+'\')"></i></td></tr>';
					});
					table_info += "</table>";
					$('#nav-history').html(table_info);
				}else{
					toastr.error(rslt.message);
				}
			}
	});

	//Saving the expression and values
	$("form[name='save_form']").on("submit", function(e){e.preventDefault();
		var display = $("#display").val();
		if(display){
			
			try {
				$.ajax({
				url: "<?php echo base_url()."/save";?>",
				type: "POST",
				data: {display:display},
				success: function(data){
					var rslt = JSON.parse(data);
					if(rslt.success){
						$('#display').val(rslt.value);
						
						var table_info    = "<table class='table'>"+ "<tr><th>Expression</th><th>Value</th><th>Action</th></tr>";
						$.each(rslt.data, function(i, value){
							$.each(JSON.parse( value.string), function(key, val){
								table_info    += "<tr><td id='"+value.id+"_expression'> "+key+"</td><td id='"+value.id+"_value'>"+val+"</td>";
							});
							table_info    += '<td><i class="fa-solid fa-pen-to-square" onclick = "edit_history(\''+value.id+'\')"></i><i class="fa-solid fa-trash-can"  onclick = "delete_history(\''+value.id+'\')"></i></td></tr>';
						 /*   table_info    += "<tr><td>"+value.file_name+"</td><td>"+value.message+"</td></tr>";
						   uploaded_file += value.file_name+","; */
						});
						table_info += "</table>";
						
						$('#nav-history').html(table_info);
						
						
					}else{
						toastr.error(rslt.message);
						$('#employees_salary_info').html('');
						$("#annexure_type").val('');
						$('#annexure_type').select2({allowClear: true,width: '100%'});
					}
				}
			});
			} catch (e) {
				if (e instanceof SyntaxError) {
					alert(e.message);
				}
			}
			
			
			
		}else{
			toastr["error"]("Enter the value and try again!");
		}
	});
});
	
//Edit the expression
function edit_history(id){
	var value      = $("#"+id+"_expression").html();
	$('#display').val(value);
	$('#nav-history-tab').removeClass('active');
	$('#nav-home-tab').addClass('active');
	$('#nav-history').removeClass('active show');
	$('#nav-home').addClass('active show');
}

//Delete the expression
function delete_history(id){
	$.ajax({
		url: "<?php echo base_url()."/delete";?>",
		type: "POST",
		data: {id:id},
		success: function(data){
			var rslt = JSON.parse(data);
			if(rslt.success){
				toastr.success(rslt.message);
				var table_info    = "<table class='table'>"+ "<tr><th>Expression</th><th>Value</th><th>Action</th></tr>";
				$.each(rslt.data, function(i, value){
					$.each(JSON.parse( value.string), function(key, val){
						table_info    += "<tr><td id='"+value.id+"_expression'> "+key+"</td><td id='"+value.id+"_value'>"+val+"</td>";
					});
					table_info    += '<td><i class="fa-solid fa-pen-to-square" onclick = "edit_history(\''+value.id+'\')"></i><i class="fa-solid fa-trash-can"  onclick = "delete_history(\''+value.id+'\')"></i></td></tr>';
				});
				table_info += "</table>";
				$('#nav-history').html(table_info);
			}else{
				toastr.error(rslt.message);
			}
		}
	});
}
</script>
</html>
