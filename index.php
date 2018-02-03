<html>
<head>
	<title>Simple Pagination</title>
</head>
<body>
	<div id="content_result"></div>
	<div id="loading">Loading...</div>
	<button id="load_more" data-page="0">Load More</button>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			var load_content = function(page) {
				$.getJSON('connector.php', {
					page: page
				}, function(response) {
					$('#loading').hide();

					if (response.length > 0) $('#load_more').data('page', ($('#load_more').data('page') + 1));
					else $('#load_more').remove();

					var print = '';
					$.each(response, function(i, e) {
						print += '<h4>ID : '+e.id+'</h4>';
						print += '<h2>'+e.title+'</h2>';
						print += '<p>'+e.content+'</p>';
					});

					$('#content_result').append(print);
				});
			};

			load_content(0);
			$('#load_more').on('click', function(e) {
				e.preventDefault();
				$('#loading').show();

				load_content($(this).data('page'));
			});
		});
	</script>
</body>
</html>