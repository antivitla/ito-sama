/*
	Project: Body Searcher
	Author & coder: Mr.Woodman

*/

// Settings
var bTypeTitle = new Array();
var bTypeTitleAlt = new Array();
var bTypeURL = new Array();
bTypeTitle[0] = "Мужчина";
bTypeTitleAlt[0] = "Мужчины";
bTypeURL[0] = "men.xml";
bTypeTitle[1] = "Женщина";
bTypeTitleAlt[1] = "Женщины";
bTypeURL[1] ="women.xml";

// Internal
var sizeTable;
var current = new Object();
current.bType = 0;
current.bHeight = 0;
current.bChest = 0;
current.bHip = 0;
current.bWaist = 0;
current.bName = "";
current.bNote = "";

// start from step 1
$(document).ready( function() {	
	
	var URLparams = location.href.split("?")[1]; // get parameters string from URL
		
	if(URLparams != undefined) // 1. start with URL params if present
	{
		getParams_FromURL(URLparams);
		doBodyFinderWork();
	}
	else // 2. Load user interface to choose size (no predefined params provided)
	{
		doStepOne();
	}	
});

function getParams_FromURL(str)
{
	current.bType = str.split("type=")[1].split("&")[0];
	current.bHeight = str.split("height=")[1].split("&")[0];
	current.bChest = str.split("chest=")[1].split("&")[0];
	current.bWaist = str.split("waist=")[1].split("&")[0];
	current.bHip = str.split("hip=")[1].split("&")[0];
	current.bName = getOptionalParam(str,"name=");
	current.bNote = getOptionalParam(str,"note=");
		
}
function getOptionalParam(s, k)
{
	var tmp = s.split(k)[1];
	if(tmp != undefined) tmp = tmp.split("&")[0];
	if(tmp != undefined) return decodeURIComponent(tmp)
	else return "";
}

function doBodyFinderWork()
{
	// warn user
	$("#page h1").html("Поиск типовой фигуры... (подождите немножко)");
	// show client's name
	if(current.bName != "" && current.bNote != "") $("#userData .userName").html(current.bName+": "+current.bNote+".");
	else if(current.bName != "") $("#userData .userName").html(current.bName);
	else if(current.bNote != "") $("#userData .userName").html(current.bNote);
	else {}
	
	// show client's name in title
	if(current.bName != "") $("head title").html("Размеры: "+current.bName);

	// get xml file we need and do step 5 
	// (last step - where occurs data extraction and displaying it in browser)
	$.get(bTypeURL[current.bType], {}, function(gostXML) {
			sizeTable = $("sizeTable", gostXML).eq(0);
			// do last step	
			doStepFive();
			}
	, "xml")
}

// Steps
function doStepOne()
{
	clearBodyClass();
	$("body").addClass("step-1");
	$("#step-1").html("");
	// iterate through array of body types (possible - men, women, girl, boy, pregnant, etc)
	for(var i = 0; i < bTypeTitle.length; i++)
	{
		// Name of link will be array index of appropriate type
		$("#step-1").append("<a href='#' name='"+i+"'>"+bTypeTitle[i]+"</a>");
		if(i+1 < bTypeTitle.length) $("#step-1").append(" ");
	}
	// 2. assign'em action
	$("#step-1 a[name]").click( function(e) {
		// load xml
		var bType = $(this).attr("name");
		$.get(bTypeURL[bType], {}, function(gostXML) {
					sizeTable = $("sizeTable", gostXML).eq(0);
					doStepTwo();
					}
			, "xml");
		current.bType = bType;
	});
}
function doStepTwo()
{
	clearBodyClass();
	$("body").addClass("step-2");
	doHeader();
	$("#step-2").html("<p class='height-choice'></p>");
	$("#step-2 .height-choice").append("Рост: ");
	// create anchors
	$("classifier[height]",sizeTable).each(function(){
		$("#step-2 .height-choice").append("<a href='#' name='"+$(this).attr("height")+"'>"+$(this).attr("height")+"</a>");
		if(this != $("classifier[height]:last",sizeTable).get(0)) $("#step-2 .height-choice").append(" ");
	});
	// assign action
	$("#step-2 .height-choice a[name]").click(function(){
		current.bHeight = $(this).attr("name");
		doStepThree();
	});
}

function doStepThree()
{
	clearBodyClass();
	$("body").addClass("step-3");
	doHeader();
	$("#step-3").html(bHeightInfo()+"<p class='chest-choice'></p>");
	$("#step-3 .chest-choice").append("Обхват груди: ");
	// create anchors
	$("classifier[height='"+current.bHeight+"'] classifier[chest]",sizeTable).each(function() {
		//
		$("#step-3 .chest-choice").append("<a href='#' name='"+ $(this).attr("chest") +"'>"+ $(this).attr("chest") +"</a>");
		if(this != $("classifier[height='"+current.bHeight+"'] classifier[chest]:last",sizeTable).get(0)) $("#step-3 .chest-choice").append(" ");
	});
	// assign action
	$("#step-3 .change-bHeight").click(function() { doStepTwo(); });
	$("#step-3 a[name]").click(function(){
		current.bChest = $(this).attr("name");
		doStepFour();
	});
}
function doStepFour()
{
	clearBodyClass();
	$("body").addClass("step-4");
	doHeader();
	$("#step-4").html(bHeightInfo()+bChestInfo()+"<p class='waisthip-choice'></p>");
	$("#step-4 .waisthip-choice").append("Обхват талии/бёдер: ");
	// create anchors
	var hips =
	$("classifier[height='"+current.bHeight+"'] classifier[chest='"+current.bChest+"'] person[hip]",sizeTable).each(function(){
		//
		$("#step-4 .waisthip-choice").append("<a href='#' name='"+$(this).attr("hip")+"'>"+$(this).attr("waist")+" / " +$(this).attr("hip")+"</a>");
		if(this != $("classifier[height='"+current.bHeight+"'] classifier[chest='"+current.bChest+"'] person[hip]:last",sizeTable).get(0)) $("#step-4 .waisthip-choice").append(" ");
	});
	// assign action
	$("#step-4 .change-bHeight").click(function() { doStepTwo(); });
	$("#step-4 .change-bChest").click(function() { doStepThree(); } );
	$("#step-4 a[name]").click(function() {
		current.bHip = $(this).attr("name");
		current.bWaist=$("classifier[height='"+current.bHeight+"'] classifier[chest='"+current.bChest+"'] person[hip='"+current.bHip+"']",sizeTable).attr("waist");		
		doStepFive();
	});

}
function doStepFive()
{
	//
	clearBodyClass();
	$("body").addClass("step-5");
	doHeader();
	$("#step-5").html(bHeightInfo()+bChestInfo()+bWaistHipInfo());
	$("#step-5").append("<br /><br /><small></small>");
	var i = 0;
	
	// output
	initBodyTable();
	$("classifier[height='"+current.bHeight+"'] classifier[chest='"+current.bChest+"'] person[hip='"+current.bHip+"'] size",sizeTable).each(function(){
		// insert value if value cell present
		if($(".value"+i).length != 0) 
		{
			$(".value"+i).html($(this).text());
		}
		i++;
	});
	$("body").addClass("final");
	// assign action
	$("#step-5 .change-bHeight").click(function() { doStepTwo(); });
	$("#step-5 .change-bChest").click(function() { doStepThree(); } );
	$("#step-5 .change-bWaistHip").click(function() { doStepFour(); } );

}

// additional helper funcs
function doHeader()
{
	$("#page h1").html(bTypeInfo());
	$(".change-bType").click(function() { doStepOne(); });
}

function initBodyTable()
{
	// create 9 value groups if not present
	for(var k = 2; k <= 9; k++)
	{
		if($("#vGroup"+k).length == 0)
		{
			$("#vGroup1").clone().attr("id","vGroup"+k).insertAfter("#sizeTable #vGroup"+String(k-1));
		}
	}

	initRanges();
	// choose body type layout
	clearSizeTableClass();
	switch(current.bType)
	{
		case "0":
			$("#sizeTable").addClass("man");
			break;
		case "1":
			$("#sizeTable").addClass("woman");
			$("#vGroup7 .to").html("58");
			break;
	}

	initValueGroups();
}
function initRanges()
{
	// insert range values
	$("#vGroup1 .from").html("1");
	$("#vGroup1 .to").html("12");
	$("#vGroup2 .from").html("13");
	$("#vGroup2 .to").html("19");
	$("#vGroup3 .from").html("20");
	$("#vGroup3 .to").html("27");
	$("#vGroup4 .from").html("28");
	$("#vGroup4 .to").html("38");
	$("#vGroup5 .from").html("39");
	$("#vGroup5 .to").html("44");
	$("#vGroup6 .from").html("45");
	$("#vGroup6 .to").html("48");
	$("#vGroup7 .from").html("49");
	$("#vGroup7 .to").html("51");
	$("#vGroup8 .from").html("52");
	$("#vGroup8 .to").html("58");
}

function initValueGroups()
{
	$(".vGroup").each(function() {
		//
		var vStart = 1 * $(this).find(".from").html();
		var vEnd = 1 * $(this).find(".to").html();
		// add value cells
		for(var i = vStart; i <= vEnd; i++)
		{

			if($(this).find(".value"+i).length == 0 && $(this).css("display") == "block")
			{
				$(this).find(".values").append("<dd>"+i+"</dd><dt class='value"+i+"'>-</dt>");
			}
		}
	});
}

function bTypeInfo() { return String("Типовая фигура "+String(bTypeTitleAlt[current.bType]).toLowerCase()+" (<a href='#' class='change-bType'>изменить</a>)"); }
function bHeightInfo() { return String("<p class='info'>Рост: <strong>"+current.bHeight+"</strong> (<a href='#' class='change-bHeight'>изменить</a>)</p>"); }
function bChestInfo() { return String("<p class='info'>Обхват груди: <strong>"+current.bChest+"</strong> (<a href='#' class='change-bChest'>изменить</a>)</p>"); }
function bWaistHipInfo() { return String("<p class='info'>Обхват талии/бёдер: <strong>"+current.bWaist+" / "+current.bHip+"</strong> (<a href='#' class='change-bWaistHip'>изменить</a>)</p>"); }

function clearBodyClass() { $("body").removeClass("final").removeClass("step-1").removeClass("step-2").removeClass("step-3").removeClass("step-4").removeClass("step-5"); }
function clearSizeTableClass() { $("#sizeTable").removeClass("man").removeClass("woman").removeClass("boy").removeClass("girl"); }