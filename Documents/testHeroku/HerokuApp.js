const puppeteer = require("puppeteer");
async function TestpuppeteerAuto24 (refPiece) {
	// User Agent + Plugin pour bypass captcha
	const StealthPlugin = require('puppeteer-extra-plugin-stealth')
	//var refPiece = "WHT001812"
	var refPiece = refPiece
	var tabData = []
	var baseUrl = "https://www.piecesauto24.com/rechercher?list=table&keyword="
	var Url = baseUrl + refPiece
	puppeteerStealth.use(StealthPlugin())
	const browser = await puppeteer.launch({ headless: false })
	const page = await browser.newPage()
	await page.setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36')
	await page.goto(Url)
	try{
		const result = await page.evaluate(() => {
			// On selectionne les informations qui nous interesse
			var selectPrice = document.querySelectorAll('td.price')
			var listPrice = [].slice.call(selectPrice);
			var price = listPrice.map(function(e) { return e.innerText; });
	
			// var selectStock = document.querySelectorAll('div.vers_box.green, div.vers_box.grey')
			// var listStock = [].slice.call(selectStock);
			// var stock = listStock.map(function(e) { return e.innerText; });
	
			var selectRef = document.querySelectorAll('td.ab')
			var listRef = [].slice.call(selectRef);
			var ref = listRef.map(function(e) { return e.innerText; });
	
			var selectDesc = document.querySelectorAll('td.title')
			var listDesc = [].slice.call(selectDesc);
			var desc = listDesc.map(function(e) { return e.innerText; });
			return {price,ref,desc} 
		})
		//await browser.close()
		var tabData = []
		for (var i = 0; i < result.price.length; i++){
			tabData[i] = {
				prix: result.price[i],
				ref: result.ref[i],
				desc: result.desc[i]
			};
		}
		console.log(tabData)
		 return tabData
	}
	catch {
		return false
	} 
	}