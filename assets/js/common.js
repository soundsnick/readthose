function animatedLink(elementClass, lastClass, animationType, link){
	$(elementClass).removeClass(lastClass);
	$(elementClass).addClass('animated ' + animationType);
	function goToLink(){
		location.href = link;
	}
	setTimeout(goToLink, 500);
}