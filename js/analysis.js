var isurls;
var num = 0;
var imgs = ["images/logo.png", "images/logo2.png", "images/logo3.png"]
var urls = ["https://jsap.attakids.com/?url=", "https://vip.parwix.com:4433/player/?url=", "https://okjx.cc/?url="];

function IsURL(word) {
	var regular =
		/^\b(((https?|ftp):\/\/)?[-a-z0-9]+(\.[-a-z0-9]+)*\.(?:com|edu|gov|int|mil|net|org|biz|info|name|museum|asia|coop|aero|[a-z][a-z]|((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]\d)|\d))\b(\/[-a-z0-9_:\@&?=+,.!\/~%\$]*)?)$/i
	if (regular.test(word)) {
		isurls = true;
	} else {
		isurls = false;
	}
}

function onSearch() {
	IsURL(txtWord.value);
	if (isurls == true) {
		window.location.href = urls[num] + txtWord.value;
	} else {
		window.location.href = "https://z1.m1907.cn/?jx=" + txtWord.value;
	}
}
document.addEventListener("keydown", function() {
	if (event.keyCode == 13) {
		onSearch();
	}
})

function update() {
	if (num < urls.length - 1) {
		num++;
	} else {
		num = 0;
	}
	document.getElementById("imgbox").src = imgs[num];
}
