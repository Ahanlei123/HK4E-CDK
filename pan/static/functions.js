/**
 * PanDownload 网页复刻版，JS函数文件
 *
 * 许多函数来源于github，详见项目里的Thanks
 *
 * @author Yuan_Tuo <yuantuo666@gmail.com>
 * @link https://imwcr.cn/
 * @link https://space.bilibili.com/88197958
 *
 */
function validateForm() {
	var input = document.forms["form1"]["surl"];
	var link = input.value;
	if (link == null || link === "") { input.focus(); Swal.fire("提示", "请填写分享链接", "info"); return false; }
	var uk = link.match(/uk=(\d+)/), shareid = link.match(/shareid=(\d+)/);
	if (uk != null && shareid != null) {
		input.value = "";
		$("form").append(`<input type="hidden" name="uk" value="${uk[1]}"/><input type="hidden" name="shareid" value="${shareid[1]}"/>`);
		return true;
	}
	var surl = link.match(/surl=([A-Za-z0-9-_]+)/);
	if (surl == null) {
		surl = link.match(/1[A-Za-z0-9-_]+/);
		if (surl == null) {
			input.focus(); Swal.fire("提示", "分享链接填写有误，请检查", "info"); return false;
		} else surl = surl[0];
	} else surl = "1" + surl[1];
	input.value = surl;
	return true;
}
function dl(fs_id, timestamp, sign, randsk, share_id, uk) {
	var form = $('<form method="post" action="?download" target="_blank"></form>');
	form.append(`<input type="hidden" name="fs_id" value="${fs_id}"/><input type="hidden" name="time" value="${timestamp}"/><input type="hidden" name="sign" value="${sign}"/>
		<input type="hidden" name="randsk" value="${randsk}"/><input type="hidden" name="share_id" value="${share_id}"/><input type="hidden" name="uk" value="${uk}"/>`);
	$(document.body).append(form); form.submit();
}
function OpenDir(path, pwd, share_id, uk, surl, randsk, sign, timestamp) {
	var form = $('<form method="post"></form>');
	form.append(`<input type="hidden" name="dir" value="${path}"/><input type="hidden" name="pwd" value="${pwd}"/><input type="hidden" name="surl" value="${surl}"/>
	<input type="hidden" name="share_id" value="${share_id}"/><input type="hidden" name="uk" value="${uk}"/><input type="hidden" name="randsk" value="${randsk}"/><input type="hidden" name="sign" value="${sign}"/><input type="hidden" name="timestamp" value="${timestamp}"/>`);
	$(document.body).append(form); form.submit();
}
function getIconClass(filename) {
	var filetype = {
		file_video: ["wmv", "rmvb", "mpeg4", "mpeg2", "flv", "avi", "3gp", "mpga", "qt", "rm", "wmz", "wmd", "wvx", "wmx", "wm", "mpg", "mp4", "mkv", "mpeg", "mov", "asf", "m4v", "m3u8", "swf"],
		file_audio: ["wma", "wav", "mp3", "aac", "ra", "ram", "mp2", "ogg", "aif", "mpega", "amr", "mid", "midi", "m4a", "flac"],
		file_image: ["jpg", "jpeg", "gif", "bmp", "png", "jpe", "cur", "svg", "svgz", "ico", "webp", "tif", "tiff"],
		file_archive: ["rar", "zip", "7z", "iso"],
		windows: ["exe"],
		apple: ["ipa"],
		android: ["apk"],
		file_alt: ["txt", "rtf"],
		file_excel: ["xls", "xlsx", "xlsm", "xlsb", "csv", "xltx", "xlt", "xltm", "xlam"],
		file_word: ["doc", "docx", "docm", "dotx"],
		file_powerpoint: ["ppt", "pptx", "potx", "pot", "potm", "ppsx", "pps", "ppam", "ppa"],
		file_pdf: ["pdf"],
	};
	var point = filename.lastIndexOf(".");
	var t = filename.substr(point + 1);
	if (t === "") return "";
	t = t.toLowerCase();
	for (var icon in filetype) for (var type in filetype[icon]) if (t === filetype[icon][type]) return "fa-" + icon.replace('_', '-');
	return "";
}
function OpenRoot(surl, pwd) {
	if (surl == "") { Swal.fire("错误", "兼容模式下无法返回根目录，请返回首页重新解析。"); return false; }
	var form = $('<form method="post"></form>');
	form.append(`<input type="hidden" name="surl" value="${surl}"/><input type="hidden" name="pwd" value="${pwd}"/>`);
	$(document.body).append(form); form.submit();
}
function Getpw() {
	var link = document.forms["form1"]["surl"].value;
	var pw = link.match(/提取码.? *(\w{4})/);
	var pw2 = link.match(/pwd=(\w{4})/); // support new version of share link; thanks to #216
	if (pw != null) {
		document.forms["form1"]["pwd"].value = pw[1];
	} else if (pw2 != null) {
		document.forms["form1"]["pwd"].value = pw2[1];
	}
}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}
function addUri() {
	//配置
	var wsurl = $('#wsurl').val();
	var uris = [$('#http')[0].href, $('#https')[0].href];
	var token = $('#token').val();
	var filename = $('#filename b').text();;


	var options = {
		"max-connection-per-server": "16",
		"user-agent": "LogStatistic"
	};
	if (filename != "") {
		options.out = filename;
	}

	json = {
		"id": "baiduwp-php",
		"jsonrpc": '2.0',
		"method": 'aria2.addUri',
		"params": [uris, options],
	};

	if (token != "") {
		json.params.unshift("token:" + token); // 坑死了，必须要加在第一个
	}

	patt = /^wss?\:\/\/(((([A-Za-z0-9]+[A-Za-z0-9\-]+[A-Za-z0-9]+)|([A-Za-z0-9]+))(\.(([A-Za-z0-9]+[A-Za-z0-9\-]+[A-Za-z0-9]+)|([A-Za-z0-9]+)))*(\.[A-Za-z0-9]{2,10}))|(localhost)|((([01]?\d?\d)|(2[0-4]\d)|(25[0-5]))(\.([01]?\d?\d)|(2[0-4]\d)|(25[0-5])){3})|((\[[A-Za-z0-9:]{2,39}\])|([A-Za-z0-9:]{2,39})))(\:\d{1,5})?(\/.*)?$/;
	if (!patt.test(wsurl)) {
		Swal.fire('地址错误', 'WebSocket 地址不符合验证规则，请检查是否填写正确！', 'error');
		return;
	}
	var ws = new WebSocket(wsurl);

	ws.onerror = event => {
		console.log(event);
		Swal.fire('连接错误', 'Aria2 连接错误，请打开控制台查看详情！', 'error');
	};
	ws.onopen = () => { ws.send(JSON.stringify(json)); }

	ws.onmessage = event => {
		console.log(event);
		received_msg = JSON.parse(event.data);
		if (received_msg.error !== undefined) {
			if (received_msg.error.code === 1) Swal.fire('通过RPC连接失败', '请打开控制台查看详细错误信息，返回信息：' + received_msg.error.message, 'error');
		}
		switch (received_msg.method) {
			case "aria2.onDownloadStart":
				Swal.fire('Aria2 发送成功', 'Aria2 已经开始下载！' + filename, 'success');

				localStorage.setItem('aria2wsurl', wsurl);// add aria2 config to SessionStorage
				if (token != "" && token != null) localStorage.setItem('aria2token', token);
				break;

			case "aria2.onDownloadError": ;
				Swal.fire('下载错误', 'Aria2 下载错误！', 'error');
				break;

			case "aria2.onDownloadComplete":
				Swal.fire('下载完成', 'Aria2 下载完成！', 'success');
				break;

			default:
				break;
		}

		// version = received_msg.result.version;
	};
}

function makeQRCode(element, text, size = 512, correctLevel = QRCode.CorrectLevel.M) { // 二维码
	return new QRCode(element, {
		text, correctLevel,
		height: size, width: size
	});
}

async function getAPI(method) { // 获取 API 数据
	try {
		const response = await fetch(`api.php?m=${method}`, { // fetch API
			credentials: 'same-origin' // 发送验证信息 (cookies)
		});
		if (response.ok) { // 判断是否出现 HTTP 异常
			return {
				success: true,
				data: await response.json() // 如果正常，则获取 JSON 数据
			}
		} else { // 若不正常，返回异常信息
			return {
				success: false,
				msg: `服务器返回异常 HTTP 状态码：HTTP ${response.status} ${response.statusText}.`
			};
		}
	} catch (reason) { // 若与服务器连接异常
		return {
			success: false,
			msg: '连接服务器过程中出现异常，消息：' + reason.message
		};
	}
}