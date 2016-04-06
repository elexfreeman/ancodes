function init_title(name) {
	var title  = [];
	$('div.frame').each(function() {
		 var new_el = $(this).find('.title').text();
		 title.push(new_el);
	});
	
	lastItem = title.length-1;
	for(find in title){
		if(title[find]==name) {
			var now = find;
			var now = parseInt(now);
			if (now==0){
				prev = title[lastItem];
				next = title[now+1];
			}
			else if (now==lastItem){
				prev = title[now-1];
				next = title[0];
			}
			
			else {
				prev = title[now-1];
				next = title[now+1];
			}
		}
	}
	window.location.hash = now;	
	$('.prev-text').html(prev);
	$('.next-text').html(next);
};

function init_id_next(id) {
	var title  = [];
	$('div.frame').each(function() {
		 var new_el = $(this).find('.title').text();
		 title.push(new_el);
	});

	lastItem = title.length-1;
	if (id==lastItem){id=0;}
	else {id=parseInt(id); id=id+1;}
	name = title[id];
	for(find in title){
		if(title[find]==name) {
			var now = find;
			var now = parseInt(now);
			if (now==0){
				prev = title[lastItem];
				next = title[now+1];
			}
			else if (now==lastItem){
				prev = title[now-1];
				next = title[0];
			}
			
			else {
				prev = title[now-1];
				next = title[now+1];
			}
		}
	}
	window.location.hash = now;
	$('.prev-text').html(prev);
	$('.next-text').html(next);	
};


function init_id_prev(id) {
	var title  = [];
	$('div.frame').each(function() {
		 var new_el = $(this).find('.title').text();
		 title.push(new_el);
	});

	lastItem = title.length-1;
	if (id==0){id=lastItem;}
	else {id=parseInt(id); id=id-1;}
	name = title[id];
	for(find in title){
		if(title[find]==name) {
			var now = find;
			var now = parseInt(now);
			if (now==0){
				prev = title[lastItem];
				next = title[now+1];
			}
			else if (now==lastItem){
				prev = title[now-1];
				next = title[0];
			}
			
			else {
				prev = title[now-1];
				next = title[now+1];
			}
		}
	}
	window.location.hash = now;	
	$('.prev-text').html(prev);
	$('.next-text').html(next);
};