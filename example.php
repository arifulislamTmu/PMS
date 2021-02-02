	abcd
		<button id="print" class="botoon">Print Invoice</button>

	<script src="jquery.min.js"></script>
	<script src="printThis.js"></script>
	<script>
	$('#print').click(function(){
	  $('.container').printThis();
	})
	</script>