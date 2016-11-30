$(document).ready(function(){
	$("button.close").click(function(e){
		e.preventDefault();
		// $this.attr('data-dismiss')
		var dataDismiss = $(this).data('dismiss');

		// '.'+datadismiss devient '.alert'
		$(this).closest('.'+dataDismiss).remove();
	})
});