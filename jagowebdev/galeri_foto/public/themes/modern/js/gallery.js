$(document).ready(function() 
{
	if ($('#result').length > 0) 
	{
		var counter = 0;
		var items = {};
		var $result = $('#result').empty(),
			$spinner = $('<div class="fa-2x loader" id="spinner"><i class="fas fa-circle-notch fa-spin me-2"></i>Loading...</div>').prependTo($result),
			$ul = $('<ul class="gallery-foto spotlight-group" data-fit="cover" data-autohide="all"></ul>').appendTo($result);
			
		$spinner.css('margin-left',  ($spinner.outerWidth()/2) * -1);
		$counter = $('<span class="text-counter"></span>').appendTo($spinner);
		
		$('.gallery-foto').masonry({
		  // options
		  itemSelector: '.masonry-item',
		  isAnimated: true,
		  columnWidth: 20
		});
		
		function loadImages() 
		{
		  item = items[counter];
		  $img = $('<img alt="'+ item.title +'"/>');
		  $img.on('load', function(){
		   /*  li = '<li class="masonry-item">' + 
					'<a href="' + item.image_url + '" target="blank" title="' + item.caption + '">' +
					  '<span>'+ item.title + '</span>' +
					'</a>' + 
				  '</li>'; */
			$link = $('<a class="spotlight" data-description="' + item.description + '" data-fit="contain" href="' + item.image_url + '" target="blank" title="' + item.title + '">');
			$link.append($img);
			$link.append('<span class="title">'+ item.title + '</span>');
			$li = $('<li>').addClass('masonry-item').append($link);
			
			$li.appendTo($ul);
			img_width = $link.children('img').outerWidth();
			$link.find('span').css('max-width', img_width).addClass('mt-2');
			
			$ul.masonry('appended', $li);
			$li.hide();
			$li.fadeIn('fast', function() {
			 
			  if (counter < imgLength - 1) {
				counter++;
				$counter.html(counter + '/' + imgLength);
				// if (counter == 19)
					// return;
				loadImages();
			  } else {
				$spinner.fadeOut('fast', function(){$(this).remove()});
			  }
			})
		  }).attr('src',  item.thumbnail.url);      
		}

	   items = JSON.parse($('#list-gallery').html());
	   imgLength = items.length;
	   loadImages();
	}
});