@if (session('success'))
    <div id="successmsg" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('status'))
    <div id="successmsg" class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div id="failmsg" class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
@if (session('message'))
    <div id="successmsg" class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
@if (session('fail'))
    <div id="failmsg" class="alert alert-danger" role="alert">
        {{ session('fail') }}
    </div>
@endif

<script>
	window.setTimeout(function() {
	    $("#successmsg, #failmsg").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 3000);
</script>