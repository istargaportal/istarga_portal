console.log('working')

let data = {}
let dataToShow = {}

const preview = document.querySelector(".preview-modal")
const previewCancel = document.querySelectorAll(".preview-btns button[type='button']")[1]
const previewBtn = document.querySelector("#preview")
// const previewCancel = document.querySelector("#preview-cancel")
const tbody = document.querySelector(".preview-modal tbody")


const addClientSubmit = document.querySelector('#ajax button'),
	inputFields = document.querySelectorAll('#ajax input:not([type="radio"] )'),
	inputFieldsArray = [...inputFields],
	inputRadios = document.querySelectorAll('#ajax input[type="radio"]'),
	inputRadiosArray = [...inputRadios],
	inputCheckbox = document.querySelectorAll('#ajax input[type="checkbox"]'),
	inputCheckboxArray = [...inputCheckbox],
	select = document.querySelectorAll('#ajax select:not([multiple])'),
	selectArray = [...select],
	textarea = document.querySelector('#ajax textarea')

const getFormData = () => {
	inputFieldsArray ? inputFieldsArray.map((value) => {
		data[value.name] = value.value
		value.getAttribute('data-name') ? (dataToShow[value.getAttribute('data-name')] = value.value ) : false
	}) : false
	inputRadiosArray ? inputRadiosArray.map((value) => {
		
		let checked
		if (value.checked) {
			checked = value.value
			data[value.name] = checked
			dataToShow[value.getAttribute('data-name')] = checked 
		}
	}) : false
	inputCheckboxArray ? inputCheckboxArray.map((value) => {
		let checked = 0

		if (value.checked === true) {
			checked = 1
		}
		data[value.name] = checked
		console.log(checked)
		dataToShow[value.getAttribute('data-name')] = checked == 1 ? "Yes" : "No"

	}) : false
	selectArray ? selectArray.map(value => {
		console.log(value.name)

		data[value.name] = value.value
		value.options[value.selectedIndex] ? 	dataToShow[value.getAttribute('data-name')] = value.options[value.selectedIndex].text : false
	}) : false
	var selected = [];
	for (var option of document.getElementById('exampleFormControlSelect5').options) {
		if (option.selected) {
			selected.push(option.value);
		}
	}
	data["document_list_view"] = selected
	dataToShow["Document List View"] = selected
	// inputCurrency ? data["currency"] = inputCurrency.value : false
	textarea ? data["comments"] = textarea.value : false
	textarea ? dataToShow["comments"] = textarea.value : false

	console.log(data)
}

const previewAppear = (e) => {
	e.preventDefault()
	preview.classList.add("active")
	getFormData()
	tbody.innerHTML = ''
	console.log(dataToShow)
	for (let x in dataToShow) {
		console.log("dataToShow", x, dataToShow[x])
		tbody.innerHTML += `
			<tr>
				<td style="color: #3C4858 !important">${x}</td>
				<td style="color: #3C4858 !important">${dataToShow[x]}</td> 
			</tr>
		`
	}
}

// const submit = (url) => {
// 	return e => {
// 		e.preventDefault()

// 		sendRequest(url)

// 		data = {}
// 	}
// }



previewBtn.addEventListener("click", previewAppear)
previewCancel.addEventListener("click", () => {
	console.log('cancel')
	preview.classList.remove("active")
})

console.log("working 2")


// cxvnvmc
const inpfile = document.getElementById('filexzc');
let form = document.getElementById('ajax')
let placeOrder = document.querySelector("#place-order")
placeOrder.onclick = (e) => {
	e.preventDefault()
	// form.submit()
	document.getElementById("ok").click()
}
form.addEventListener('submit', function (e) {
	e.preventDefault();
	// const formdata = new FormData(this);

	// for (const file of inpfile.files) {
	// 	formdata.append("myfiles[]", file);
	// }	
	getFormData()
	console.log(data)
	fetch('./API/createorder.php', {
			method: 'post',
			body: JSON.stringify(data)
		})
		.then(function (response) {
			return response.text();
		}).then(function (text) {
			//	console.log(text);
			if (text == "1") {
				alert("Successfully Submitted");
				location.reload()
				//	window.location.href="Dashboard.php";
			} else {
				// console.log("laad chat liye");
			}
		})
		.catch(console.error);

});

console.log("working all")


$(document).ready(function () {
	$().ready(function () {
		$sidebar = $('.sidebar');

		$sidebar_img_container = $sidebar.find('.sidebar-background');

		$full_page = $('.full-page');

		$sidebar_responsive = $('body > .navbar-collapse');

		window_width = $(window).width();

		$('.fixed-plugin a').click(function (event) {
			// Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
			if ($(this).hasClass('switch-trigger')) {
				if (event.stopPropagation) {
					event.stopPropagation();
				} else if (window.event) {
					window.event.cancelBubble = true;
				}
			}
		});

		$('.fixed-plugin .active-color span').click(function () {
			$full_page_background = $('.full-page-background');

			$(this).siblings().removeClass('active');
			$(this).addClass('active');

			var new_color = $(this).data('color');

			if ($sidebar.length != 0) {
				$sidebar.attr('data-color', new_color);
			}

			if ($full_page.length != 0) {
				$full_page.attr('filter-color', new_color);
			}

			if ($sidebar_responsive.length != 0) {
				$sidebar_responsive.attr('data-color', new_color);
			}
		});

		$('.fixed-plugin .background-color .badge').click(function () {
			$(this).siblings().removeClass('active');
			$(this).addClass('active');

			var new_color = $(this).data('background-color');

			if ($sidebar.length != 0) {
				$sidebar.attr('data-background-color', new_color);
			}
		});

		$('.fixed-plugin .img-holder').click(function () {
			$full_page_background = $('.full-page-background');

			$(this).parent('li').siblings().removeClass('active');
			$(this).parent('li').addClass('active');


			var new_image = $(this).find("img").attr('src');

			if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
				$sidebar_img_container.fadeOut('fast', function () {
					$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
					$sidebar_img_container.fadeIn('fast');
				});
			}

			if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
				var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

				$full_page_background.fadeOut('fast', function () {
					$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
					$full_page_background.fadeIn('fast');
				});
			}

			if ($('.switch-sidebar-image input:checked').length == 0) {
				var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
				var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

				$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
				$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
			}

			if ($sidebar_responsive.length != 0) {
				$sidebar_responsive.css('background-image', 'url("' + new_image + '")');
			}
		});

		$('.switch-sidebar-image input').change(function () {
			$full_page_background = $('.full-page-background');

			$input = $(this);

			if ($input.is(':checked')) {
				if ($sidebar_img_container.length != 0) {
					$sidebar_img_container.fadeIn('fast');
					$sidebar.attr('data-image', '#');
				}

				if ($full_page_background.length != 0) {
					$full_page_background.fadeIn('fast');
					$full_page.attr('data-image', '#');
				}

				background_image = true;
			} else {
				if ($sidebar_img_container.length != 0) {
					$sidebar.removeAttr('data-image');
					$sidebar_img_container.fadeOut('fast');
				}

				if ($full_page_background.length != 0) {
					$full_page.removeAttr('data-image', '#');
					$full_page_background.fadeOut('fast');
				}

				background_image = false;
			}
		});

		$('.switch-sidebar-mini input').change(function () {
			$body = $('body');

			$input = $(this);

			if (md.misc.sidebar_mini_active == true) {
				$('body').removeClass('sidebar-mini');
				md.misc.sidebar_mini_active = false;

				$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

			} else {

				$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

				setTimeout(function () {
					$('body').addClass('sidebar-mini');

					md.misc.sidebar_mini_active = true;
				}, 300);
			}

			// we simulate the window Resize so the charts will get updated in realtime.
			var simulateWindowResize = setInterval(function () {
				window.dispatchEvent(new Event('resize'));
			}, 180);

			// we stop the simulation of Window Resize after the animations are completed
			setTimeout(function () {
				clearInterval(simulateWindowResize);
			}, 1000);

		});
	});
});

/*On Add Button Click*/

$(document).ready(function () {
	$('#chooseanother').click(function () {

		$('#chooseone').toggle("slide");

	});

});


/* Form Submission */





/* Get Country*/
let dropdown = document.getElementById('locality-dropdown');
dropdown.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = 'Choose Country';
defaultOption.value = '0';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

const url = './API/country.php';

fetch(url)
	.then(
		function (response) {
			if (response.status !== 200) {
				console.warn('Looks like there was a problem. Status Code: ' +
					response.status);
				return;
			}

			// Examine the text in the response  
			response.json().then(function (data) {
				let option;

				for (let i = 0; i < data.length; i++) {
					option = document.createElement('option');
					option.text = data[i].country_name;
					option.value = data[i].id;
					dropdown.add(option);
				}
			});
		}
	)
	.catch(function (err) {
		console.error('Fetch Error -', err);
	});

let package = document.getElementById('package-dropdown');
package.length = 0;

let defaultpackage = document.createElement('option');
defaultpackage.text = 'Choose Package';
defaultpackage.value = '0';

package.add(defaultpackage);
package.selectedIndex = 0;

function getpackage(x) {
	const id = {
		country_id: x,
	};
	fetch('./API/package.php', {
		method: 'post',
		body: JSON.stringify(id),
		headers: {
			'Content-type': 'application/json'
		}
	}).then(function (response) {
		return response.text();
	}).then(function (text) {
		// console.log(text);

		let stat = JSON.parse(text);
		var wrap = document.getElementById('package-dropdown')
		while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
		let option;

		for (let i = 0; i < stat.length; i++) {
			option = document.createElement('option');
			option.text = stat[i].package_name;
			option.value = stat[i].id;
			package.add(option);
		}

	}).catch(function (error) {
		console.error(error);
	})

}


// LOB TYPE
let lob_type = document.getElementById('lob_type');
lob_type.length = 0;

let defaultlob = document.createElement('option');
defaultlob.text = 'Choose LOB TYPE';
defaultlob.value = '0';


lob_type.add(defaultlob);
lob_type.selectedIndex = 0;

fetch('./API/lob_type.php')
	.then(
		function (resp) {
			if (resp.status !== 200) {
				console.warn('Looks like there was a problem. Status Code: ' +
					resp.status);
				return;
			}

			// Examine the text in the response  
			resp.json().then(function (da) {
				let opti;

				for (let a = 0; a < da.length; a++) {
					opti = document.createElement('option');
					opti.text = da[a].lob_type;
					opti.value = da[a].id;
					lob_type.add(opti);
				}
			});
		}
	)
	.catch(function (err) {
		console.error('Fetch Error -', err);
	});

//this is select service sec

let country = document.getElementById('select-country-service');
country.length = 0;

let defaultcountry = document.createElement('option');
defaultcountry.text = 'Choose Country';
defaultcountry.value = '0';

country.add(defaultcountry);
country.selectedIndex = 0;

fetch('./API/country.php')
	.then(
		function (respo) {
			if (respo.status !== 200) {
				console.warn('Looks like there was a problem. Status Code: ' +
					respo.status);
				return;
			}

			// Examine the text in the response  
			respo.json().then(function (dat) {
				let optio;

				for (let j = 0; j < dat.length; j++) {
					optio = document.createElement('option');
					optio.text = dat[j].country_name;
					optio.value = dat[j].id;
					country.add(optio);
				}
			});
		}
	)
	.catch(function (err) {
		console.error('Fetch Error -', err);
	});

let servicetype = document.getElementById('select_service_type');
servicetype.length = 0;

let defaultservicetype = document.createElement('option');
defaultservicetype.text = 'Choose Service Type';
defaultservicetype.value = "0";

servicetype.add(defaultservicetype);
servicetype.selectedIndex = 0;

function getservice(x) {
	const id = {
		country_id: x,
	};
	fetch('./API/servicetype.php', {
		method: 'post',
		body: JSON.stringify(id),
		headers: {
			'Content-type': 'application/json'
		}
	}).then(function (response) {
		return response.text();
	}).then(function (text) {
		//	console.log(text);

		let stat = JSON.parse(text);
		var wrap = document.getElementById('select_service_type')
		while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
		let option;

		for (let i = 0; i < stat.length; i++) {
			option = document.createElement('option');
			option.text = stat[i].service_type;
			option.value = stat[i].id;
			servicetype.add(option);
		}

	}).catch(function (error) {
		console.error(error);
	})

}

let servicename = document.getElementById('select_service_name');
servicename.length = 0;

let defaultservicename = document.createElement('option');
defaultservicename.text = 'Choose Service Name';
defaultservicename.value = '0';

servicename.add(defaultservicename);
servicename.selectedIndex = 0;

function getservicename(x) {
	const id = {
		service_type_id: x,
	};
	fetch('./API/servicename.php', {
		method: 'post',
		body: JSON.stringify(id),
		headers: {
			'Content-type': 'application/json'
		}
	}).then(function (response) {
		return response.text();
	}).then(function (text) {
		console.log(text);

		let stat = JSON.parse(text);
		var wrap = document.getElementById('select_service_name')
		while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
		let option;

		for (let i = 0; i < stat.length; i++) {
			option = document.createElement('option');
			option.text = stat[i].service_name;
			option.value = stat[i].id;
			servicename.add(option);
		}

	}).catch(function (error) {
		console.error(error);
	})

}

let documentname = document.getElementById('documentlist');
documentname.length = 0;

let defaultdocumentname = document.createElement('option');
defaultdocumentname.text = 'Choose Document Name';
defaultdocumentname.value = '0';
defaultdocumentname.style = "margin-top:9%;";

documentname.add(defaultdocumentname);
documentname.selectedIndex = 0;

function getdocumentlist(d) {
	//console.log(d);
	const id = {
		service_id: d,
	};
	fetch('./API/getdocumentlist.php', {
		method: 'post',
		body: JSON.stringify(id),
		headers: {
			'Content-type': 'application/json'
		}
	}).then(function (response) {
		return response.text();
	}).then(function (text) {
		console.log(text);

		let stat = JSON.parse(text);
		var wrap = document.getElementById('documentlist')
		while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
		let option;

		for (let i = 0; i < stat.length; i++) {
			option = document.createElement('option');
			option.text = stat[i].document_name;
			option.value = stat[i].id;
			option.style = "margin-top:9%;";
			documentname.add(option);
		}
	})
}



