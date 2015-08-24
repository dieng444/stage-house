$(document).ready(function(){
	
	var f_img_elmt = $("#img-container img").first(),
		//firstImage = {alt:f_img_elmt.attr('alt'), classe:f_img_elmt.attr('class'), src:f_img_elmt.attr('src')},
		totalImage = $("#img-container img").length,
		html = "";
	
	/****Insertion de la premiere image dans le slider***/
	$("#img-display-layout").css("background",'url(' + $("#img-container img").eq(0).attr('src') + ') no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)');
	$(".texte").html(f_img_elmt.next().html());
	/****Insertion des icônes de vignette dans le containeur de vignette en fonction du nombre d'images dans le slider***/
	$("#img-container img").each(function(){ html+= '<div class="vignette"></div>'; });
	$("#img-vignette-container").html(html);
	/***
	 * Functions permettant de déclencher l'animation du slider
	 * */
	function playSlider(time)
	{
		currentIndex= 1; /**L'interval d'affichage commence à la deuxième image**/
		
		globalVar = setInterval(function () { 
			
						$("#img-vignette-container div").each(function(){
							$(this).css("background",'url("../img/site/boule-slide.png") no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)');
						})
						$("#img-display-layout").css("background",'url(' + $("#img-container img").eq(currentIndex).attr('src') + ') no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)');
						$(".texte").html($("#img-container img").eq(currentIndex).next().html());
						$("#img-vignette-container div").eq(currentIndex).css("background",'url("../img/site/actif-slide.png") no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0)');
						currentIndex+=1;
						if( currentIndex > totalImage - 1 )
						{
							currentIndex=0;
						}
					}, time);
	}
	function showHideMenu()
	{
		$("#navigations").fadeToggle("slow","linear");
	}
	/***
	 * Functions permettant d'envoyer des requêtes ajax vers le serveur
	 * à la sélection d'un mot clé dans la liste déroulante des mots clés,
	 * ou d'une ville dans la liste déroulante des villes, ou les deux en même temps.
	 * */
	$("select").change(function()
	{
		var url = "../index.php",
			keyword = $("#key-word").val(),
			location = $("#location").val(),
			option = "";
		
		if(keyword!="" && keyword !="default-text")
		{
			option = keyword;
		}
		else if(location!="" && location!="default-text")
		{
			option = location;
		}
		else
			option = option;
		
		if(keyword !="default-text" && location !="default-text")
		{
			option = "";
			var kw = keyword,
				loc = location,
				isCombinaisonSearch = true;
				
		}
		
		if(option!="")
		{
			$.post(url,
					{
						filter : option
					},
					function(data,status){
						$("#offers-container").html("");
						$("#offers-container").html(data);
					});
		}
		else if(isCombinaisonSearch)
		{
			$.post(url,
					{
						keyword : kw,
						location : loc
					},
					function(data,status){
						$("#offers-container").html("");
						$("#offers-container").html(data);
					});
		}
		
	});
	/**
	 * Function permettant de gérer les formulaires
	 * @param form : le formulaire à valider
	 */
	function validateForm(form)
	{
		$(form).submit(function(event){
			
			var isErrorTrigger = false;
			
			$('.form-child').each(function(){
				
				if(($(this).attr('type')=="text" || $(this).get(0).nodeName=="TEXTAREA" 
					|| $(this).attr('type')=="password" || $(this).get(0).nodeName=="SELECT")
					&& $(this).val()=="")
				{
					$(this).next().show();
					isErrorTrigger = true;
				}
				else if($(this).val()!="")
				{
					$(this).next().hide();
				}
					
			});
			if(isErrorTrigger)
			{
				event.preventDefault();
			}
		});
	}
	
	/*****Appel aux functions*****/
	playSlider(3000);
	$("#icone-menu").bind('click',showHideMenu);
	validateForm("#add-offer-form");
	validateForm("#contact-form");
	validateForm("#login-form");
	validateForm("#signup-form");
});