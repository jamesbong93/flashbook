<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "livesearch.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
	<div class=" nav navbar-nav navbar-right col-sm-3 col-md-3 col-xs-30">
				<form class="navbar-form" role="search">
				<div class="input-group">
					<input type="search" onkeyup="showHint(this.value)" class="form-control" placeholder="Search for books" name="q">
					<div class="input-group-btn">
						<button class="btn btn-default" ><i class="glyphicon glyphicon-search"></i></button>
					</div>

					
				</div>
				<br>
				<p><span id="txtHint"></span></p>
				</form>
	</div>

