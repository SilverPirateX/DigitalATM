		/*global console, alert, prompt*/
		var count = 
		(
			function()
			{
				var c=0;
				return function() {return c++;};
			}
		)();
		function clossesys()
		{
			document.body.div[id="sys"] = 
			{
			 display:none
			}
		}
		function counter()
		{
			if(count==3)
			{
				closesys();
			}

		}
