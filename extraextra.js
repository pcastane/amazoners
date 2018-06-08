
<script>
		function startUpload()
		{
			var id = setInterval(frame, 50);
			var percent = 1;
			$('.btnprogress').text('Continue')
			function frame() {
			if (percent >= 100) {
			  clearInterval(id);
			  $('.btnprogress').text('Close')
			} else {
			  percent++; 
			  $('.progress-bar').css('width', percent+'%').attr('aria-valuenow', percent); 
			}
		  }
		}
		
		function clickProgress()
		{
			var progress = $('.btnprogress').text();
			
			if(progress =='Continue')
			{
				window.open(window.location.href);
			}
			else	
			{
				 $('#myModal').modal('toggle');
			}			
		}
		
=======
<script>
		function startUpload()
		{
			var id = setInterval(frame, 50);
			var percent = 1;
			$('.btnprogress').text('Continue')
			function frame() {
			if (percent >= 100) {
			  clearInterval(id);
			  $('.btnprogress').text('Close')
			} else {
			  percent++; 
			  $('.progress-bar').css('width', percent+'%').attr('aria-valuenow', percent); 
			}
		  }
		}
		
		function clickProgress()
		{
			var progress = $('.btnprogress').text();
			
			if(progress =='Continue')
			{
				window.open(window.location.href);
			}
			else	
			{
				 $('#myModal').modal('toggle');
			}			
		}
		
